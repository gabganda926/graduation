<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientNotificationConnection extends Model
{
    protected $table = 'tbl_client_notif';
    protected $primaryKey = 'notification_ID';
    public $timestamps = false;

    public function client()
    {
    	return $this->belongsTo('App\clientSystemAccountConnection','account_ID','account_ID');
    }
}
