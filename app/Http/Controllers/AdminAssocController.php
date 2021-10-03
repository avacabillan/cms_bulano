<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Models\Associate;
use App\Models\Client;
use App\Models\AssocCity;
use App\Models\AssocProvince;
use App\Models\AssocPostal;
use App\Models\AssocDepartment;
use App\Models\AssocPosition;
use App\Models\AssocLocation;
use App\Models\AssocAddress;
use App\Models\Guardian;
use App\Models\GuardianLocation;
use App\Models\GovSSS;

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

        return view ('pages.admin.associates.associates_list');
    }
    public function insertAssociate(Request $request)
    {
        
        $assoc_province =new AssocProvince();
        $assoc_province ->province_name =$request->assoc_province;
        $assoc_province ->save();

        $assoc_city =new AssocCity();
        $assoc_city ->city_name =$request->assoc_city;
        $assoc_city ->assoc_province_id =$assoc_province->id;
        $assoc_city ->save();

        $assoc_postal =new AssocPostal();
        $assoc_postal ->postal_no =$request->assoc_postal;
        $assoc_postal ->assoc_city_id =$assoc_city->id;
        $assoc_postal ->save();

        $assoc_location =new AssocLocation();
        $assoc_location ->postal_no_id =$assoc_postal->id;
        $assoc_location ->save();

        $assoc_address =new AssocAddress();
        $assoc_address ->house_no_and_street = $request->assoc_address;
        $assoc_address ->assoc_location_id = $assoc_location->id;
        $assoc_address ->save();


        $assoc =new Associate();
        $assoc ->associate_name = $request->assoc_name;
        $assoc ->email = $request->assoc_email;
        $assoc ->contact_no = $request->assoc_contact;
        $assoc ->birth_date = $request->assoc_birthdate;
        $assoc ->start_date = $request->assoc_start_date;
        $assoc ->assoc_address_id = $assoc_address->id;
        $assoc->assoc_department_id = $request->assoc_department;
        $assoc->assoc_position_id = $request->assoc_position;
        $assoc ->save();

        $assoc_sss = new GovSSS();
        $assoc_sss->sss_no = $request->assoc_sss;
        $assoc_sss->assoc_id = $assoc->id;
        $assoc_sss->save();

        $assoc_guardian = new Guardian();
        $assoc_guardian->name = $request->guardian_name;
        $assoc_guardian->contact_no = $request->guardian_contact_no;
        $assoc_guardian->address = $request->guardian_address;
        $assoc_guardian->relationship = $request->guardian_relationship;
        $assoc_guardian->assoc_id = $assoc->id;
        $assoc_guardian->save();

    
        return redirect()->route('associates_list');


    }
    public function createAssociate()
    {   
        $positions = AssocPosition::all();
        $departments = AssocDepartment::all();

        return view ("pages.admin.associates.add_associates")->with(compact ('positions', $positions,'departments', $departments));
    }
}
