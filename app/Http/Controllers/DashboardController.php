<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Associate;
use App\Models\Client;
use App\Models\ClientTax;
use App\Models\TaxForm;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
class DashboardController extends Controller
{
    public function index(){

        if(Auth::user()->role=='admin'){ 
            $associates = Associate::all();
            if(Auth::user()->role=='admin'){
                Alert::info('Success', 'You are logged in as Admin!');
            }
            return view ('pages.admin.dashboard', compact('associates'));

        }elseif (Auth::user()->role=='associate'){
            $associate = Auth::user()->associates->id;
            $clients = Client::query()
            ->where('assoc_id', '=', $associate )
            ->get();
            // dd( $clients);
            if(Auth::user()->role=='associate'){
                Alert::info('Success', 'You are logged in as Associate!');
            }
            return view ('pages.associate.dashboard',compact('clients'));
        }elseif (Auth::user()->role=='client'){ 
 
        $date =Carbon::now()->format('Y-m-d'); 
        $client = Auth::user()->clients->id;

          //Get reminder title accord to deadline 

        $reminders = DB::table('client_taxes')
        ->join('clients','client_taxes.client_id' , '=','clients.id' )
        ->join('bulano_deadline', 'client_taxes.tax_form_id', '=', 'bulano_deadline.taxform_id')
        ->join('client_tax_forms', 'client_taxes.tax_form_id', '=', 'client_tax_forms.id')
        ->where('start_date', '=', $date  )
        ->where('clients.id', '=',$client)
        ->select('title', 'start_date','client_tax_forms.tax_form_no', 'client_taxes.status')
        ->get();
        if(Auth::user()->role=='client'){
            Alert::info('Success', 'You are logged in as Client!');
        }
            return view ('pages.client.dashboard', compact('reminders', [$reminders]));
        }
    }
    public function assocClient($id){
        
    }
   
  
   
}
