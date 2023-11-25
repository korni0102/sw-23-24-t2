<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company; // Import the Company model

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

    // Method to handle the form submission
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
}
     

    


    
