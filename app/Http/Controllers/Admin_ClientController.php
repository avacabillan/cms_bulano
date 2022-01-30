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
use DataTables;


class Admin_ClientController extends Controller
{
    public function index (Request $request) {
                        
        $modes= ModeOfPayment::all();
        $corporates= Corporate::all();
        $taxForms= TaxForm::all();
        // $clients =Client::all();
        $assocs =Associate::all();
        $businesses = Business::all();
        $tins = Tin::all();
        $registered_address = RegisteredAddress::all();
            
            return view ('pages.admin.clients.clients_list')
            ->with('modes',$modes)
            ->with('corporates',$corporates)
            ->with('taxForms',$taxForms)
            // ->with('clients',$clients)
            ->with('businesses',$businesses)
            ->with('tins',$tins)
            ->with('assocs',$assocs)
            ->with('registered_address', $registered_address);
        
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
        return view('pages.admin.clients.client_profile')
         ->with( 'client',$client) ;
     
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
    
    public function getCount()
    {
        $assocs_1 = Associate::find(1)->select('name');
        $assocs_2 = Associate::find(2)->select('name');
        $assocs_3 = Associate::find(3)->select('name');
        $assocClient1 = DB::table('clients')
        ->where('assoc_id', '=', 1)
        ->count();
        $assocClient2 = DB::table('clients')
        ->where('assoc_id', '=', 2)
        ->count();
        $assocClient3 = DB::table('clients')
        ->where('assoc_id', '=', 3)
        ->count();
        

         return view('pages.admin.dashboard', compact('assocs_1', $assocs_1,
                                                    'assocs_2', $assocs_2, 
                                                    'assocs_3', $assocs_3,
                                                    'assocClient1', $assocClient1,
                                                    'assocClient2', $assocClient2,
                                                    'assocClient3', $assocClient3));
    }
   
   
    
    




}
