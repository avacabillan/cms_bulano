<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Requestee;
use App\Models\User;
use App\Models\Role;
use File;
use Datatable;
class RegisteredClientController extends Controller
{
  
    public function index()
    {
        $requestees = Requestee::where('status',1)->get();
      // dd( $requestees);
        return view ('pages.admin.requestee', compact('requestees', $requestees));
    }
    
   
    public function storeRequest(Request $request)
    {

        $requestee =new Requestee();
        $requestee ->name = $request->name;
        $requestee ->email = $request->email;
        $requestee ->status =false;
        if ($request->hasfile('cor'))
        {
            $file = $request->file('cor');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/files/', $filename);
            $requestee ->cor = $filename;
        }
        
        
        $requestee->save();

        return redirect()->route('login');
    }
    
    public function delete($id){

        $requestee = Requestee::find($id);
        if (!is_null($requestee)){
            $requestee->delete();
        }
        return redirect()->route('requestee');
    }
    
}