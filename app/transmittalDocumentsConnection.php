<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transmittalDocumentsConnection extends Model
{
    protected $table = 'tbl_transmittal_documents';
    protected $primaryKey = 'req_ID';
    public $timestamps = false;
}
