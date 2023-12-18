<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Grade;
use PDF;



class PDFController extends Controller
{
    public function generatePDF(Request $request, $contractId)
    {
        $contract = Contract::findOrFail($contractId);
        $pdf = PDF::loadView('pdf_template', ['contract' => $contract]);
        $filename = 'contract_' . $contract->id . '.pdf';

        return $pdf->download($filename);
    }

    public function generatePDF_badge(Request $request, $contractId)
    {
        $contract = Contract::findOrFail($contractId);
        $grades = Grade::all();
        $pdf = PDF::loadView('pdf_template_badge', ['contract' => $contract, 'grades' => $grades]);
        $filename = 'contract_' . $contract->id . '.pdf';

        return $pdf->download($filename);
    }


}
