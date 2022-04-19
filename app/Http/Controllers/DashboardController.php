<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Associate;
use App\Models\Client;
use App\Models\ClientTax;
use App\Models\User;
use Carbon\CarbonStr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
class DashboardController extends Controller
{
    public function index(){

        if(Auth::user()->role=='admin'){ 
            $associates = Associate::where('status', 0)->get();
            $date =Carbon::today();
            // $ttest =Carbon::now()->format('m');
            $future =  Carbon::today()->addWeeks(2);
           
           
            $notifications = auth()->user()->unreadNotifications;
            $clientDeadlines =  DB::table('client_taxes')
            ->join('clients','client_taxes.client_id' , '=','clients.id' )
            ->join('bulano_deadline', 'client_taxes.tax_form_id', '=', 'bulano_deadline.taxform_id')
            ->join('client_tax_forms', 'client_taxes.tax_form_id', '=', 'client_tax_forms.id')
            ->whereBetween('start_date',[$date, $future ] )
            ->whereMonth('start_date', '=','$ttest')
            ->select('company_name','start_date','tax_form_no' )
            ->orderBy( 'company_name','asc')
            ->get();
           // dd($future);
            return view ('pages.admin.dashboard', compact('associates', 'clientDeadlines', 'notifications'));

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
           
            return view ('pages.associate.dashboard',compact('clients','clientDeadlines' ));
        }elseif (Auth::user()->role=='client'){ 
 
        
        $date =Carbon::today();
        $future =  Carbon::today()->addWeeks(3); 
        $client = Auth::user()->clients->id; 
        $reminders = DB::table('client_taxes')
        ->join('clients','client_taxes.client_id' , '=','clients.id' )
        ->join('bulano_deadline', 'client_taxes.tax_form_id', '=', 'bulano_deadline.taxform_id')
        ->join('client_tax_forms', 'client_taxes.tax_form_id', '=', 'client_tax_forms.id')
        ->whereBetween('start_date',[$date, $future ] )
        ->where('clients.id', '=',$client)
        ->select('title', 'start_date','client_tax_forms.tax_form_no', 'client_taxes.status', 'client_taxes.id')
        ->get();
            return view ('pages.client.dashboard', compact('reminders', [$reminders]));
        }
    }

   
  
   
}
