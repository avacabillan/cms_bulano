<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApprovalMiddleware
{
   
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()){
            if(!auth()->user()->approved){
                auth()->logout();
                return redirect()->route('login')->with('message','Your account needs an approval in order to login  ');
            }
        }
        return $next($request);
    }
}
