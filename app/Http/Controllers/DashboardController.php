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
            $reqs= DB::table('requestee')
            ->count();
            $birs= DB::table('reminders')
            ->count();
            $ddlines= DB::table('bulano_deadline')
            ->count();
            $assocs= DB::table('associates')
            ->count();
            $clients= DB::table('clients')
            ->count();
            $archives= DB::table('tax_archived_forms')
            ->count();
            return view ('pages.admin.dashboard', 
            compact('associates', 'reqs','birs','ddlines','assocs','clients','archives'));

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
    //count request
    public function count(){
       
        $reqs= DB::table('requestee')
        ->count();
        $birs= DB::table('reminders')
        ->count();
        $ddlines= DB::table('bulano_deadline')
        ->count();
        $assocs= DB::table('associates')
        ->count();
        $clients= DB::table('clients')
        ->count();
        $archives= DB::table('tax_archived_forms')
        ->count();
        return view ('pages.admin.sidebar', 
        compact('reqs','birs','ddlines','assocs','clients','archives'));
    }
    public function countRequest(){
       
        $request= DB::table('users')
        ->where('approved','=','0')
        ->count();
        return view ('shared.sidebar')->with( 'request', $request);
    }
   
   
}
