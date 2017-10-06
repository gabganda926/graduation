<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientAccountsConnection extends Model
{
    protected $table = 'tbl_insurance_account';
    protected $primaryKey = 'account_ID';
    public $timestamp = false;

    public function payment_details()
    {
    	return $this->hasOne('App\paymentDetailConnection', 'account_ID');
    }

    public function client()
    {
    	return $this->hasOne('App\clientListConnection', 'client_ID', 'client_ID');
    }

    public function inscomp()
    {
        return $this->hasOne('App\inscompanyConnection', 'comp_ID', 'insurance_company');
    }
}
