<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Contract;

class JobController extends Controller
{
    // Existing function to show all jobs
    public function showJobs() {     
        $jobs = Job::with('contract')->get(); // Ensure to eager load the contract relationship
        return view('jobsView', ['jobs' => $jobs]); 
    }

    // Function to show part-time jobs
    public function showPartTimeJobs() {
        $partTimeJobs = Job::where('job_type', 'parttime')->get();
        return view('jobs_type.parttime', ['jobs' => $partTimeJobs]);
    }

    // Function to show paid jobs
    public function showPaidJobs() {
        $paidJobs = Job::where('job_type', 'paid')->get();
        return view('jobs_type.paid', ['jobs' => $paidJobs]);
    }

    // Function to show unpaid jobs
    public function showUnpaidJobs() {
        $unpaidJobs = Job::where('job_type', 'unpaid')->get();
        return view('jobs_type.unpaid', ['jobs' => $unpaidJobs]);
    }

    // Function to show full-time jobs
    public function showFullTimeJobs() {
        $fullTimeJobs = Job::where('job_type', 'fulltime')->get();
        return view('jobs_type.fulltime', ['jobs' => $fullTimeJobs]);
    }

    // Function to show freelancer jobs
    public function showFreelancerJobs() {
        $freelancerJobs = Job::where('job_type', 'freelancer')->get();
        return view('jobs_type.freelancer', ['jobs' => $freelancerJobs]);
    }
}


