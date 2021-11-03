<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if($role =='employee' && Auth::user()->role !='admin'){
            abort(code:403);
        }
        if($role =='employee' && Auth::user()->role !='associate'){
            abort(code:403);
        }
        if($role =='student' && Auth::user()->role !='client'){
            abort(code:403);
        }
      
        return $next($request);
    }
}
