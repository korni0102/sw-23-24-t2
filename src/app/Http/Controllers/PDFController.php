<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use PDF;



class PDFController extends Controller
{
    public function generatePDF(Request $request, $contractId)
    {
        $contract = Contract::findOrFail($contractId);

        // Generate the PDF
        $pdf = PDF::loadView('pdf_template', ['contract' => $contract]);

        // Save or download the PDF
        $filename = 'contract_' . $contract->id . '.pdf';

        // If you want to download the PDF
        return $pdf->download($filename);
    }
    
    public function generatePDF_badge(Request $request, $contractId)
    {
        $contract = Contract::findOrFail($contractId);

        // Generate the PDF
        $pdf = PDF::loadView('pdf_template_badge', ['contract' => $contract]);

        // Save or download the PDF
        $filename = 'contract_' . $contract->id . '.pdf';

        // If you want to download the PDF
        return $pdf->download($filename);
    }


}
