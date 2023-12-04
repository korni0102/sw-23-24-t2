<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\RoleRequest;
use App\Models\JobRequest;
use Illuminate\Http\Request;
use App\Models\Contract;

class JobController extends Controller
{

    public function showJobs() {
        $jobs = Job::with('company')->whereHas('company')->get();
        return view('jobsView', ['jobs' => $jobs]);
    }

    public function showPartTimeJobs() {
        $partTimeJobs = Job::with('company')->whereHas('company')->where('job_type', 'parttime')->get();
        return view('jobs_type.parttime', ['jobs' => $partTimeJobs]);
    }

    public function showPaidJobs() {
        $paidJobs = Job::with('company')->whereHas('company')->where('job_type', 'paid')->get();
        return view('jobs_type.paid', ['jobs' => $paidJobs]);
    }

    public function showUnpaidJobs() {
        $unpaidJobs = Job::with('company')->whereHas('company')->where('job_type', 'unpaid')->get();
        return view('jobs_type.unpaid', ['jobs' => $unpaidJobs]);
    }

    public function showFullTimeJobs() {
        $fullTimeJobs = Job::with('company')->whereHas('company')->where('job_type', 'fulltime')->get();
        return view('jobs_type.fulltime', ['jobs' => $fullTimeJobs]);
    }

    public function showFreelancerJobs() {
        $freelancerJobs = Job::with('company')->whereHas('company')->where('job_type', 'freelancer')->get();
        return view('jobs_type.freelancer', ['jobs' => $freelancerJobs]);
    }

    public function requestPartTimeJob(Request $request){


        JobRequest::create([
            'user_id' => auth()->user()->id,
            'job_id' => $request->input('jobId'),
        ]);
        session()->flash('success', 'Pridanie prebehlo úspešne,
        musite cakat na akceptovanie od povereneho pracovnika pracoviska');
        return redirect('job-types/part-time');
    }

    public function requestFullTimeJob(Request $request){


        JobRequest::create([
            'user_id' => auth()->user()->id,
            'job_id' => $request->input('jobId'),
        ]);
        session()->flash('success', 'Pridanie prebehlo úspešne,
        musite cakat na akceptovanie od povereneho pracovnika pracoviska');
        return redirect('job-types/full-time');
    }

    public function requestPaidJob(Request $request){


        JobRequest::create([
            'user_id' => auth()->user()->id,
            'job_id' => $request->input('jobId'),
        ]);
        session()->flash('success', 'Pridanie prebehlo úspešne,
        musite cakat na akceptovanie od povereneho pracovnika pracoviska');
        return redirect('job-types/paid');
    }

    public function requestUnpaidJob(Request $request){


        JobRequest::create([
            'user_id' => auth()->user()->id,
            'job_id' => $request->input('jobId'),
        ]);
        session()->flash('success', 'Pridanie prebehlo úspešne,
        musite cakat na akceptovanie od povereneho pracovnika pracoviska');
        return redirect('job-types/unpaid');
    }

    public function requestFreelancerJob(Request $request){


        JobRequest::create([
            'user_id' => auth()->user()->id,
            'job_id' => $request->input('jobId'),
        ]);
        session()->flash('success', 'Pridanie prebehlo úspešne,
        musite cakat na akceptovanie od povereneho pracovnika pracoviska');
        return redirect('job-types/freelancer');
    }
}


