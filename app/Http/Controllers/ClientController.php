<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ClientTax;

class ClientController extends Controller
{
    public function index(){
        
        return view('pages.client.dashboard');
    }
    public function clientMarkNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }

    public function showAssoc(){
        $id = Auth::user()->clients->id;
           $client = Client::find($id);
           $client->associates;
        return view('pages.client.my_assoc',compact('client')); 
    }
    public function declarationshowForm($id){
        $showfile=ClientTax::find($id);
      //  dd( $showfile);
      
        return view('pages.client.client_form',compact('showfile', $showfile));
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
