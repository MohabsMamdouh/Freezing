<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use App\Models\Job;
use Illuminate\Http\Request;

class FeedbackController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('feedback.feedback');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::where('status', 2)->get();
        return view('Admin.feedback.create', compact('jobs'));
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
            'JobName' => 'required',
            'rate' => 'required',
            'feedback' => 'required|string|min:4',
        ]);


        $feedback = new feedback();
        $feedback->feedback = $request['feedback'];
        $feedback->rate = $request['rate'];
        $feedback->status = 0;
        $feedback->save();

        $jobs = Job::where('company_name', $request['JobName'])->orderBy('created_at', 'desc')->first();
        $jobs->Feedbacks()->attach(feedback::where('created_at', now())->first());

        return redirect(route('CreateFeedback'));
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
