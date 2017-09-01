<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quotationCompanyConnection extends Model
{
    protected $table = 'tbl_quote_company';
    protected $primaryKey = 'quote_comp_ID';
    public $timestamps = false;
}
