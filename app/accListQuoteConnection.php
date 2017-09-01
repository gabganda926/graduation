<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class accListQuoteConnection extends Model
{
    protected $table = 'tbl_list_quotes';
    protected $primaryKey = 'client_quote_ID';
    public $timestamps = false;
}
