<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userTypesConnection extends Model
{
    protected $table = 'tbl_user_access';
    protected $primaryKey = 'user_type_ID';
    public $timestamps = false;
}
