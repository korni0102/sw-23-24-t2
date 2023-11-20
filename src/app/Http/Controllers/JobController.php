<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function showJobs() {     
        $jobs = Job::all();
        return view('jobsView', ['jobs' => $jobs]); 
    }
}
