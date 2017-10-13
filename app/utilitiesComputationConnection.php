<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class utilitiesComputationConnection extends Model
{
    protected $table = 'tbl_util_computation';
    protected $primaryKey = "comp_ID";
    public $timestamps = false;

    public function info()
    {
    	return $this->belongsTo('App\insCompanyConnection','comp_ID');
    }
}
