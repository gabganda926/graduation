<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use PDF;


class trans_quotationProposalController extends Controller
{
	public function generatePDF(Request $request) 
    {
    	$pdf = PDF::loadView('pages.pdf.quotation-proposal')
            ->setPaper('Letter');

        return $pdf->stream();
    }//generates the pdf
}

?>