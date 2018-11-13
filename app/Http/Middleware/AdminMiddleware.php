<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        foreach (Auth::user()->role as $role) {
           
            if($role->name == 'admin'){
                return redirect('admin/dashboard');
            }
            elseif($role->name=='manager'){
               return redirect('manager/dashboard');
            }
            return redirect('user/dashboard');
        }
        
    }
}
