<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\Company;
use App\Models\Contract;
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

    public function applyForJob($id)
    {
        // Get the job
        $job = Job::findOrFail($id);
    
        // Check if the user has a contact
        if (auth()->user()->contact) {
            $contactId = auth()->user()->contact->id;
    
            // Create a contract
            $contract = Contract::create([
                'user_id' => auth()->user()->id,
                'contact_id' => $contactId,
                'job_id' => $job->id,
                'from' => now(),  // Adjust this as needed
                'to' => now(),    // Adjust this as needed
                'accepted' => false,  // You may adjust the default values
                'closed' => false,    // You may adjust the default values
            ]);
    
            return redirect()->route('jobs.showDetails', $job->id)->with("success", 'You have successfully applied for the job!');
        } else {
            return redirect()->route('jobs.showDetails', $job->id)->with("error", 'User does not have a contact.');
        }
    }
    

}
