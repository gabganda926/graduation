<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LedgerConnection extends Model
{
    protected $table = "tbl_ledger";
    protected $primaryKey = "ledger_ID";
    public $timestamps = false;
}
