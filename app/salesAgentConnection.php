<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salesAgentConnection extends Model
{
    protected $table = 'tbl_salesagent';
    protected $primaryKey = "agent_ID";
    public $timestamps = false;

    public function info()
    {
    	return $this->hasOne('App\personalInfoConnection','pinfo_ID','personal_info_ID');
    }
}
