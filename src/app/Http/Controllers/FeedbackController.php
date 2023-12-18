<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Contract;

class FeedbackController extends Controller
{
    public function create($contractId)
    {
    
        return view('addFeedbackStudent', ['contractId' => $contractId]);
    }

    public function store(Request $request, $contractId)
    {
   
        $validatedData = $request->validate([
            'text' => 'required|string|max:1000', 
        ]);

        $contract = Contract::findOrFail($contractId);

        Feedback::create([
            'text' => $validatedData['text'],
            'contract_id' => $contractId,
            'user_id' =>  auth()->user()->id
        ]);

        return redirect()->route('showGradesStudent');

    }
}