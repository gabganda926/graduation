<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quotationIndividualConnection extends Model
{
    protected $table = 'tbl_quote_individual';
    protected $primaryKey = 'quote_indi_ID';
    public $timestamps = false;
}
