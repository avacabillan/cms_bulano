<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class ClientController extends Controller
{
    public function newclient()
    {
        $associate= Associate::all();
        $clients = Client::all();
        return view('pages.associate.clients.add_client');
    }
    public function insertclient(Request $request)
    {
        // CLIENT INFO
        // $associate =new Associate();
        // $associate ->assoc_id

        $client =new Client();
        $client ->client_name = $request->clientname;
        $client ->email = $request->email;
        $client ->contact_number = $request->client_contact;
        $client ->ocn = $request->ocn;
        $client ->save();

        // $group =new Group();
        // $group ->group_name = $request->group;
        // $group ->save();

        // $corporate =new Corporate();
        // $corporate ->corporate_name = $request->corporate;
        // $corporate ->save();

        
        $client_province =new ClientProvince();
        $client_province ->province_name =$request->client_province;
        $client_province ->save();

        $client_city =new ClientCity();
        $client_city ->city_name =$request->client_city;
        $client_city ->client_province =$client_province->id;
        $client_city ->save();

        $client_postal =new ClientPostal();
        $client_postal ->city_name =$request->client_postal;
        $client_postal ->client_city =$client_city->id;
        $client_postal ->save();

        $location_address =new LocatedAddress();
        $location_address ->location =$client_postal->id;


        $registered_address =new RegisteredAddress();
        $registered_address ->registered_address =$location_address->id;
        $registered_address ->unit_house_no =$request ->unit_house_no;
        $registered_address ->street =$request ->street;
        $registered_address ->save();


        $business =new Business();
        $business ->client_id =$client->id;
        $business ->trade_name =$request->trade_name;
        $business ->registration_date =$request->reg_date;
        // $business ->corporate_id =$corporate->id;
        $business ->business_address =$registered_address->id;
        $business ->save();

    }
}
