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

      
        if(!empty($request->store))
        {

            if($request->user()->id != $request->store->store_owner_id)
            {
                return redirect('home');
            }
            
            return $next($request);
        }
        else{

            if($request->user()->store_created == 0)
            {
                return $next($request);
            }
        }
        return redirect('home');
    }
}
