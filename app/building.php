<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class building extends Model
{
    //
    
    protected $table = "buildings";
    public $primarykey = "id";
    public $timeapms = true;

    protected $fillable = [
        'name', 'lid', 'address', 'ownername',
    ];
}
