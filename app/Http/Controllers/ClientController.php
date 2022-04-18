<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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

        $datas = DB::table('client_tax_files')
        ->where('client_tax_files.tax_form_id', '=', $id)
        ->where('client_tax_files.client_id', '=',  $client)
        ->where('deleted_at', '=', null)
        ->get();
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
