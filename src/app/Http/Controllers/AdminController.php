<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\RoleRequest;
use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Contact;
use App\Models\Company;
use App\Models\Job;
use App\Models\Feedback;
use App\Models\JobRequest;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

    public function modifyRoleRequest(){
        $requests = RoleRequest::all();

        return view('admin.modifyRequest', compact('requests'));
    }

    public function changeStatus($role_request_id, $role_request_status){
        RoleRequest::where('id', $role_request_id)
            ->update([
                'accepted' => !$role_request_status,
                'admin_id' => auth()->user()->id
            ]);

        return redirect()->route('admin.modifyRoleRequest')
            ->with('success', 'Prebiehlo úspešne');
    }

    public function showStudents(){
        $users = User::where('role_id', 2)->get();

        return view('admin_views.admin_view_students', ['users' => $users]);
    }

    public function showPPPs(){
        $users = User::where('role_id', 3)->get();

        return view('admin_views.admin_view_PPPs', ['users' => $users]);
    }

    public function showVeducis(){
        $users = User::where('role_id', 4)->get();

        return view('admin_views.admin_view_Veducis', ['users' => $users]);
    }

    public function showzastupcas(){
        $users = User::where('role_id', 5)->get();

        return view('admin_views.admin_view_PPPs', ['users' => $users]);
    }

    public function editUsers($user_id, Request $request)
    {
        $user = User::where('id', $user_id)->first();
        $redirectView = $request->input('redirect_to');
        return view('editUser', compact('user', 'redirectView'));
    }

    public function destroyUsers($user_id)
    {

        DB::transaction(function () use ($user_id) {
            Feedback::where('user_id', $user_id)->update(['user_id' => null]);
            RoleRequest::where('user_id', $user_id)->update(['user_id' => null]);
            JobRequest::where('user_id', $user_id)->update(['user_id' => null]);
            JobRequest::where('ppp_id', $user_id)->update(['ppp_id' => null]);
            Contract::where('user_id', $user_id)->update(['user_id' => null]);
            User::where('id', $user_id)->delete();
        });

        session()->flash('success', 'User deleted and related records updated successfully');
        return redirect()->back();

        /*$user = User::where('id', $user_id)->first();

        $roleRequest = RoleRequest::where('user_id', $user_id)->first();
        if(!is_null($roleRequest)){
            $roleRequest->delete();
        }

        $contracts = Contract::where('user_id', $user_id)->get();
        if(!is_null($contracts)){
            foreach($contracts as $contract){
                $contract->delete();
            }
        }

        $user->delete();
        session()->flash('success', 'User deleted successfully');
        return redirect()->back();*/
    }


    public function updateUsers(Request $request, $user_id)
    {
        $user = User::where('id', $user_id)->first();
        
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'year' => 'required|int',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'address' => 'required|string|max:100',
            'tel' => 'required|string|max:255',
        ]);
        $user->update($validatedData);
        $redirectView = $request->input('redirect_to');
        session()->flash('success', 'User updated successfully');
        return redirect()->route($redirectView);
    }

    public function editCompany($company_id, Request $request)
    {
        $company = Company::where('id', $company_id)->first();
        return view('editCompany', compact('company'));
    }

    public function destroyCompany($company_id)
    {


        DB::transaction(function () use ($company_id) {
            $company = Company::with(['jobs', 'contacts'])->findOrFail($company_id);

            $jobIds = $company->jobs->pluck('id');
            $contactIds = $company->contacts->pluck('id');

            Contract::whereIn('job_id', $jobIds)->update(['job_id' => null]);
            Contract::whereIn('contact_id', $contactIds)->update(['contact_id' => null]);
            Feedback::whereIn('contact_id', $contactIds)->update(['contact_id' => null]);
            JobRequest::whereIn('job_id', $jobIds)->update(['job_id' => null]);
            Job::destroy($jobIds);
            Contact::destroy($contactIds);

            $company->delete();
        });

        session()->flash('success', 'Company and related records have been successfully deleted.');
        return redirect()->back();
        
        /*$company = Company::where('id', $company_id)->first();
        
        $jobs = Job::where('company_id', $company_id)->get();
        if(!is_null($jobs)){
            foreach($jobs as $job){
                $job->delete();
            }
        }
        
        $contacts = Contact::where('company_id', $company_id)->get();
        if(!is_null($contacts)){
            foreach($contacts as $contact){
                $contact->delete();
            }
        }

        $company->delete();
        session()->flash('success', 'User deleted successfully');
        return redirect()->back();*/
    }

    public function updateCompany(Request $request, $company_id)
    {
        $company = Company::where('id', $company_id)->first();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            
        ]);
        $company->update($validatedData);
        return redirect()->route('companies')
            ->with('success', 'Prebiehlo úspešne');
    }


}
