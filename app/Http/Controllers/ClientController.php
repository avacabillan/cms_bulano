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
use DB;

class ClientController extends Controller
{
    public function index(){
     
        return view('pages.client.dashboard');
    }

    public function showAssoc(){
        $assoc = Auth::user()->clients->assoc_id;
           $assocs = Associate::query()
            ->where('id', '=', $assoc)
            ->get();
        return view('pages.client.my_assoc')->with('assocs',$assocs);
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

}
