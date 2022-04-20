<?php

namespace App\Http\Controllers;

use App\Models\Address_Job;
use App\Models\feedback;
use App\Models\Job;
use App\Models\Phones_Job;
use App\Models\pricing;
use App\Models\SiteInfo;
use App\Models\User;
use DragonCode\Contracts\Http\Builder;
use Illuminate\Http\Request;

class UserhomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site = SiteInfo::all();
        $pend = count(Job::where('status', 0)->get());
        $comp = count(Job::where('status', 2)->get());
        $jobs_this_month = count(Job::whereMonth('created_at', date("m",strtotime('this month')))->get());
        $jobs_last = count(Job::all());
        $growth = ($jobs_this_month / $jobs_last) * 100;
        $users = User::whereHas('roles', function($q){
            $q->where('name', 'Admin');
        })->get();

        $feedback = feedback::with('Jobs')->get();
        $price = pricing::all();

        // dd($feedback);

        return view('welcome', compact('site', 'pend', 'comp', 'growth', 'users', 'feedback', 'price'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        return redirect(route('UserHome'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
