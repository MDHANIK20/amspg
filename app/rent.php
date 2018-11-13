<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rent extends Model
{
    //
    protected $table ="rents";
    public $primarykey = "id";
    public $timeamps = true;
    protected $fillable = [
        'cid', 'paydate', 'rid', 'rcpid', 'amtpaid', 'paymode', 'balance', 'cmnt'
    ];
}
