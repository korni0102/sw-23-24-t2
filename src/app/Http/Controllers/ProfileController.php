<?php
// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'firstname' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'year' => 'required|int',
            // Add other validation rules as needed
        ]);

        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'year' => $request->year,
            // Update other fields as needed
        ]);

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
}