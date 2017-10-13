<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class utilitiesTaxConnection extends Model
{
    protected $table = 'tbl_util_tax';
    protected $primaryKey = "tax_ID";
    public $timestamps = false;
}
