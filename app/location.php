<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    //

    protected $table = "locationtbl";
    public $primarykey = "id";
    public $timeapms = true;

    protected $fillable = [
        'state', 'city', 'location','pin'
    ];
    

}