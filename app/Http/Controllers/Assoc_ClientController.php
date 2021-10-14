<?php

namespace App\Http\Controllers;
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

class Assoc_ClientController extends Controller
{
    
    public function index (Request $request) {
                        
        $modes= ModeOfPayment::all();
        $corporates= Corporate::all();
        $taxForms= TaxForm::all();
<<<<<<< HEAD
       

            if ($request->ajax()) {
                $data = Client::latest()->get();
                return Datatables::of($data) 
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                   
                    $btn ='<button type="button" class="btn btn-success btn-sm editbtn" data-toggle="modal" data-route="'.route("editForm", $row->id).'" 
                    data-id="'.$row->id.'" data-target="#updateClientModal"> <i class="fas fa-edit"></i>
                    </button>';

                    // data-toggle="modal" data-route="'.route("clients.list.editClientProfile", $row->id).'" data-id="'.$row->id.'" data-target="#editModal"
                    $btn = $btn.'<button type="button" class="btn btn-success btn-sm viewbtn" data-toggle="modal" data-route="'.route("clientProfile", $row->id).'" 
                                    data-id="'.$row->id.'" data-target="#viewClient"> <i class="fas fa-eye"></i>
                                </button>';
                   
                    return $btn;

                })
                 
                 ->addColumn('checkbox', function($row){
                 return '<input type="checkbox" name="client_checkbox" data-id="'.$row['id'].'"><label></label>';
                 })

                ->rawColumns(['actions', 'checkbox'])
                ->make(true);
                
        
            }
=======
        $clients =Client::all();
        $businesses = Business::all();
        $tins = Tin::all();
        $registered_address = RegisteredAddress::all();
>>>>>>> trial-v2
            
            return view ('pages.associate.clients.clients_list')
            ->with( compact('modes',$modes,
                            'corporates',$corporates,
                            'taxForms',$taxForms,
<<<<<<< HEAD
                           
=======
                            'clients',$clients,
                            'businesses',$businesses,
                            'tins',$tins,
                            'registered_address', $registered_address
>>>>>>> trial-v2
                            
            ));
        }


   
    public function insertClient(Request $request )
    {
        // CLIENT INFO
        // $associate =new Associate();
        // $associate ->assoc_id

       

      
        // $corporate =new Corporate();
        // $corporate ->corporate_name = $request->corporate;
        // $corporate ->save();

    

        
        // $client_province =new ClientProvince();
        // $client_province ->province_name =$request->client_province;
        // $client_province ->save();

        // $client_city =new ClientCity();
        // $client_city ->city_name =$request->client_city;
        // $client_city ->province_id =$client_province->id;
        // $client_city ->save();

        // $client_postal =new ClientPostal();
        // $client_postal ->postal_no =$request->client_postal;
        // $client_postal ->client_city_id =$client_city->id;
        // $client_postal ->save();

        // $location_address =new LocationAddress();
        // $location_address ->client_postal_id =$client_postal->id;
        // $location_address ->save();


   

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

        $registered_address =new RegisteredAddress();
        $registered_address->client_id=$client->id;
        $registered_address ->city_name =$request ->client_city;
        $registered_address ->province_name =$request ->client_province;
        $registered_address ->unit_house_no =$request ->unit_house_no;
        $registered_address ->street =$request ->street;
        $registered_address ->postal_no =$request ->client_postal;
        $registered_address ->save();

        $business =new Business();
        $business ->trade_name =$request->trade_name;
        $business ->registration_date =$request->reg_date;
        $business ->corporate_id =$request->corporate;
        $business ->client_id = $client->id;
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
        
        return redirect()->route('clients.list');

    }
<<<<<<< HEAD
    public function showClientProfile($clientId){
        $client = Client::find ($clientId); 
       return view('pages.associate.clients.clients_list')->with('client', $client);
    }
