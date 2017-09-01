<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Mail;

use Alert;

use Redirect;

class maint_MailController extends Controller
{
    public function send_notification(Request $req)
    {
		$data = []; // Empty array
		try
		{
	    	Mail::send('pages.others.mail', $data, function($message)
			{
			    $message->to('MySender41n@gmail.com', 'My Sender')->subject('Test!');
			});
			return Redirect::back();
		}
      	catch(\Exception $e)
		{
			\Log::warning($e->getMessage());
		}
    }
}
