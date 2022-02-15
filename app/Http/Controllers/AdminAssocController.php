<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Associate;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use DataTables;
class AdminAssocController extends Controller
{
  
    
    public function index(){

        
       

        return view ('pages.admin.associates.assoc_table');
                           
    }

    public function assocDatatable(Request $request)
    {
        if ($request->ajax()) {
            $model = Associate::with('departments');
            return DataTables::eloquent($model)
                ->addColumn('departments', function (Associate $assoc) {
                    return $assoc->departments->department_name;
                })
                ->addColumn('action', function($row){
                    
                    $actionBtn = '<a href="'.route('assoc-profile',$row->id).'" class="edit btn btn-success btn-sm">View</a>
                        <a href="'.route('associate.delete',$row->id).'" class="edit btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
               
                ->rawColumns(['action','delete','departments'])
                ->make(true);
        }
    }

    public function create()
    {
        $departments= Department::all();
        $positions = Position::all();              
        $associates= Associate::all();

        return view ('pages.admin.associates.add_associate')->with('departments', $departments)
                            ->with ('positions', $positions)
                            ->with('associates',$associates);
    }

    public function store(Request $request)
    {
        $myuser=new User;
        $myuser ->name = $request->assoc_name;
        $myuser->role='associate';
        $myuser->email=$request->username;
        $myuser->password=Hash::make($request->password);
        $myuser->save();

        $associate =new Associate();
        $associate->user_id=$myuser->id;
        $associate ->name = $request->assoc_name;
        $associate ->email = $request->assoc_email;
        $associate ->contact_number = $request->assoc_contact;
        $associate ->birth_date = $request->assoc_birthdate;
        $associate ->address = $request->assoc_address;
        $associate ->sss_no = $request->assoc_sss;
        $associate->department_id = $request->department;
        $associate->position_id = $request->position;
        $associate->save();

        return redirect()->route('assoc_table');
    }

   
    public function show($id)
    {
        $associate = Associate::find($id);        
        $associate->departments;
        $associate->positions;
        
            return view ('pages.admin.associates.assoc_profile')->with('associate', $associate);
        
    }

 
    public function edit($id)
    {
        $associate = Associate::find($id);
        $associate->department;   
        $associate->position;    

        return view ('pages.admin.associates.edit_associate')->with('associate', $associate);

                        
    }

   
    public function update(Request $request,$id)
    {
           
        $associate = Associate::find($id);  
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

 
    public function destroy($id)
    {
        
        $associate=Associate::find($id);
        $associate->delete();
        return redirect()->back();
    }
    
}