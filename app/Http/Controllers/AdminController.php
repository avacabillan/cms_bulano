<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Department;
use App\Models\Position;
use DB;
use \Yajra\Datatables\Datatables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make( $request->all(),[

        ]);
        if($validator->failed()){ 
            Alert::error('Error!', $validator->messages()->first());
            return redirect()->back();
        }
        $myuser= new User;
        $myuser->name= $request->name;
        $myuser->role='admin';
        $myuser->email=$request->email;
        $myuser->password=Hash::make($request->password);
        $myuser->save();
        if($myuser){
            Alert::success('Success', 'Admin Account Successfuly Added!');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getDepartments()
    {
       $departments = DB::table('departments')
     
       ->get();

       return view('pages.admin.departments', compact('departments'));

   }
    public function insertDept(Request $request)
    {

        $department =new Department();
        $department ->department_name = $request->input('deptname');
        $department->save();

        if($department){
            Alert::success('Success', 'Department Successfuly Added!');
        }
            return redirect()->route('departments');
    }
    public function destroyDept($id)
    {   
        $department=Department::find($id);
        $department->delete();
        if($department){
            Alert::success('Success', 'Department Successfuly Deleted!');
        }
        return redirect()->back();
    }
    public function getPositions()
    {
       $positions = DB::table('positions')
     
       ->get();

       return view('pages.admin.positions', compact('positions'));
   }
   public function insertPost(Request $request)
    {

        $position =new Position();
        $position ->position_name = $request->input('postname');
        $position->save();

        if($position){
            Alert::success('Success', 'Position Successfuly Added!');
        }
            return redirect()->route('positions');
    }
    public function destroyPost($id)
    {   
        $position=Position::find($id);
        $position->delete();
        if($position){
            Alert::success('Success', 'Position Successfuly Deleted!');
        }
        return redirect()->back();
    }
}