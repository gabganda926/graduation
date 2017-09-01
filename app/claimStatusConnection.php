<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class claimStatusConnection extends Model
{
      protected $table = "tbl_claim_status";
      protected $primaryKey = "claimStatus_ID";
      public $timestamps = false;
}
