<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Associate;
use App\Models\Business;
use App\Models\ClientCity;
use App\Models\ClientPostal;
use App\Models\ClientProvince;
use App\Models\Corporate;
use App\Models\ModeOfPayment;
use App\Models\RegisteredAddress;
use App\Models\LocationAddress;
use App\Models\Group;
use App\Models\TaxForm;
use App\Models\TaxType;
use App\Models\TaxFile;
use App\Models\ClientTax;
use App\Models\Tin;
use App\Models\User;
use App\Models\Reminder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index(){
        
        return view('pages.client.dashboard');
    }

    public function showAssoc(){
        $id = Auth::user()->clients->id;
           $client = Client::find($id);
           $client->associates;
        return view('pages.client.my_assoc',compact('client'));
    }
    public function showForm($id, $client){
        // $fileForms = Tax::find($id);
        // $fileForms->taxFile;
        $datas = DB::table('client_tax_files')
        ->where('client_tax_files.tax_form_id', '=', $id)
        ->where('client_tax_files.client_id', '=',  $client)
        ->where('deleted_at', '=', null)
        ->get();
        // dd($datas);
        return view('pages.client.client_form',compact('datas'));
    }
    public function showProfile($id){
        $client = Client::find($id);
        $client->modeofpayment;
                $client->tin;
                $client->business;
                $client->registeredAddress;
                $client->associates;
                $client->clientTaxes;
                $client->taxFile;
        return view('pages.client.myprofile',compact('client'));
    }
    public function deadlines(){
        $client = Auth::user()->clients->id;
        $date =Carbon::now()->format('Y-m-d');
        //$future = $date->a 
        $tax_form_id = DB::table('clients')
        ->join('client_taxes', 'clients.id', '=', 'client_taxes.client_id')
        ->join('bulano_deadline', 'client_taxes.tax_form_id', '=', 'bulano_deadline.taxform_id')
        ->where('start_date', '=', $date  )
        ->select('tax_form_id')
        ->get();
       
          //Get reminder title accord to deadline 
        $reminders = DB::table('clients')
        ->join('client_taxes', 'clients.id', '=', 'client_taxes.client_id')
        ->join('bulano_deadline', 'client_taxes.tax_form_id', '=', 'bulano_deadline.taxform_id')
        ->where('start_date', '=', $date  )
        ->distinct()->get('title');
        // dd($reminders);
          //Get clients that has  deadline accord to tax forms
        foreach($tax_form_id as $tax){
            $clients = DB::table('clients')
            ->join('client_taxes', 'clients.id', '=', 'client_taxes.client_id')
            ->where('client_taxes.tax_form_id', '=' , $tax->tax_form_id)
            ->where('clients.id', '=',$client)
            ->pluck('email_address');
           
        }  
         //dd($clients);
         return view('read');
    }

}
