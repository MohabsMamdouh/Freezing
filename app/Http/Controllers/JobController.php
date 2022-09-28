<?php

namespace App\Http\Controllers;

use App\Models\Address_Job;
use App\Models\Job;
use App\Models\Phones_Job;
use App\Models\Timing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        $jobs = Job::with('getPhones', 'getAddress', 'getTechnical', 'Feedbacks')->where('status', $status)->get()->sortBy('created_at')->toArray();
        $techs = User::with('roles')->get();
        return view('Jobs.job', compact('status', 'jobs', 'techs'));
    }

    public function myJob($status)
    {
        $jobs = Job::whereHas('getTechnical', fn($query) => $query->where('id', Auth::user()->id))
                ->with('getPhones', 'getAddress', 'getTechnical', 'Feedbacks')
                ->where('status', $status)
                ->get()->sortBy('created_at')->toArray();
        return view('Jobs.job', compact('status', 'jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'CompanyName' => 'required',
            'Phone1' => 'required|string|min:4|max:255',
            'Address' => 'required',
            'Email' => 'required|string|min:4|max:255',
            'Description' => 'required',
        ]);

        $job = new Job();
        $job->company_name = $request['CompanyName'];
        $job->email = $request['Email'];
        $job->description = $request['Description'];
        $job->status = 0;
        $job->save();

        $phone = new Phones_Job();
        $phone->phone = $request['Phone1'];
        $phone->save();
        $job->getPhones()->attach(Phones_Job::where('phone', $request['Phone1'])->first());

        if (isset($request['addPhone']) && $request['addPhone'] != "") {
            $phone = new Phones_Job();
            $phone->phone = $request['addPhone'];
            $phone->save();
            $job->getPhones()->attach(Phones_Job::where('phone', $request['addPhone'])->first());
        }

        $address = new Address_Job();
        $address->address = $request['Address'];
        $address->job_id = $job->id;
        $address->save();

        return redirect(route('ShowJob', ['id' => $job->id]));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobs = Job::with('getPhones', 'getAddress', 'getTechnical', 'Feedbacks')->where('id', $id)->first();
        $techs = User::with('roles')->get();

        if (!Auth::user()->checkRole('Admin') && $jobs['getTechnical'][0]['id'] != Auth::user()->id) {
            return redirect(route('TechnicalDashboard'));
        }

        // dd($jobs);
        return view('Jobs.show', compact('jobs', 'techs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::with('getPhones', 'getAddress', 'getTechnical')->where('id', $id)->get();
        $techs = User::with('roles')->get();
        return view('Jobs.edit', compact('job', 'techs'));
    }

    public function assignTo(Request $request)
    {
        $request->validate([
            'job_id' => 'required',
            'AssignTo' => 'required',
        ]);

        $job = Job::where('id', $request['job_id'])->first();
        $job->status = 1;
        $job->save();
        $job->getTechnical()->attach(User::where('name', $request['AssignTo'])->orWhere('arabic_name', $request['AssignTo'])->first());

        return redirect(route('ShowJob', ['id' => $request['job_id']]));
    }

    public function updateStatus($id)
    {
        $job = Job::where('id', $id)->first();
        $job->status = 2;
        $job->save();

        if (Auth::user()->checkRole('Admin')) {
            return redirect(route('ShowJob', ['id' => $id]));
        }
        return redirect(route('Job.Show', ['id' => $id]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'CompanyName' => 'required',
            'Phone1' => 'required',
            'Address' => 'required',
            'Email' => 'required|string|min:4|max:255',
            'Description' => 'required',
        ]);

        $job = Job::where('id', $request['id'])->first();
        $job->company_name = $request['CompanyName'];
        $job->email = $request['Email'];
        $job->description = $request['Description'];

        // dd($request['AssignTo']);

        if ($request['AssignTo'] != null) {
            $job->status = 1;
            if ($request['status'] == 1) {
                Timing::where('job_id', $request['id'])->delete();
            }
            $job->getTechnical()->attach(User::where('name', $request['AssignTo'])->orWhere('arabic_name', $request['AssignTo'])->first());
        }

        if ($request['status'] == "on") {
            $job->status = 3;
        }

        $job->save();

        if (isset($request['Phone2'])) {
            $phone = Phones_Job::where('id', $request['Hidden_Phone2'])->first();
            $phone->phone = $request['Phone2'];
            $phone->save();
        }

        if (isset($request['addPhone']) && $request['addPhone'] != "") {
            $phone = new Phones_Job();
            $phone->phone = $request['addPhone'];
            $phone->save();
        }

        if ($request['Address'] != "") {
            $address = Address_Job::where('job_id', $request['id'])->first();
            $address->address = $request['Address'];
            $address->save();
        }

        if (Auth::user()->checkRole('Admin')) {
            return redirect(route('ShowJob', ['id' => $request['id']]));
        }
        return redirect(route('Job.Show', ['id' => $request['id']]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function latest()
    {
        $jobs = Job::with('getTechnical')->orderBy('id', 'asc')->take(10)->get();
        return $jobs;
    }

    public static function MYlatest($id)
    {
        $jobUser = User::with('getJobs')->where('id', $id)->get();
        return $jobUser[0]->getJobs;
    }
}
