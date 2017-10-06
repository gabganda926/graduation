<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientConnection extends Model
{
    protected $table = 'tbl_client';
    protected $primaryKey = "client_ID";
    public $timestamps = false;

    public function lists()
    {
    	return $this->belongsTo('App\clientListConnection', 'client_ID');
    }

    public function details()
    {
    	return $this->hasOne('App\personalInfoConnection', 'pinfo_ID', 'personal_info_ID');
    }

    public function address()
    {
        return $this->hasOne('App\addressConnection', 'add_ID', 'client_add_ID');
    }
}
