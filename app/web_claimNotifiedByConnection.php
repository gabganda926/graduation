<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class web_claimNotifiedByConnection extends Model
{
    protected $table = 'tbl_web_claimNotifiedByRepresentative';
    protected $primaryKey = 'web_notifier_ID';
    public $timestamps = false;
}
