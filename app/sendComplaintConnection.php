<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sendComplaintConnection extends Model
{
    protected $table = "tbl_complaint_sents";
    protected $primaryKey = "complaint_ID";
    public $timestamps = false;

    public function action()
    {
    	return $this->hasOne('App\actionComplaintConnection','complaint_ID', 'complaint_ID');
    }
}
