<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\RoleRequest;
use Illuminate\Http\Request;
use App\Models\Contract;

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
        $user = User::where('id', $user_id)->first();

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
        return redirect()->back();
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



}
