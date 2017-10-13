<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class accListQuoteConnection extends Model
{
    protected $table = 'tbl_list_quotes';
    protected $primaryKey = 'client_quote_ID';
    public $timestamps = false;

    public function account()
    {
    	return $this->belongsTo('App\clientSystemAccountConnection','account_ID','account_ID');
    }

    public function quotes()
    {
    	return $this->hasMany('App\quotationListConnection','quote_ID','quote_ID');
    }
}
