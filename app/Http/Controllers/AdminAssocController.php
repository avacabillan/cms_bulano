<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Associate;
use App\Models\Department;
use App\Models\Position;

class AdminAssocController extends Controller
{
  
    public function index()
    {
        $departments= Department::all();
        $positions = Position::all();               
        $associates= Associate::all();
            
            return view ('pages.admin.associates.associates_list')
            ->with( compact('departments',$departments,
                            'positions',$positions,
                            'associates',$associates,
                                                     
            ));
    }


    public function create()
    {
        // return view("pages.admin.associates.addassociate")
        // ->with(compact('departments',$departments,
        //                     'positions',$positions,
        //                     'associates',$associates,
                                                     
        //     ));
    }

    public function store(Request $request)
    {
        $associate =new Associate();
        $associate ->name = $request->assoc_name;
        $associate ->email = $request->assoc_email;
        $associate ->contact_number = $request->assoc_contact;
        $associate ->birth_date = $request->assoc_birthdate;
        $associate ->address = $request->assoc_address;
        $associate ->sss_no = $request->assoc_sss;
        $associate->department_id = $request->department;
        $associate->position_id = $request->position;
        $associate->save();

        return redirect()->back();
    }

   
    public function show($id)
    {
        $associate = Associate::find($id);        
        $department = Department::all();
        $position = Position::all();
        
        return view ('pages.admin.associates.assoc_profile')
        ->with(compact('associate',$associate,
                        'department',$department,
                        'position',$position,
        )) ;
    }

 
    public function edit($id)
    {
        $associate = Associate::find($id);      
        $department = Department::all();
        $position = Position::all();
        
        return view ('pages.admin.associates.edit_associate')
        ->with(compact('associate',$associate,                       
                        'department',$department,
                        'position',$position
                        
        )) ;
    }

   
    public function update(Request $request, $id)
    {
        $associate =new Associate();

        $associate ->name = $request->assoc_name;
        $associate ->email = $request->assoc_email;
        $associate ->contact_number = $request->assoc_contact;
        $associate ->birth_date = $request->assoc_birthdate;
        $associate ->address = $request->assoc_address;
        $associate ->sss_no = $request->assoc_sss;
        $associate->department_id = $request->department;
        $associate->position_id = $request->position;
        $associate->save();

         return redirect()->route('pages.admin.associates.assoc_profile')
         ->with(compact('associate',$associate,                       
                        'department',$department,
                        'position',$position,

                    )) ;
    }

 
    public function destroy($id)
    {
        //
    }
    // public function insertAssoc(Request $request)
    // {
    //     $associate =new Associate();
    //     $associate ->name = $request->assoc_name;
    //     $associate ->email = $request->assoc_email;
    //     $associate ->contact_number = $request->assoc_contact;
    //     $associate ->birth_date = $request->assoc_birthdate;
    //     $associate ->address = $request->assoc_address;
    //     $associate ->sss_no = $request->assoc_sss;
    //     $associate->department_id = $request->department;
    //     $associate->position_id = $request->position;
    //     $associate->save();

    //    return redirect()->back();
    // } 
    
}