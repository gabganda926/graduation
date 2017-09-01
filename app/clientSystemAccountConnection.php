<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientSystemAccountConnection extends Model
{
    protected $table = 'tbl_client_account';
    protected $primaryKey = 'account_ID';
    public $timestamps = false;
}
