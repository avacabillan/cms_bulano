<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Associate;
use App\Models\Department;
use App\Models\Position;
use DataTables;
class AdminAssocController extends Controller
{
  
    
    public function index(){

        $departments= Department::all();
        $positions = Position::all();               
        $associates= Associate::all();

        return view ('pages.admin.associates.assoc_table')->with('departments', $departments)
                            ->with ('positions', $positions)
                            ->with('associates',$associates);
    }

    public function assocDatatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Associate::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    
                    $actionBtn = '<a href="'.route('assoc-profile',$row->id).'" class="edit btn btn-success btn-sm">View</a>
                        <a href="'.route('associate.delete',$row->id).'" class="edit btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
               
                ->rawColumns(['action','delete'])
                ->make(true);
        }
    }

    public function create()
    {
        $departments= Department::all();
        $positions = Position::all();               
        $associates= Associate::all();

        return view ('pages.admin.associates.add_associate', compact('departments',$departments,
                            'positions',$positions,
                            'associates',$associates,
                                ));
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

        return redirect()->route('assoc_table');
    }

   
    public function show($id)
    {
        $associate = Associate::find($id);        
        $department = Associate::find($id)->department;
        $position = Associate::find($id)->position;
        
            return view ('pages.admin.associates.assoc_profile')->with('department', $department)
                            ->with ('position', $position)
                            ->with('associate',$associate);
        
    }

 
    public function edit($id)
    {
        $associate = Associate::find($id);      
        $department = Department::all();
        $position = Position::all();
        
        return view ('pages.admin.associates.edit_associate')->with('department', $department)
                            ->with ('position', $position)
                            ->with('associate',$associate);
                        
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