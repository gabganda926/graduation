<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class accListInsuranceConnection extends Model
{
    protected $table = 'tbl_list_insurance';
    protected $primaryKey = 'client_insure_ID';
    public $timestamps = false;

    public function account()
    {
    	return $this->belongsTo('App\clientSystemAccountConnection','account_ID','account_ID');
    }
    
    public function insurance()
    {
    	return $this->hasOne('App\clientAccountsConnection', 'account_ID', 'insure_ID');
    }
}