=======
    public function showClientProfile($id){
        $client = Client::find($id);
        $modes = ModeOfPayment::all();
        $tins = Tin::all();
        $businesses = Business::all();
        $registered_address = RegisteredAddress::all();
        return view('pages.associate.clients.client_profile')
        ->with( 'client',$client) 
        ->with( 'modes',$modes)
        ->with('tins',$tins)
        ->with( 'registered_address', $registered_address)
        ;
    }
    
  
>>>>>>> trial-v2
   
     public function showGroups()
     {
        //  select corporates that is belong to specific group
        // $groups = Corporate::orderBy('id','asc')->where('group_id', 1)->get();
        // return view('welcome')->with("groups", $groups);
    }
    
    // public function getUser($userId)
    // {
    //     $user = Client::find($userId);
    //      return view('pages.associate.clients.client_profile')->with( $user);
    // }
   
   
    public function deleteSelectedClients(Request $request){

        $client_ids = $request->clients_ids;
        Client::whereIn('id', $client_ids)->delete();
        return response()->json(['code'=>1, 'msg'=>'Countries have been deleted from database']); 
    
    } 
    
    public function editClient($id)
    {
        $client = Client::find($id);
<<<<<<< HEAD
        return response()->json($client);
       

    }
    public function updateClient(Request $request, $id)
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
=======
        $modes = ModeOfPayment::all();
        $tins = Tin::all();
        $businesses = Business::all();
        $registered_address = RegisteredAddress::all();

        return view('pages.associate.clients.edit_client')
        ->with( 'client',$client) 
        ->with( 'modes',$modes)
        ->with('tins',$tins)
        ->with( 'registered_address', $registered_address)
        ;
       

    }
    public function updateClient(Request $request , $id)
    {
        $client =Client::find($id);
        $client ->client_name = $request->client_name;
        $client ->email = $request->email;
        $client ->contact_number = $request->client_contact;
        $client ->ocn = $request->ocn;
        // $client ->assoc_id =$associate->id;
        $client ->mode_of_payment_id =$request ->mode;
        // //tin
        $client->$tin->tin_no =$request->tin;
        
        //business
        $client->business ->trade_name =$request->trade_name;
        $client->business ->registration_date =$request->reg_date;
        $client->business ->corporate_id =$request->corporate;
        //registered address
        $client->registeredAddress ->city_name =$request ->client_city;
        $client->registeredAddress ->province_name =$request ->client_province;
        $client->registeredAddress ->unit_house_no =$request ->unit_house_no;
        $client->registeredAddress ->street =$request ->street;
        $client->registeredAddress ->postal_no =$request ->client_postal;
        
       
        // $client_name = $request->input('client_name');
        // $email = $request->input('email');
        // $contact_number = $request->input('client_contact');
        // $ocn = $request->input('ocn');
        // // $client ->assoc_id =$associate->id;
        // // $client ->mode_of_payment_id =$request ->mode;
        // DB::update('update Client set client_name = ? email=? contact_number=? ocn=? where  client_name = ? email=? contact_number=? ocn=? id=?', [$client_name,$email,$contact_number,$ocn,$id]);

        
        // $client_tin = Client::find($id)->tin;
        // $client_tin->tin_no =$request->tin;
        // $client_tin->save();

        // $registered_address = Client::find($id)->registeredAddress;
        // $registered_address ->city_name =$request ->client_city;
        // $registered_address ->province_name =$request ->client_province;
        // $registered_address ->unit_house_no =$request ->unit_house_no;
        // $registered_address ->street =$request ->street;
        // $registered_address ->postal_no =$request ->client_postal;
        // $registered_address ->save();

        // $business = Client::find($id)->business;;
        // $business ->trade_name =$request->trade_name;
        // $business ->registration_date =$request->reg_date;
        // $business ->corporate_id =$request->corporate;
        // $business ->registered_address_id =$registered_address->id;
        // $business ->save();
        

        
        return redirect()->route('clients.list')->with('success', 'Data Updated');
>>>>>>> trial-v2
    }




}
