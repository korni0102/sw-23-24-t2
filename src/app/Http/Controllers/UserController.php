<?php

namespace App\Http\Controllers;

use App\Models\RoleRequest;
use Illuminate\Http\Request;
use App\Models\User;

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

    public function showStudentforVeduci (){
        $users = User::where('role_id', 2)->get();
        return view('studentiView', ['users' => $users]);
    }

}
