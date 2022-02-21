<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login')->with('message','Your account needs an approval from the admin, wait for email within 3 days ');
        }
        // if(auth()->check()){
        //     if(!auth()->user()->'1'){
        //         auth()->logout();
        //         return redirect()->route('login')->with('message','Your account needs an approval from the admin, wait for email within 3 days ');
        //     }
        // }
        return $next($request);
    }
}
