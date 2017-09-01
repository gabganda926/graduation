<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quoteNoteConnection extends Model
{
  protected $table = 'tbl_disapproval_note';
  protected $primaryKey = 'approval_ID';
  public $timestamps = false;
}
