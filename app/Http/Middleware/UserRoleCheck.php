<?php

namespace App\Http\Middleware;

use Closure;

class UserRoleCheck
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
        if(!$request->user()->role >= 2)
        {
            return redirect('home');
        }

        return $next($request);
    }
}
