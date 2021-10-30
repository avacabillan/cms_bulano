<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Requester;
use File;
class RegisteredClientController extends Controller
{
  
    public function index()
    {
        $requesters = Requester::all();
       
        return view ('pages.admin.registeredclient')
        ->with('requesters', $requesters);
    }

    
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        $requester =new Requester();
        $requester->name =$request->name;
        $requester->email =$request->email;
        $requester->contact_no = $request->contact_no;
        $requester->cor_img = $request->cor_img;
        if($request->hasfile('cor_image'))
        {
        	$file = $request->file('cor_image');
        	$extention = $file->getClientOriginalExtension();
        	$filename = time().'.'.$extention;
            $destinationPath = public_path().'public/images' ;
            $file->move($destinationPath,$fileName);
        	$requester->cor_image= $filename;
        }
        
        $requester->save();
    
        return redirect()->back()->with('Status','Wait for Approval');
    }

  
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
