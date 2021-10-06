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

class Assoc_ClientController extends Controller
{ 
  
        public function index (Request $request) {
                        
        $modes= ModeOfPayment::all();
        $corporates= Corporate::all();
        $taxForms= TaxForm::all();
        

            if ($request->ajax()) {
                $data = Client::latest()->get();
                return Datatables::of($data) 
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    $btn = '<button type="button" class="btn btn-success btn-sm" >
                    <i class="fas fa-edit"></i>
                    </button>
                    ';
                    // data-toggle="modal" data-route="'.route("clients.list.editClientProfile", $row->id).'" data-id="'.$row->id.'" data-target="#editModal"
                    $btn = $btn.'<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-route="'.route("clients.list.clienProfile", $row->id).'" 
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
            
            return view ('pages.associate.clients.clients_list')
            ->with( compact('modes',$modes,
                            'corporates',$corporates,
                            'taxForms',$taxForms,
                            
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
        
        return redirect()->route('clients.list');

    }
    // public function showClientProfile($id){
    //     $client = Client::find ($id); 
    //     return view('pages.associate.clients.client_profile')->with("client", $client);
    // }
   
     public function showGroups()
     {
        //  select corporates that is belong to specific group
        // $groups = Corporate::orderBy('id','asc')->where('group_id', 1)->get();
        // return view('welcome')->with("groups", $groups);
    }
    
    public function getUser($userId)
    {
        $user = Client::find($userId);
         return view('pages.associate.clients.client_profile')->with( $user);
    }
    public function editClient($userId)
    {
        $client = Client::find($userId);
        return view('pages.associate.clients.client_profile')->with("client", $client);
    }

    // public function deleteClient(Request $request){
    //     $client_id = $request->client_id;
    //     $query = Country::find($client_id)->delete();

    //     if($query){
    //         return response()->json(['code'=>1, 'msg'=>'CLient has been deleted from database']);
    //     }else{
    //         return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
    //     }
    // }

    // public function deleteSelectedClient(Request $request){
    //    $client_ids = $request->client_ids;
    //    Client::whereIn('id', $client_ids)->delete();
    //    return response()->json(['code'=>1, 'msg'=>'CLient have been deleted from database']); 
    // }

}
