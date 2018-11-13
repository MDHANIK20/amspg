<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expenses extends Model
{
    //
    protected $table = "expenses";
    public $primarykey = "id";
    public $timeapms = true;

    protected $fillable = [
        'discription', 'amount', 'mid','date',
    ];
}
