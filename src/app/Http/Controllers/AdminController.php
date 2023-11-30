<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\RoleRequest;
use Illuminate\Http\Request;

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
}
