<?php

namespace App\Http\Controllers;

use App\Models\Contact;
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

        return redirect()->route('viewCompaniesStudents')->with("success", 'Pridanie prebehlo úspešne!');

    }

    public function addContact()
    {
        $companies = Company::all();
        return view('addContacts', ['companies' => $companies]);
    }

    public function saveContact(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'tel' => 'required|string|max:45',
            'email' => 'required|string|max:45',
            'company_id' => 'required|integer|max:45',
        ]);

        $contacts = Contact::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'tel' => $validatedData['tel'],
            'email' => $validatedData['email'],
            'company_id' => $validatedData['company_id'],
        ]);

        return redirect()->route('viewCompaniesStudents')->with("success", 'Pridanie prebehlo úspešne!');
    }

    public function viewCompaniesStudents(){
        $companies = Company::all();
        return view('viewCompaniesStudents', ['companies' => $companies]);
    }

    public function viewCompaniesVeduci(){
        $companies = Company::all();
        return view('viewCompaniesVeduci', ['companies' => $companies]);
    }

}






