<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class premiumPAConnection extends Model
{
    protected $table = 'tbl_premium_pa';
    protected $primaryKey = 'premiumPA_ID';
    public $timestamps = false;

    public function insurance_comp()
    {
    	return $this->belongsTo('App\inscompanyCOnnection','insurance_compID','comp_ID');
    }
}
