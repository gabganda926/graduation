<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inscompanyConnection extends Model
{
    protected $table = 'tbl_company_info';
    protected $primaryKey = 'comp_ID';
    public $timestamps = false;

    public function lists()
    {
    	return $this->belongsTo('App\clientListConnection', 'client_ID', 'comp_ID');
    }

    public function address()
    {
    	return $this->hasOne('App\addressConnection','add_ID','comp_add_ID');
    }

    public function contact()
    {
    	return $this->hasOne('App\contactPersonConnection','cPerson_ID', 'comp_cperson_ID');
    }

    public function agent()
    {
    	return $this->hasOne('App\salesAgentConnection', 'agent_ID', 'comp_sales_agent');
    }

}
