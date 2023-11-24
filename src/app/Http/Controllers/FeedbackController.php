<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:organizations,id', // Adjust the validation rule based on your organization model
            'text' => 'required|string',
            'contract_id' => 'required|int',
            'user_id' => 'required|int',
            'contact_id' => 'required|int'
        ]);

        Feedback::create([
            'id' => $validatedData['organization'],
            'text' => $validatedData['feedback'],
            'contract_id' => $validatedData['contract_id'],
            'user_id' => $validatedData['user_id'],
            'contact_id' => $validatedData['contact_id']
            // You can add more fields as needed
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
}
