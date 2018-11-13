<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manager extends Model
{
    //
    protected $table = "managers";
    public $primarykey = "id";
    public $timeamps = true;

    protected $fillable = [
        'name', 'email', 'bid','profilepic'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

