<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class claimReqFilesConnection extends Model
{
    protected $table = 'tbl_claimRequirements_Files';
    protected $primaryKey = 'claimReqFile_ID';
    public $timestamps = false;
}
