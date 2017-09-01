<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quoteConnection extends Model
{
  protected $table = 'tbl_quote_status';
  protected $primaryKey = 'quoteStatus_ID';
  public $timestamps = false;
}
