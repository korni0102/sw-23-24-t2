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
}


    
