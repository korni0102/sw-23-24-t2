<?php

namespace App\Http\Controllers;

use App\Models\RoleRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function modifyRoleRequest(){
        $requests = RoleRequest::all();

        return view('admin.modifyRequest', compact('requests'));
    }

    public function asd($role_request_id, $role_request_status){
        RoleRequest::where('id', $role_request_id)
            ->update([
                'accepted' => !$role_request_status,
                'admin_id' => auth()->user()->id
            ]);

        return redirect()->route('admin.modifyRoleRequest')
            ->with('success', 'Prebiehlo úspešne');
    }
}
