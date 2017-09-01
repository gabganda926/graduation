<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientAccountsConnection extends Model
{
    protected $table = 'tbl_insurance_account';
    protected $primaryKey = 'account_ID';
    public $timestamp = false;
}
