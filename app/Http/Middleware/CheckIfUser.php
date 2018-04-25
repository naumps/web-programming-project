<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role1,$role2,$role3)
    {

        if(auth()->check()){


            if(!auth()->user()->hasRole($role1) && !auth()->user()->hasRole($role2) && !auth()->user()->hasRole($role3)){
                auth()->logout();
                return redirect(route('login'));

            }

        }else{
            return redirect(route('login'));
        }
        return $next($request);
    }
}
