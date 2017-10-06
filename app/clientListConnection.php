<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientListConnection extends Model
{
    protected $table = 'tbl_client_list';
    protected $primaryKey = 'client_ID';
    public $timestamps = false;

    public function individual()
    {
    	return $this->hasOne('App\clientConnection', 'client_ID');
    }

    public function company()
    {
    	return $this->hasOne('App\inscompanyConnection', 'comp_ID', 'client_ID');
    }
}
