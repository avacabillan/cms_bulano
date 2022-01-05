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


class Admin_ClientController extends Controller
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
            
            return view ('pages.admin.clients.clients_list')
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
 

   
   
    public function ClientProfile($id){
        
        $client = Client::find($id);
        $modes =  ModeOfPayment::all();
        $tins =  Client::find($id)->tin;
        $businesses = Client::find($id)->business;
        $taxTypes =TaxType::all();
        $taxFiles=TaxFile::all();
        $registeredAddress = Client::find($id)->registeredAddress;
        return view('pages.admin.clients.client_profile')
        ->with( 'client',$client) 
        ->with( 'modes',$modes)
        ->with('tins',$tins)
        ->with('businesses',$businesses)
        ->with( 'registeredAddress', $registeredAddress)
        ->with( 'taxTypes', $taxTypes)
        ->with('taxFiles', $taxFiles)
        ;
     
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
    
    // public function getUser($userId)
    // {
    //     $user = Client::find($userId);
    //      return view('pages.associate.clients.client_profile')->with( $user);
    // }
   
   
    
    




}
