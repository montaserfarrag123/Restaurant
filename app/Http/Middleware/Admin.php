<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Admin
{

    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->is_admin == 1){
            return $next($request);
        }
        return Redirect('login');
    }
}
