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
            
            return view ('pages.client.dashboard', compact('clients'));
        }
    }
   
  
   
}
