<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role1,$role2)
    {
        if(auth()->check()){


            if(!auth()->user()->hasRole($role1) && !auth()->user()->hasRole($role2)){
                auth()->logout();
                return redirect(route('login'));

            }

        }else{
            return redirect(route('login'));
        }
        return $next($request);
    }
}
