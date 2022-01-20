<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Associate;
use DB;
class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('admin')){  
            $assocs_1 = Associate::find(1);
            $assocs_2 = Associate::find(2);
            $assocs_3 = Associate::find(3);
            $assocClient1 = DB::table('clients')
            ->where('assoc_id', '=', 1)
            ->count();
            $assocClient2 = DB::table('clients')
            ->where('assoc_id', '=', 2)
            ->count();
            $assocClient3 = DB::table('clients')
            ->where('assoc_id', '=', 3)
            ->count();   
            return view ('pages.admin.dashboard', compact('assocs_1', $assocs_1,
                                                            'assocs_2', $assocs_2, 
                                                            'assocs_3', $assocs_3,
                                                            'assocClient1', $assocClient1,
                                                            'assocClient2', $assocClient2,
                                                            'assocClient3', $assocClient3,));
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
