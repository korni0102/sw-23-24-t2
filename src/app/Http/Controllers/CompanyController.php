<?php
// app/Http/Controllers/CompanyController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company; // Import the Company model
use App\Models\Feedback; // Import the Feedback model

class CompanyController extends Controller
{
    public function showCompanies() {     
        $companies = Company::all();
        return view('admin_view_companies', ['companies' => $companies]);  
    }
    
    public function addCompany()
    {
        return view('addCompany');
    }

    public function saveCompany(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:45',
            'address' => 'required|string|max:45',
        ]);

        $companies = Company::create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
        ]);

        return redirect()->route('companies')->with("success", 'Pridanie prebehlo úspešne!');
    }

    // Method to show the form for adding feedback
    public function addFeedback($companyId)
    {
        $company = Company::find($companyId);
        return view('addFeedback', ['company' => $company]);
    }

    // Method to handle the form submission for adding feedback
    public function saveFeedback(Request $request)
    {
        $validatedData = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'text' => 'required|string',
            // Add other validation rules as needed
        ]);

        $feedback = Feedback::create([
            'company_id' => $validatedData['company_id'],
            'user_id' => auth()->user()->id,
            'text' => $validatedData['text'],
            // Add other feedback fields as needed
        ]);

        return redirect()->route('companies')->with("success", 'Spätná väzba bola úspešne pridaná!');
    }

    public function show($id)
    {
        $company = Company::with('jobs')->findOrFail($id);

        return view('company', compact('company'));
    }
}
