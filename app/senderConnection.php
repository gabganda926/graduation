<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class senderConnection extends Model
{
    protected $table = "tbl_sender";
    protected $primaryKey = "sender_ID";
    public $timestamps = false;
}
