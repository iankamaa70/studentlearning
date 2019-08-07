<?php

namespace App\Http\Middleware;

use Closure;

class Approved
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
        if(auth()->user()->isApproved == 1){
            if(auth()->user()->isAdmin==1){
              return  redirect("/users");
            }
            return $next($request);
            }
            return redirect('/approval');
    }
}
