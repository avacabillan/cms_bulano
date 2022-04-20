<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\FieldRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Associate;
use App\Models\Business;
use App\Models\Corporate;
use App\Models\ModeOfPayment;
use App\Models\RegisteredAddress;
use App\Models\TaxForm;
use App\Models\Requestee;
use App\Models\TaxFile;
use App\Models\ClientTax;
use App\Models\Tin;
use App\Models\User;
use \Yajra\Datatables\Datatables;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserApprovedNotification;

class Admin_ClientController extends Controller
{
    public function index (Request $request) {
                        
    
            return view ('pages.admin.clients.clients_list');
  
    }
    public function adminMarkNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
    public function clientDatatable(Request $request) 
    {
        if ($request->ajax()) {
            $data = Client::with('associates');
            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('associates', function (Client $client) {
                    return $client->associates->name;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('client-profile',$row->id).'" class="edit btn btn-success btn-sm">View</a>  
                                    <a href="'.route('delete_client',$row->id).'"  onclick="return confirm(`Are you sure  you want to delete this data? `)" class="edit btn btn-danger btn-sm show_confirm">Delete</a>';
                    return $actionBtn;
                })
                
                ->rawColumns(['action', 'associates'])
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
    public function create($id)
    {
        $requestee = Requestee::find($id);
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
            ->with('requestee',$requestee)
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
    public function viewCompany()
    {
        $corporates= Corporate::all();
        $clients =Client::all();
        $businesses = Business::all();
        $registered_address = RegisteredAddress::all();

        return view ('pages.admin.clients.add_client')
            
            ->with('corporates',$corporates)
            
            ->with('clients',$clients)
            ->with('businesses',$businesses)

            ->with('registered_address', $registered_address);
    }
    public function insertClient(FieldRequest $request, $id )
    {
  
    
     /**
     * Store a new blog post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    $validator = Validator::make($request->all(), [
        'ocn' => 'bail|required|max:255',
        'client_name' => 'required',
        'email' => 'required',
        'tin' => 'required',
        'client_contact' => 'required',
        'tin' => 'required|numeric',
        'reg_date' => 'required',
        'trade_name' => 'required',
        'corporate' => 'required',
        'assoc' => 'required',
        'mode' => 'required',
        'unit_house_no' => 'required',
        'street' => 'required',
        'client_city' => 'required',
        'client_province' => 'required',
        'client_postal' => 'required',
       
        
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

       

        

        $requestee = Requestee::find($id);
        $requestee->status = true;
        if( $requestee->status = true){
            $requestee->forceDelete();
        }
       
        
        $myuser= new User;
        $myuser->name= $request->client_name;
        $myuser->role='client';
        $myuser->email=$request->username;
        $myuser->password=Hash::make($request->username);
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
                    $client_tax_form->status = false;
                    $client_tax_form->save();
                }
            
        }
        $url = 'http://127.0.0.1:8000/';

        $users = User::where('role', 'associate')->get();
        Notification::send($users, new UserApprovedNotification ($client));
        Mail::to($client['email_address'])->send(new WelcomeMail($myuser, $url));
        if($myuser['name'] == $client['company_name']){
            Alert::success('Success', 'Client Successfuly Added!');
        }
        return redirect()->route('requestee');


    }
   
    public function getArchive() 

    {   
        $onlySoftDeleted = TaxFile::onlyTrashed()->get();
        return view('pages.admin.clients.archives',compact([ 'onlySoftDeleted' ]));
    }
  
    public function getclients(Request $req)
    {
        $clients=Client::where("assoc_id",$req->id)->get();
        return $clients;

   }

   public function transferclient(Request $req)
   {
    foreach($req->checkbox as $checkbox){
        $client=Client::find($checkbox);
        $client->assoc_id=$req->assoc;
        $client->save();
    }
    Alert::success('Success', 'Client Successfuly Transfered!');
    return redirect()->back();
  }
    public function deleteClient($id){
        $client = Client::find($id);
        $client->tin()->delete();
        $client->business()->delete();
        $client->registeredAddress()->delete();
        $client->clientTaxes()->delete();
        $client->taxFile()->delete();
        $client->user()->delete();
        $client->delete();
        if( $client){
             Alert::success('Success', 'Clients data Successfuly Deleted!');
             
         }
         return redirect()->back();
    }
  
   
    
    




}
