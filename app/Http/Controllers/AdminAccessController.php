<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminFieldRequest;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;
use App\Models\Department;
use DB;

class AdminAccessController extends Controller
{

    public function index(){
        $admins = DB::table('admins')
                ->join('users', 'admins.user_id', 'users.id')
                ->select('name','complete_address','hired_date','email_address', 'admins.id')->get();
        //$admins->myuser;
       // dd( $admins);
        return view ('pages.admin.admin_list',compact('admins', $admins));
    }
    public function view($id){
        $departments= Department::all();
        $admin = Admin::find($id);
        $admin->department;   
        $admin->myuser;
        return view ('pages.admin.profile_admin',compact('admin', $admin,'departments', $departments));
    }
    public function edit($id){
        $departments= Department::all();
        $admin = Admin::find($id);
        $admin->department;   
        $admin->myuser;

        //dd($name);
        //dd($admin);
        return view ('pages.admin.edit_admin',compact('admin', $admin,'departments', $departments));
    }
    public function update(Request $request,$id)
    {
           
        $admin = Admin::find($id);  
        $admin->birth_date = $request->birth_date;
        $admin->complete_address = $request->address;
        $admin->hired_date = $request->hired_date;
        $admin->phone_no = $request->contact;
        $admin->department_id = $request->department;
        $admin->save();

        $user = User::where('id', $request->user_id)->first(); // this point is the most important to change
        $user->name = $request->name;
        $user->save();
    
        if($admin){
            Alert::success('Success', 'Admin Successfuly Updated!');
        }

        return redirect()->route('admin_list');
    }
    public function create(){
        $departments =Department::all();
        return view ('pages.admin.add_admin')->with('departments',$departments);
    }
    public function store(AdminFieldRequest $request)
    {
     
        $validator = Validator::make( $request->all(),[
            'birth_date' => 'required',
            'address' => 'required',
            'hired_date' => 'required|numeric',
            'contact' => 'required|digits:11',
            'email' => 'required',
            'department' => 'required',
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $myuser= new User;
        $myuser->name= $request->name;
        $myuser->role='admin';
        $myuser->email=$request->email;
        $myuser->password=Hash::make($request->password);
        $myuser->save(); 

        $admin = new Admin;
        $admin->birth_date = $request->birth_date;
        $admin->complete_address = $request->address;
        $admin->hired_date = $request->hired_date;
        $admin->phone_no = $request->contact;
        $admin->email_address =$request->email;
        $admin->department_id = $request->department;
        $admin->user_id = $myuser->id;
        $admin->save();


       
        if($myuser){
            Alert::success('Success', 'Admin Account Successfuly Added!');
           
        }
       // dd($request);
        return redirect()->back();
    }

}
