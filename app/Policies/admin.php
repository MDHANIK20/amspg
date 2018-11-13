<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use auth;   
class admin
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function adminonly($user){
              
        foreach (Auth::user()->role as $role) {
            if($role->name == 'admin'){
                return true;
            }
            else {
                return false;
            }
        }
    }
    public function manageronly($user){
              
        foreach (Auth::user()->role as $role) {
            if($role->name == 'manager'){
                return true;
            }
            else {
                return false;
            }
        }
    }
}
