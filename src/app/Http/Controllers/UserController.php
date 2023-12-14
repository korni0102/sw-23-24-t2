<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Feedback;
use App\Models\JobRequest;
use App\Models\RoleRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudyProgram;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);

        $token = RoleRequest::where('user_id', auth()->user()->id)->first()->accepted;

        if(!$token){
            return redirect()->route('login.logout')->with('error', 'Musíte čakať na admina!');
        }

        return view('welcome',compact('user'));
    }

    public function registerUser(){
        return view('register.register');
    }
    public function showFAQ(){
        return view('faqView');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function saveUser(Request $request)
    {

        $validatedData = $request->validate([
            'firstname' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'year' => 'required|int',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required|string|max:100',
            'tel' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'role_id' => 'required|int',
        ]);

        $user = User::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'year' => $validatedData['year'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address'],
            'tel' => $validatedData['tel'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => $validatedData['role_id'],
            'study_program_id' => $request->input('study_program_id'),
        ]);

        RoleRequest::create([
            'user_id' => $user->id,
            'role_id' => $validatedData['role_id'],
        ]);

        return redirect()->route('login.page')->with("success", 'Registrácia prebiehla úspešne, musíte čakať na admina!');
    }


    public function ShowUser()
    {
        $usersWithPosts = User::with('posts')->get();

        return view('user_view', ['usersWithPosts' => $usersWithPosts]);
    }


    public function showStudentforVeduci(Request $request)
    {
        $query = User::where('role_id', 2);
    
        if ($request->has('study_program_filter') && ($request->input('study_program_filter')!="")) {
            $query->where('study_program_id', $request->input('study_program_filter'));
        }
    
        if ($request->has('year_filter') && ($request->input('year_filter')!=null)) {
            $query->where('year', $request->input('year_filter'));
        }
    
        $users = $query->get();

        return view('studentiView', [
            'users' => $users,
            'studyPrograms' => StudyProgram::all(),
        ]);
    }
    

    public function showJobRequsets(){
        $jobrequests = JobRequest::all();
        $usersWithRoleFour = User::where('role_id', 3)->get();
        return view('veduciShowRequests', [
            'jobrequests' => $jobrequests,
            'usersWithRoleFour' => $usersWithRoleFour
        ]);
    }

    public function showJobRequsetsPPP(){

        $jobrequests = JobRequest::where('ppp_id', auth()->user()->id)->where('accepted', false)->get();


        return view('pppShowRequests', ['jobrequests' => $jobrequests,]);
    }

    public function requestAjax(Request $request){

        $jobRequestId = $request->input('jobRId');
        $pppId = $request->input('pppId');

        JobRequest::where('id', $jobRequestId)->first()->update(['ppp_id' => $pppId]);

        return redirect()->route('showJobRequsets');
    }

    public function deleteJobRequsetsPPP($jobRequestId){
        $jobRequest = JobRequest::findOrFail($jobRequestId);
        $jobRequest->delete();
        session()->flash('success', 'Job request deleted successfully');
        return redirect()->back();
    }

    public function pppAcceptJobRequest($jobRequestId){

        DB::transaction(function () use ($jobRequestId) {
            $jobRequest = JobRequest::findOrFail($jobRequestId);

            $pppId = auth()->user()->id;

            $jobRequest->accepted = true;
            $jobRequest->ppp_id = $pppId;
            $jobRequest->save();

            $contract = new Contract();
            $contract->user_id = $jobRequest->user_id;
            $contract->job_id = $jobRequest->job_id;
            $contract->from = now();
            $contract->to = now()->addYear();
            $contract->accepted = true;
            $contract->closed = false;
            $contract->hodnotenie = null;
            $contract->ppp_id = $pppId;
            $contract->save();

        });
        session()->flash('success', 'Job request accepted and contract created.');
        return redirect()->back();
    }

    public function studentViewContracts(){

        $contracts = Contract::where('user_id', auth()->user()->id)->get();
        return view('student_view_contracts', ['contracts' => $contracts]);

    }

    public function showGradesStudent(){

        $contracts = Contract::where('user_id', auth()->user()->id)
            ->whereNotNull('hodnotenie')
            ->get();
        return view('student_view_grades', ['contracts' => $contracts]);
    }


    public function showGradeStudentPPP() {
        $contracts = Contract::where('ppp_id', auth()->user()->id)->get();
        return view('showGradeStudentPPP', ['contracts' => $contracts]);
    }

    public function editGradePPP($contract_id, Request $request){
        $contract = Contract::where('id', $contract_id)->first();
        return view('editGradePPP', compact('contract'));
    }

    public function changeGradePPP($contract_id, Request $request){
        $contract = Contract::where('id', $contract_id)->first();
        $validatedData = $request->validate([
            'hodnotenie' => 'string|max:25',
        ]);
        $contract->update($validatedData);
        return redirect()->route('showGradeStudentPPP')->with('success', 'Hodnotenie updated successfully.');
    }
}
