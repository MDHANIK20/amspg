<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    //
    protected $fillable = [
        'rno', 'bid', 'seats'
    ];

    public $timeamps = true;
}
