<?php

namespace App\Http\Controllers;

use App\Models\RoleRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){

        return view('login.login');
    }

    public function login(\App\Http\Requests\Login $request){
        $data = $request->validated();

        if (auth()->attempt($data)) {
            return redirect()->route('user.index');
        }

        return redirect()->route('login.page')->with('error', 'Zadali ste nesprávne údaje!');
    }

    public function logout(){
        auth()->logout();
        return view('login.login');
    }
}
