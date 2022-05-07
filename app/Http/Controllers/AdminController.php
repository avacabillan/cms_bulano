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
        $admin = new Admin;
        $admin->birth_date = $request->birth_date;
        $admin->complete_address = $request->address;
        $admin->hired_date = $request->hired_date;
        $admin->phone_no = $request->contact;
        $admin->email_address =$request->email;
        $admin->department_id = $request->department;
        $admin->save();


        $myuser= new User;
        $myuser->name= $request->name;
        $myuser->role='admin';
        $myuser->email=$request->email;
        $myuser->password=Hash::make($request->password);
        $myuser->save();
        if($myuser){
            Alert::success('Success', 'Admin Account Successfuly Added!');
           
        }
        return redirect()->route('dashboard');
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
}
