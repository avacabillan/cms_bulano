<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AssocFieldRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Associate;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Validator;
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
                    <a href="'.route('associate.delete',$row->id).'"  onclick="return confirm(`Are you sure  you want to delete this data? `)" class="edit btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
               
                ->rawColumns(['action','departments'])
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

    public function store(AssocFieldRequest $request)
    {

        $validator = Validator::make($request->all(), [
            'assoc_name' => 'bail|required|max:255m',
            'assoc_email' => 'required',
            'assoc_sss' => 'required',
            'assoc_contact' => 'required',
            'assoc_birthdate' => 'required',
            'assoc_address' => 'required',
            'username' => 'required',
            'position' => 'required',
            
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        $myuser=new User;
        $myuser ->name = $request->assoc_name;
        $myuser->role='associate';
        $myuser->email=$request->username;
        $myuser->password=Hash::make($request->username);
        $myuser->save();

        $associate =new Associate();
        $associate->user_id=$myuser->id;
        $associate ->name = $request->assoc_name;
        $associate ->status = 0;
        $associate ->email = $request->assoc_email;
        $associate ->contact_number = $request->assoc_contact;
        $associate ->birth_date = $request->assoc_birthdate;
        $associate ->address = $request->assoc_address;
        $associate ->sss_no = $request->assoc_sss;
        $associate->department_id = $request->department;
        $associate->position_id = $request->position;
        $associate->save();
        if($associate){
            Alert::success('Success', 'Associate Successfuly Added!');
        }
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
        $departments= Department::all();
        $positions = Position::all();          
        return view ('pages.admin.associates.edit_associate')->with('associate', $associate)
        ->with('departments', $departments)
                            ->with ('positions', $positions);
                   
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
        if($associate){
            Alert::success('Success', 'Associate Successfuly Updated!');
        }

        return redirect()->route('assoc_table');
    }
    public function destroy($id)
    {   
        $associate=Associate::find($id);
        $associate->delete();
        if($associate){
            Alert::success('Success', 'Associate Successfuly Deleted!');
        }
        return redirect()->back();
    }
    
}