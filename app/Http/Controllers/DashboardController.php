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
            // if(Auth::user()->role=='admin'){
            //     Alert::info('Success', 'You are logged in as Admin!');
            // }
            return view ('pages.admin.dashboard', compact('associates'));

        }elseif (Auth::user()->role=='associate'){
            $date = Carbon::now()->format('Y-m-d');
            $associate = Auth::user()->associates->id;
            $clients = Client::query()
            ->where('assoc_id', '=', $associate )
            ->get();
            $clientDeadlines =  DB::table('client_taxes')
            ->join('clients','client_taxes.client_id' , '=','clients.id' )
            ->join('bulano_deadline', 'client_taxes.tax_form_id', '=', 'bulano_deadline.taxform_id')
            ->join('client_tax_forms', 'client_taxes.tax_form_id', '=', 'client_tax_forms.id')
            ->where('start_date','=',$date )
            ->where('clients.assoc_id', '=',$associate)
            ->select('company_name','start_date')
            ->get();
            //   dd( $clientDeadlines);
            // if(Auth::user()->role=='associate'){
            //     Alert::info('Success', 'You are logged in as Associate!');
            // }
            return view ('pages.associate.dashboard',compact('clients','clientDeadlines' ));
        }elseif (Auth::user()->role=='client'){ 
 
        
        $date =Carbon::today();
        $future =  Carbon::today()->addWeeks(3); 
        //$month = $date->month()->format('m-d-Y');
        $client = Auth::user()->clients->id;
         //dd( $future);
          //Get reminder title accord to deadline 

        $reminders = DB::table('client_taxes')
        ->join('clients','client_taxes.client_id' , '=','clients.id' )
        ->join('bulano_deadline', 'client_taxes.tax_form_id', '=', 'bulano_deadline.taxform_id')
        ->join('client_tax_forms', 'client_taxes.tax_form_id', '=', 'client_tax_forms.id')
        ->whereBetween('start_date',[$date, $future ] )
        ->where('clients.id', '=',$client)
        ->select('title', 'start_date','client_tax_forms.tax_form_no', 'client_taxes.status')
        ->get();
        // if(Auth::user()->role=='client'){
        //     Alert::info('Success', 'You are logged in as Client!');
        // }
            return view ('pages.client.dashboard', compact('reminders', [$reminders]));
        }
    }
    public function assocClient($id){
        
    }
   
  
   
}
