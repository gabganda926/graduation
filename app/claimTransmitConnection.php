<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class claimTransmitConnection extends Model
{
    protected $table = 'tbl_transmit_claim';
    protected $primaryKey = 'transmitClaim_ID';
    public $timestamps = false;
}
