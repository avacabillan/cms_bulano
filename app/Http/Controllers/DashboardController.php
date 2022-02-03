<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Associate;
use App\Models\Client;
use App\Models\ClientTax;
use App\Models\TaxForm;
use DB;
class DashboardController extends Controller
{
    public function index(){

        if(Auth::user()->role=='admin'){ 
            $associates = Associate::all();
            return view ('pages.admin.dashboard', compact('associates'));

        }elseif (Auth::user()->role=='associate'){
            $associate = Auth::user()->associates->id;
            $clients = Client::query()
            ->where('assoc_id', '=', $associate )
            ->get();
            // dd( $clients);
            return view ('pages.associate.dashboard',compact('clients'));
        }elseif (Auth::user()->role=='client'){ 
            
            $clients = Auth::user()->clients;
            $clients->clientTaxes;
            

        //    $assoc = Auth::user()->clients->assoc_id;
        //    $assocs = Associate::query()
        //     ->where('id', '=', $assoc)
        //     ->get();
        //    dd($client);
            return view ('pages.client.dashboard', compact('clients'));
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
