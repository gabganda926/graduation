<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientSystemAccountConnection extends Model
{
    protected $table = 'tbl_client_account';
    protected $primaryKey = 'account_ID';
    public $timestamps = false;

    public function notifications()
    {
        return $this->hasMany('App\clientNotificationConnection','account_ID','account_ID');
    }

    public function insurance_list()
    {
        return $this->hasMany('App\accListInsuranceConnection','account_ID','account_ID');
    }

    public function quote_list()
    {
        return $this->hasMany('App\accListQuoteConnection','account_ID','account_ID');
    }
}
