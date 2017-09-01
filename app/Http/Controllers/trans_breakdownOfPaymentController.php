<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use PDF;


class trans_breakdownOfPaymentController extends Controller
{
	public function generatePDF(Request $request) 
    {
    	$pdf = PDF::loadView('pages.pdf.breakdown-payment')
            ->setPaper('Letter');

        return $pdf->stream();
    }//generates the pdf
}

?>