<?php

namespace App\Http\Middleware;

use Closure;

class StoreLogin
{
  
    public function handle($request, Closure $next)
    {
        if(auth()->user()->isAdmin()){
            return $next($request);
        }
        return redirect('home1');
    }
}
