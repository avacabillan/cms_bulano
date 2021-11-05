<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('admin')){
            return view ('pages.admin.dashboard');
        }elseif (Auth::user()->hasRole('associate')){
            return view ('pages.associate.dashboard');
        }elseif (Auth::user()->hasRole('client')){
            return view ('pages.client.dashboard');
        }
    }
    public function countClient(){
        $clients= DB::table('users')
        // ->where('approved','=','0')
        ->count();
        // $request= DB::table('users')
        // ->where('approved','=','0')
        // ->count();
        return view ('pages.associate.sidebar')->with(compact('clients', $clients));
    }
    public function countRequest(){
       
        $request= DB::table('users')
        ->where('approved','=','0')
        ->count();
        return view ('shared.sidebar')->with( 'request', $request);
    }
}
