<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_tech = count(User::all());
        $count_job = count(Job::all());
        $jobs_this_month = count(Job::whereMonth('created_at', date("m",strtotime('this month')))->get());
        $jobs_last = count(Job::all());
        $growth = round((($jobs_this_month / $jobs_last) * 100), 2);
        $users = User::whereHas('roles', function($q){
            $q->where('name', 'Admin');
        })->get();
        return view('home', compact('count_tech', 'count_job', 'growth'));
    }
}
