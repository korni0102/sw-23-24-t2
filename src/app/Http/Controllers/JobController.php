<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Contract;

class JobController extends Controller
{

    public function showJobs() {
        $jobs = Job::all();
        return view('jobsView', ['jobs' => $jobs]);
    }

    public function showPartTimeJobs() {
        $partTimeJobs = Job::where('job_type', 'parttime')->get();
        return view('jobs_type.parttime', ['jobs' => $partTimeJobs]);
    }

    public function showPaidJobs() {
        $paidJobs = Job::where('job_type', 'paid')->get();
        return view('jobs_type.paid', ['jobs' => $paidJobs]);
    }

    public function showUnpaidJobs() {
        $unpaidJobs = Job::where('job_type', 'unpaid')->get();
        return view('jobs_type.unpaid', ['jobs' => $unpaidJobs]);
    }

    public function showFullTimeJobs() {
        $fullTimeJobs = Job::where('job_type', 'fulltime')->get();
        return view('jobs_type.fulltime', ['jobs' => $fullTimeJobs]);
    }

    public function showFreelancerJobs() {
        $freelancerJobs = Job::where('job_type', 'freelancer')->get();
        return view('jobs_type.freelancer', ['jobs' => $freelancerJobs]);
    }
}


