<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addressConnection extends Model
{
    protected $table = 'tb_address';
    public $timestamps = false;
    protected $primaryKey = 'add_ID';

    public function employee()
    {
        return $this->belongsTo('App\employee');
    }
}
