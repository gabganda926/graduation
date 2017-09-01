<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use PDF;


class trans_transmittalFormController extends Controller
{
	public function generatePDF(Request $request) 
    {
    	$pdf = PDF::loadView('pages.pdf.transmittal-form')
            ->setPaper(array(0, 0, 595, 500), 'portrait');

        return $pdf->stream();
    }//generates the pdf
}

?>