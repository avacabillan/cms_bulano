<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Associate;
use App\Models\AssocCity;
use App\Models\AssoPostal;
use App\Models\AssotProvince;
use App\Models\AssoDepartment;
use App\Models\AssoPosition;
use App\Models\AssoLocationAddress;
use Yajra\Datatables\Datatables;

class AdminAssocController extends Controller
{
    public function index (Request $request) {
            
        if ($request->ajax()) {
            $data = Associate::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="#" class="edit btn btn-info btn-sm">View</a>
                                  <a href="#" class="edit btn btn-success btn-sm">Edit</a>
                                  
                                  '
                                  ;
                    return $actionBtn;
                    
                })
                ->rawColumns(['action'])
                ->make(true);
            }

        return view ('');
    }
    public function insertAssociate(Request $request)
    {
        
        $assoc_province =new AssocProvince();
        $assoc_province ->province_name =$request->assoc_province;
        $assoc_province ->save();

        $assoc_city =new AssocCity();
        $assoc_city ->assoc_name =$request->assoc_city;
        $assoc_city ->assoc_province =$assoc_province->id;
        $assoc_city ->save();

        $assoc_postal =new AssocPostal();
        $assoc_postal ->assoc_name =$request->assoc_postal;
        $assoc_postal ->assoc_city =$assoc_city->id;
        $assoc_postal ->save();

        $assoc_location_address =new AssocLocationAddress();
        $assoc_location_address ->assoc_postal_id =$assoc_postal->id;

        $assoc =new Associate();
        $assoc ->assoc_name = $request->assoctname;
        $assoc ->email = $request->email;
        $assoc ->contact_number = $request->assoc_contact;
        $assoc ->department = $request->department->id;
        $assoc ->position =$position->id;
        $client ->save();

        
        // return redirect()->route('pages.associates.clients.clients_list');

    }
    public function showAssocProfile($id){
        $assoc = Assoc::find ($id); 
        return view('#')->with("associate", $associate);
    }
    public function createAssociate()
    {   
        return view ("#");
    }
//
}
