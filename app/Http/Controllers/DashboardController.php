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
}
