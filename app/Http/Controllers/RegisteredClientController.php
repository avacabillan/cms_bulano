<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Requester;
use App\Models\User;
use App\Models\Role;
use File;
class RegisteredClientController extends Controller
{
  
    public function index()
    {
        $requesters = User::all();
       
        return view ('pages.admin.requestee')
        ->with('requesters', $requesters);
    }
    public function status(Request $request, $id)
    {
        $data = Requester::find($id);
        if($data->status ==0){
            $data->status=1;
        }else{
            $data->status=0;
        }
        $data->save();

         return redirect('pages.admin.requestee')->with('message', $data->name, 'Status has been changed succesfuly.');
       
    }

    
    public function create($id)
    {   $user = User::find($id);
        $roles = Role::all()->pluck('description', 'id');

        return view('pages.admin.request_edit', compact('roles', 'user'));
    }

 
    public function store(StoreUserRequest $request)
    {
        // $requester =new Requester();
        // $requester->name =$request->name;
        // $requester->email =$request->email;
        // $requester->contact_no = $request->contact_no;
        // $requester->cor_img = $request->cor_image;
        // if($request->hasfile('cor_image'))
        // {
        // 	$file = $request->file('cor_image');
        // 	$extention = $file->getClientOriginalExtension();
        // 	$filename = time().'.'.$extention;
        //     $destinationPath = public_path().'public/images' ;
        //     $file->move($destinationPath,$fileName);
        // 	$requester->cor_image= $filename;
        // }
        
        // $requester->save();
        $user = User::create($request->all());
        

        return redirect()->route('pages.admin.requestee');
    
        
    }
    public function register()
    {
        return view('register');
    }

  
    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    // public function update(Request $request, User $user)
    // {
    //     $approved = $user->approved;

    //     $user->update($request->all());
       

    //     if ($approved == 0 && $user->approved == 1) {
    //         $user->notify(new UserApprovedNotification());
    //     }

    //     return 'Request Aproved';
    // }

    public function destroy($id)
    {
        $request = User::find($id);
        $request->delete();

         return redirect()->back()->with('message', 'Registration request rejected!');
    }
    public function approve($id){
        $user = User::find($id);
        // $onlySoftDeleted = User::onlyTrashed()->get();
        if($user->approved==False){
            $user->approved=1;
        }else{
            $user->approved=0;
        }
        $user->save();
        // if ($approved == 0 && $user->approved == 1) {
        //     $user->notify(new UserApprovedNotification());
        // }
        return redirect()->back();
    }
    public function roleUpdate($id){
        $user = User::find($id);
        
    }
    // public function deleterequest(Request $request,$id){
    //     User::where('id',$id)->delete();
    //         return Redirect::to('request');
    // }
}
