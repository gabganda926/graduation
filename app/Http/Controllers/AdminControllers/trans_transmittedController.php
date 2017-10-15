<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\inscompanyConnection;

use App\courierConnection;

use App\personalInfoConnection;

use App\transmittalRecordConnection;

use App\transmittalDetailsConnection;

use App\transmittalDocumentsConnection;

use App\transmittalRequestConnection;

use App\transmittalProccessConnection;

use App\transmitDocumentsConnection;

use Alert;

use Redirect;

use PDF;

use Session;

class trans_transmittedController extends Controller
{
    public function index()
    {
    	return view('pages.admin.transaction.transmittal')
    	->with('request', transmittalRequestConnection::all())
    	->with('details', transmittalDetailsConnection::all())
    	->with('documents', transmittalDocumentsConnection::all())
        ->with('process', transmittalProccessConnection::all())
        ->with('courier', courierConnection::all())
        ->with('pinfo', personalInfoConnection::all());
    }

    public function view(Request $req)
    {
        $id = transmittalDetailsConnection::where('req_ID','=',str_pad($req->trans_id,11, "0", STR_PAD_LEFT))->first();
        $inscomp = inscompanyConnection::where('comp_ID','=', $id->insurance_company)->first();
        $proc = transmittalProccessConnection::where('request_ID','=',str_pad($req->trans_id,11, "0", STR_PAD_LEFT))->first();
        $cour = courierConnection::where('courier_ID', '=', $proc->courier_ID)->first();
        $details = personalInfoConnection::where('pinfo_ID','=',$cour->personal_info_ID)->first();
        return view('pages.admin.transaction.transmittal-info-approved')
        ->with('request', transmittalRequestConnection::where('req_ID','=',str_pad($req->trans_id,11, "0", STR_PAD_LEFT))->first())
        ->with('details', transmittalDetailsConnection::where('req_ID','=',str_pad($req->trans_id,11, "0", STR_PAD_LEFT))->first())
        ->with('documents', transmittalDocumentsConnection::where('req_ID','=',str_pad($req->trans_id,11, "0", STR_PAD_LEFT))->get())
        ->with('inscomp', $inscomp)
        ->with('courier', $details);
    }

    public function update(Request $req)
    {
    	$data = transmittalRequestConnection::where('req_ID', '=', str_pad($req->transid,11, "0", STR_PAD_LEFT))->first();
    	\Log::info($data);
        \Log::info($req->statval);
        $data->status = $req->statval;
        $data->date_update = $req->time;
        $data->employee_info_ID = Session::get('id');
    	$data->save();
      alert()
      ->success('Record Updated', "Success")
      ->persistent("Close");
      return Redirect::back();
    }

    public function generateForm(Request $request, $req_ID) 
    {
        $id = transmittalDetailsConnection::where('req_ID','=',str_pad($req_ID,11, "0", STR_PAD_LEFT))->first();
        $inscomp = inscompanyConnection::where('comp_ID','=', $id->insurance_company)->first();
        $proc = transmittalProccessConnection::where('request_ID','=',str_pad($req_ID,11, "0", STR_PAD_LEFT))->first();
        $cour = courierConnection::where('courier_ID', '=', $proc->courier_ID)->first();
        $inf = personalInfoConnection::where('pinfo_ID','=',$cour->personal_info_ID)->first();
        $request = transmittalRequestConnection::where('req_ID','=',str_pad($req_ID,11, "0", STR_PAD_LEFT))->first();
        $details = transmittalDetailsConnection::where('req_ID','=',str_pad($req_ID,11, "0", STR_PAD_LEFT))->first();
        $documents = transmittalDocumentsConnection::where('req_ID','=',str_pad($req_ID,11, "0", STR_PAD_LEFT))->get();
        \Log::info($documents);
        

        $pdf = PDF::loadView('pages.pdf.transmittal-form-pdf',
                compact('id', 'inscomp', 'proc', 'cour', 'details', 'request', 'documents', 'inf'))
            ->setPaper(array(0, 0, 595, 600), 'portrait');

        return $pdf->stream();
    }//generates the pdf
}
