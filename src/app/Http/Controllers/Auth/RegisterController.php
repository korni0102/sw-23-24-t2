<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('register.register');
    }

    protected function validator(array $data, $table)
{
    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.$table],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
}

    public function register(Request $request)
    {
        $this->validator($request->all(), 'users')->validate();
    
        $user = $this->create($request->all());
    
        // Authenticate the user (optional)
    
        return redirect()->route('user.index'); // Redirect to a different page after registration
    }
    
}

