<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
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
use App\Models\Group;
use App\Models\TaxForm;
use App\Models\TaxType;
use App\Models\ClientTax;
use App\Models\Tin;

class ResourceAssoc_ClientController extends Controller
{
 
    public function index()
    {
        $modes= ModeOfPayment::all();
        $corporates= Corporate::all();
        $taxForms= TaxForm::all();
        $clients =Client::all();
            
            return view ('pages.associate.clients.clients_list')
            ->with( compact('modes',$modes,
                            'corporates',$corporates,
                            'taxForms',$taxForms,
                            'clients',$clients
                            
            ));
    }
    

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_name'=> 'required|max:191',
            'email'=>'required|email|max:191',
            'phone'=>'required|max:10|min:10',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
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
    
            $client_tin =new Tin();
            $client_tin->client_id=$client->id;
            $client_tin->tin_no =$request->tin;
            $client_tin->save();
    
            $business =new Business();
            $business ->client_id =$client->id;
            $business ->trade_name =$request->trade_name;
            $business ->registration_date =$request->reg_date;
            $business ->corporate_id =$request->corporate;
            $business ->registered_address_id =$registered_address->id;
            $business ->save();
    
            foreach ($request->taxesChecked as $key =>$val){
                $client_tax_form= new ClientTax();
                    if (in_array($val, $request->taxesChecked)){
                        $client_tax_form->tax_form_id =$request ->taxesChecked[$key];
                        $client_tax_form->client_id =$client->id;   
                        $client_tax_form->save();
                    }
                
            }
            return response()->json([
                'status'=>200,
                'message'=>'Student Added Successfully.'
            ]);
        }
        return redirect()->route('clients.list');
    }

    
    public function show($id)
    {
        $client = Client::find($id);
        return view ('pages.associate.clients.client_profile')->with ('client',$client) ; 
    }

    public function edit($id)
    {
        $client = Client::find($id);
        $modes = ModeOfPayment::all();
        $business = Business::all();
        $address = RegisteredAddress::all();
        
        
        return view('pages.associate.clients.edit_client')
        ->with(compact(
                    'client',$client,
                    'modes',$modes,
                    'business', $business,
                    'address',$address

        ));
    }

 
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|email|max:191',
            'phone'=>'required|max:10|min:10',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $client = Client::find($id);
            if($client)
            {
                $client_province = ClientProvince::find($id);
                $client_province ->province_name =$request->client_province;
                $client_province ->save();

                $client_city = ClientCity::find($id);
                $client_city ->city_name =$request->client_city;
                $client_city ->province_id =$client_province->id;
                $client_city ->save();

                $client_postal = ClientPostal::find($id);
                $client_postal ->postal_no =$request->client_postal;
                $client_postal ->client_city_id =$client_city->id;
                $client_postal ->save();

                $location_address = LocationAddress::find($id);
                $location_address ->client_postal_id =$client_postal->id;
                $location_address ->save();


                $registered_address = RegisteredAddress::find($id);
                $registered_address ->location_address_id =$location_address->id;
                $registered_address ->unit_house_no =$request ->unit_house_no;
                $registered_address ->street =$request ->street;
                $registered_address ->save();


                $client =Client::find($id);
                $client ->client_name = $request->client_name;
                $client ->email = $request->email;
                $client ->contact_number = $request->client_contact;
                $client ->ocn = $request->ocn;
                // $client ->assoc_id =$associate->id;
                $client ->mode_of_payment_id =$request ->mode;
                $client ->save();

                $client_tin = Tin::find($id);
                $client_tin->client_id=$client->id;
                $client_tin->tin_no =$request->tin;
                $client_tin->save();

                $business = Business::find($id);
                $business ->client_id =$client->id;
                $business ->trade_name =$request->trade_name;
                $business ->registration_date =$request->reg_date;
                $business ->corporate_id =$request->corporate;
                $business ->registered_address_id =$registered_address->id;
                $business ->save();

                
                return response()->json([
                    'status'=>200,
                    'message'=>'Client Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Client Found.'
                ]);
            }

        }
    }

  
    public function destroy(Request $request)
    {
        $client_ids = $request->clients_ids;
        Client::whereIn('id', $client_ids)->delete();
        return response()->json(['code'=>1, 'msg'=>'Countries have been deleted from database']); 
    
    }
}