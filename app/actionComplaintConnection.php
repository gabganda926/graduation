<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actionComplaintConnection extends Model
{
    protected $table = "tbl_complaint_action";
    protected $primaryKey = "comp_action_ID";
    public $timestamps = false;	

    public function act()
    {
    	return $this->belongsTo('App\sendComplaintConnection', 'complaint_ID', 'complaint_ID');
    }
}
