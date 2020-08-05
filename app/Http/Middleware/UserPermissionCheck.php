<?php

namespace App\Http\Middleware;

use Closure;

class UserPermissionCheck
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
        if(!empty($request->store->store_owner))
        {
            if(!$request->user()->id == $request->store->store_owner)
            {
                return redirect('home');
            }
    
        }
        return $next($request);
    }
}
