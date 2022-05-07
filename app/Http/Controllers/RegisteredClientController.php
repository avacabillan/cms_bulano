<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Requestee;
use App\Models\User;
use App\Models\Role;
use DB;
use Datatable;
use App\Mail\RejectedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewUserNotification;


class RegisteredClientController extends Controller
{
  
    public function index()
    {
        $requestees = Requestee::where('status', 0)->get();
        //$requester = Requestee::all();
      
        
       // dd($users);
      //dd($requestees);
        return view ('pages.admin.requestee', compact('requestees', $requestees));
    }
    
   
    public function storeRequest(Request $request)
    {

        $requestee =new Requestee();
        $requestee ->name = $request->name;
        $requestee ->email = $request->email;
        $requestee ->phone = $request->phone;
        $requestee->inquiry = $request->inquiry;
        $requestee ->status =false;
       
        if ($request->hasfile('cor'))
        {
            $request->validate([
                'cor' => 'required|mimes:image,jpg,png,jpeg,gif,svg|max:2048',
            ]);
            
            $file = $request->file('cor');
            $size = $request->file('cor')->getSize();
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = $request->name . '-'.'COR'.'.' . $extension;
            $file->move('public/files/', $filename);
            $requestee ->cor = $filename;
        }       
   
    
        $requestee->save();
        // $requestee->refresh();
        $users = User::where('role', 'admin')->get();
        Notification::send($users, new NewUserNotification ($requestee));
        Alert::info('Success', 'Your registration request has been sent, plese wait for the email within 3 days for the approval from the admin!');
        return redirect()->route('login');
    }
    
    public function delete($id){

        $requestee =Requestee::find($id);
        $requestee->delete();
       //dd(  $requestee);
        //$requestee->delete();
        
        Mail::to($requestee['email'])->send(new RejectedMail($requestee));
        Alert::success('Success', 'Client Successfuly Rejected!');
        return redirect()->back();
        
    }
    
}