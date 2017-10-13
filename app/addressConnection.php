<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addressConnection extends Model
{
    protected $table = 'tbl_address';
    public $timestamps = false;
    protected $primaryKey = 'add_ID';

    public function workers()
    {
    	return $this->belongsTo('App\salesAgentConnection', 'agent_add_ID', 'add_ID');
    }

    public function courier()
    {
    	return $this->belongsTo('App\courierConnection', 'courier_add_ID', 'add_ID');
    }

    public function client()
    {
    	return $this->belongsTo('App\clientConnection', 'client_add_ID', 'add_ID');
    }

    public function company()
    {
    	return $this->belongsTo('App\inscompanyConnection', 'comp_add_ID', 'add_ID');
    }

    public function bank()
    {
    	return $this->belongsTo('App\bankConnection', 'bank_add_ID', 'add_ID');
    }
}
