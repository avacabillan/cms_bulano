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
        $requestees = Requestee::all();
       
        return view ('pages.admin.requestee')
        ->with('requestees', $requestees);
    }
    // public function requesteeDatatable(Request $request) 
    // {
    //     if ($request->ajax()) {
    //         $data = Requestee::latest()->get();
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function($row){
    //                 $actionBtn = '<a <a href="'.route('add_client').'" class="edit btn btn-danger btn-sm">Preview</a>';
    //                 return $actionBtn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }
    // }
    public function storeRequest(Request $request)
    {

        $requestee =new Requestee();
        $requestee ->name = $request->name;
        $requestee ->email = $request->email;
        if ($request->hasfile('cor'))
        {
            $file = $request->file('cor');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/files/', $filename);
            $requestee ->cor = $filename;
        }
        
        
        $requestee->save();

        return redirect()->route('register');
    }
    public function register(){
        return view('auth.register');
    }
}