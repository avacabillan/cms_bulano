<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->role=='admin'){
                return redirect()->route('pages.admin.dashboard');
            }
            elseif(Auth::user()->role=='associate'){
                
                return redirect()->route('pages.associate.dashboard');
            }
            elseif(Auth::user()->role=='client'){
                return redirect()->route('pages.client.dashboard');
            }
            
        }
        return back()->withErrors([
            '       Error: Invalid user         ',
        ]);
    }
}
