<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userAccountsConnection extends Model
{
    protected $table = 'tb_user_accounts';
    protected $primaryKey = 'user_ID';
    public $timestamps = false;
}
