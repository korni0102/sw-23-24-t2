<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);

        return view('welcome',compact('user'));
    }
}
