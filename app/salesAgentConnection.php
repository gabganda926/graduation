<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salesAgentConnection extends Model
{
    protected $table = 'tb_salesagent';
    protected $primaryKey = "agent_ID";
    public $timestamps = false;
}
