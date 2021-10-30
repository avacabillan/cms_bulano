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
use App\Models\TaxFile;
use App\Models\ClientTax;
use App\Models\Tin;
use App\Models\Reminder;

class Assoc_ClientController extends Controller
{
    
    public function index (Request $request) {
                        
        $modes= ModeOfPayment::all();
        $corporates= Corporate::all();
        $taxForms= TaxForm::all();
        $clients =Client::all();
        $assocs =Associate::all();
        $businesses = Business::all();
        $tins = Tin::all();
        $registered_address = RegisteredAddress::all();
            
            return view ('pages.associate.clients.clients_list')
            ->with( compact('modes',$modes,
                            'corporates',$corporates,
                            'taxForms',$taxForms,
                            'clients',$clients,
                            'businesses',$businesses,
                            'tins',$tins,
                            'assocs',$assocs,
                            'registered_address', $registered_address
                            
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
                    $client_tax_form->reminder_date = $request ->reminder_date;  
                    $client_tax_form->save();
                }
            
        }
        return redirect()->back();

        // $reminders = new Reminder();
        // $reminders ->client_tax_id = $client_tax_form->id;
        // $reminders ->client_id = $client->id;
        // $reminders ->status = 'pending';
        // $reminders ->reminder = 'Pay Tax';
        // // $reminders ->schedule_date = '2021-20-10';
        // $reminders->save();
        // return redirect()->route('clients.list');

    }
    public function showClientProfile($id){
        
        $client = Client::find($id);
        $modes =  ModeOfPayment::all();
        $tins =  Client::find($id)->tin;
        $businesses = Client::find($id)->business;
        $taxTypes =TaxType::all();
        $taxFiles=TaxFile::all();
        $registeredAddress = Client::find($id)->registeredAddress;
        return view('pages.associate.clients.client_profile')
        ->with( 'client',$client) 
        ->with( 'modes',$modes)
        ->with('tins',$tins)
        ->with('businesses',$businesses)
        ->with( 'registeredAddress', $registeredAddress)
        ->with( 'taxTypes', $taxTypes)
        ->with('taxFiles', $taxFiles)
        ;
    }
    
  
   
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
        $modes =  Client::find($id)->modeofpayment;
        $tins =  Client::find($id)->tin;
        $businesses = Client::find($id)->business;
        $registeredAddress = Client::find($id)->registeredAddress;
        return view('pages.associate.clients.edit_client')
        ->with( 'client',$client) 
        ->with( 'modes',$modes)
        ->with('tins',$tins)
        ->with('businesses',$businesses)
        ->with( 'registeredAddress', $registeredAddress)
        ;
       

    }
    public function updateClient(Request $request, $id)
    {   
        
        $client =Client::find($id);
        $client ->client_name = $request->client_name;
        $client ->email = $request->email;
        $client ->contact_number = $request->client_contact;
        $client->update();


        // // //tin
        // $client =Tin::find($request->client_id);
        // $tin = DB::table('client_tin')
        // ->join('clients','client_tin.client_id','=','clients.id')
        // ->select('tin_no')
        // ->get();
        // dd($tin);

        // $tin_no= $request->tin;
        // $tin_no->update($tin);



        // $client =Client::find($id)->tin;
        // dd($client);
        // $client->tin_no =$request->tin;
        // $client->tin_no=update();

        // $client = Client::where('id', $request->client_id);

        // $tin =DB::update('update client_tin set tin_no = ? where name = ?', ['$request->tin']);
            
            

        
        //business
        // $client =Client::find($request->client_id)->business;
        // $business ->trade_name =$request->trade_name;
        // $business ->registration_date =$request->reg_date;
        // $business->update();
        // $business = Client::where('id', $request->client_id);
        //     DB::table('client_business')->update([
        //         'trade_name' => $request->trade_name,
        //         'registration_date' =>$request->reg_date
        //     ]);

        //registered address
        // $client =Client::find($request->client_id)->registeredAddress;
        // $registeredAddress ->city_name =$request ->client_city;
        // $registeredAddress ->province_name =$request ->client_province;
        // $registeredAddress ->unit_house_no =$request ->unit_house_no;
        // $registeredAddress ->street =$request ->street;
        // $registeredAddress ->postal_no =$request ->client_postal;
        // $registeredAddress->update();

        // $registeredAddress = Client::where('id', $request->client_id);
        //     DB::table('client_registered_address')->update([
        //         'city_name' => $request ->client_city,
        //         'province_name' =>$request ->client_province,
        //         'unit_house_no' =>$request ->unit_house_no,
        //         'street' =>$request ->street,
        //         'postal_no' =>$request ->client_postal
        //     ]);

       
        // $client_name = $request->input('client_name');
        // $email = $request->input('email');
        // $contact_number = $request->input('client_contact');
        // $ocn = $request->input('ocn');
        // // $client ->assoc_id =$associate->id;
        // // $client ->mode_of_payment_id =$request ->mode;
        // DB::update('update Client set client_name = ? email=? contact_number=? ocn=? where  client_name = ? email=? contact_number=? ocn=? id=?', [$client_name,$email,$contact_number,$ocn,$id]);

        
        $client_tin = Client::find($id)->tin;
        $client_tin->tin_no =$request->tin;
        // $client_tin->save();
        dd($client_tin);

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
        

        
        return redirect()->route('clients.list');
    }




}
