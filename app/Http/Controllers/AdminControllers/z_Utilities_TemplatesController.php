<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Redirect;

use Alert;

class z_Utilities_TemplatesController extends Controller
{
    public function index()
    {
      return view('/pages/admin/utilities/templates');
    }

    public function carousel()
    {
      return view('/pages/admin/utilities/temp-carousel');
    }

    public function carousel_save(Request $req)
    {
      if($req->hasFile('picture1'))
        {
          \Log::info($req);
          $file = $req->file('picture1');

          $extension = \File::extension($file->getClientOriginalName());
          try
          {
            $name = "banner1.jpg";
          }
          catch(\Exception $e)
          {
            $name = "banner1.jpg";
          }

          $file->move(public_path().'/web/images', $name);
         }

       if($req->hasFile('picture2'))
        {
          \Log::info($req);
          $file = $req->file('picture2');
          try
          {
            $name = "banner2.jpg";
          }
          catch(\Exception $e)
          {
            $name = "banner2.jpg";
          }

          $file->move(public_path().'/web/images', $name);
         }

         if($req->hasFile('picture3'))
        {
          \Log::info($req);
          $file = $req->file('picture3');

          $extension = \File::extension($file->getClientOriginalName());
          try
          {
            $name = "banner3.jpg";
          }
          catch(\Exception $e)
          {
            $name = "banner3.jpg";
          }

          $file->move(public_path().'/web/images', $name);
         }

         alert()
    ->success('Changes Saved!', "Success")
    ->persistent("Close");
    return Redirect::back();
    }
}
