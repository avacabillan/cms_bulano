<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
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
use App\Models\TaxFile;
use App\Models\ClientTax;
use App\Models\Tin;
use App\Models\User;
use App\Models\Reminder;
use DataTables;


class Admin_ClientController extends Controller
{
    public function index (Request $request) {
                        
        // $modes= ModeOfPayment::all();
        // $corporates= Corporate::all();
        // $taxForms= TaxForm::all();
        // // $clients =Client::all();
        // $assocs =Associate::all();
        // $businesses = Business::all();
        // $tins = Tin::all();
        // $registered_address = RegisteredAddress::all();
            
            return view ('pages.admin.clients.clients_list');
            // ->with('modes',$modes)
            // ->with('corporates',$corporates)
            // ->with('taxForms',$taxForms)
            // // ->with('clients',$clients)
            // ->with('businesses',$businesses)
            // ->with('tins',$tins)
            // ->with('assocs',$assocs)
            // ->with('registered_address', $registered_address);
        
    }
    public function clientDatatable(Request $request) 
    {
        if ($request->ajax()) {
            $data = Client::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('client-profile',$row->id).'" class="edit btn btn-success btn-sm">View</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
   
    public function ClientProfile($id){
        
       
        $client = Client::find($id);
        
       
        $client->modeofpayment;
                $client->tin;
                $client->business;
                $client->registeredAddress;
                $client->associates;
                $client->clientTaxes;
                $client->taxFile;
                
        return view('pages.admin.clients.client_profiles', compact('client',$client));
     
    }
    public function create()
    {
        $modes= ModeOfPayment::all();
        $corporates= Corporate::all();
        $taxForms= TaxForm::all();
        $clients =Client::all();
        $assocs =Associate::all();
        $businesses = Business::all();
        $tins = Tin::all();
        $users = User::all();
        $registered_address = RegisteredAddress::all();

        return view ('pages.admin.clients.add_client')
            ->with('modes',$modes)
            ->with('corporates',$corporates)
            ->with('taxForms',$taxForms)
            ->with('clients',$clients)
            ->with('businesses',$businesses)
            ->with('tins',$tins)
            ->with('assocs',$assocs)
            ->with('myusers',$users)
            ->with('registered_address', $registered_address);
    }
    public function insertClient(Request $request )
    {
        $myuser= new User;
        $myuser->name= $request->client_name;
        $myuser->role='client';
        $myuser->email=$request->username;
        $myuser->password=Hash::make($request->password);
        $myuser->save();

        $client =new Client();
        $client->user_id=$myuser->id;
        $client ->company_name = $request->client_name;
        $client ->email_address = $request->email;
        $client ->contact_number = $request->client_contact;
        $client ->ocn = $request->ocn;
        $client ->assoc_id =$request->assoc;
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
                    $client_tax_form->status = 'pending';
                    $client_tax_form->save();
                }
            
        }
        return redirect()->route('requestee');


    }
   
    public function getArchive() 

    {   
        $onlySoftDeleted = TaxFile::onlyTrashed()->get();
        return view('pages.admin.clients.archives',compact([ 'onlySoftDeleted' ]));
    }
    
  
   
     public function showGroups()
     {
        //  select corporates that is belong to specific group
        // $groups = Corporate::orderBy('id','asc')->where('group_id', 1)->get();
        // return view('welcome')->with("groups", $groups);
    }
    
  
   
    
    




}
