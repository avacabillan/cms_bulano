<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
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



class Assoc_ClientController extends Controller
{
  
        public function index (Request $request) {
            
            if ($request->ajax()) {
                $data = Client::latest()->get();
                return Datatables::of($data)
                ->addColumn('check', '<input type="checkbox" name="selected_users[]" value="{{ $id }}">')
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $actionBtn = '<a href="{{ route ("showClientProfil") }}" class="edit btn btn-info btn-sm">View</a>
                                      <a href="{{ route ("showClientProfile") }}" class="edit btn btn-success btn-sm">Edit</a>
                                      
                                      '
                                      ;
                        return $actionBtn;
                        
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
    
            return view ('pages.associate.clients.clients_list');
        }


   
    public function insertClient(Request $request)
    {
        // CLIENT INFO
        // $associate =new Associate();
        // $associate ->assoc_id

       

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
        $client_city ->province_id =$client_province->id;
        $client_city ->save();

        $client_postal =new ClientPostal();
        $client_postal ->postal_no =$request->client_postal;
        $client_postal ->client_city_id =$client_city->id;
        $client_postal ->save();

        $location_address =new LocationAddress();
        $location_address ->client_postal_id =$client_postal->id;
        $location_address ->save();


        $registered_address =new RegisteredAddress();
        $registered_address ->location_address_id =$location_address->id;
        $registered_address ->unit_house_no =$request ->unit_house_no;
        $registered_address ->street =$request ->street;
        $registered_address ->save();


        

        $client =new Client();
        $client ->client_name = $request->client_name;
        $client ->email = $request->email;
        $client ->contact_number = $request->client_contact;
        $client ->ocn = $request->ocn;
        // $client ->assoc_id =$associate->id;
        $client ->mode_of_payment_id =$request ->mode;
        $client ->save();

        $business =new Business();
        $business ->client_id =$client->id;
        $business ->trade_name =$request->trade_name;
        $business ->registration_date =$request->reg_date;
        // $business ->corporate_id =$corporate->id;
        $business ->registered_address_id =$registered_address->id;
        $business ->save();

        
        return redirect()->route('clients.list');

    }
    public function showClientProfile($id){
        $client = Client::find ($id); 
        return view('pages.associate.clients.client_profile')->with("client", $client);
    }
    public function createClient()
    {   
        $modes = ModeOfPayment::all();
        return view ("pages.associate.clients.add_client")->with ('modes', $modes);
    }


}
