<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function newclient()
    {
        $clients = Client::all();
        return view('pages.associate.clients.add_client');
    }
    public function insertclient(Request $request)
    {
        // CLIENT INFO

        $client =new Client();
        $client ->client_name = $request->clientname;
        $client ->email = $request->email;
        $client ->contact_number = $request->client_contact;
        $client ->ocn = $request->ocn;
        $client ->registrarion_date = $request->regdate;
        $client ->save();

        $business =new Business();
        $business ->client_id =$client->id;
        $business ->trade_name =$request->trade_name;
        $business ->registration_date =$request->reg_date;
        $business ->corporate_id =$corporate->id;



    }
}
