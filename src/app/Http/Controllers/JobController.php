<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function showJobs() {     
        $jobs = Job::all();
        $jobs = Job::with('companies')->get();
        return view('jobsView', ['jobs' => $jobs]); 
    }
    public function showJobDetails($id)
    {
        $job = Job::findOrFail($id);

        $company = $job->company;

        return view('jobs', compact('job', 'company'));
    }
}
