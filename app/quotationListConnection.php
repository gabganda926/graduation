<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quotationListConnection extends Model
{
    protected $table = 'tbl_quotation';
    protected $primaryKey = 'quote_ID';

    public function individual()
    {
    	return $this->hasOne('App\quotationIndividualConnection', 'quote_indi_ID', 'quote_ID');
    }

    public function company()
    {
    	return $this->hasOne('App\quotationCompanyConnection', 'quote_comp_ID', 'quote_ID');
    }
}
