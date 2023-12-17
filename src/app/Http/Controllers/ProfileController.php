<?php
// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Zastupca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $companies = auth()->user()->role_id == 5 ? Company::all() : null;
        $attachedCompany = Zastupca::where('user_id', auth()->user()->id)->first();

        return view('profile.edit', compact('companies', 'attachedCompany'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'firstname' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'address' => 'required|string|max:100',
            'year' => 'required|int',
        ]);

        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'address' => $request->address,
            'year' => $request->year,
        ]);

        if(!is_null($request->input('company_id'))){
            $this->saveCompanyForZastupca($request->input('company_id'));
        }

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }

    public function saveCompanyForZastupca(int $companyID)
    {
        $attachedCompany = Zastupca::where('user_id', auth()->user()->id)->first();

        if ($attachedCompany) {
            $attachedCompany->company_id = $companyID;
            $attachedCompany->save();
        } else {
            $zastupca = new Zastupca;
            $zastupca->user_id = auth()->user()->id;
            $zastupca->company_id = $companyID;
            $zastupca->save();
        }
    }

}
