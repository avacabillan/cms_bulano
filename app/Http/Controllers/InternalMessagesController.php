<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Message;

class InternalMessagesController extends Controller
{
    public $messages;
    public $message;

    public $users;
    // public function index(){
    //     $users = User::all();
    //     $messages = Message::all();

    //     return view("pages.patient.patient-dashboard")->with("messages", $messages)->with("users", $users);
    // }
    public function doctorIndex(){
        
        $messages = DB::table('messages')->orderBy('created_at', 'asc')->get();
        $id = Auth::user()->associates->id;
        $users = DB::table('users')
         
            ->join('clients', 'users.id', '=', 'clients.user_id'  )
            ->join('messages', 'users.id', '=', 'messages.sender')
            ->select('users.*','messages.sender')
            ->orderBy('messages.created_at','desc')
            ->where('role','client')
            ->where('clients.assoc_id',$id )
            ->get()->groupBy('sender');
            // dd($users);
        return view("assoc_message")->with( compact("messages", $messages,
                                                    "users", $users));
    }
    public function doctorMessageShow(Request $request, $id){
        $message = DB::table('messages')->where('sender',$request->id)
        ->orWhere('receiver',$request->id)
        ->orderBy('created_at', 'asc')->get();

        return ($message);
    }
    public function insertDoctorMsg(Request $request){

        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;

        if($request->has('file')){

            $image_file = $request->file('file');
            $imagefileName = time().'.'.$image_file->extension();
            $image_file->move(public_path('imgfileMessages'), $imagefileName);
            $message->img_file = $imagefileName;
        }

        $message->receiver = $request->receiver_id;
        $message->read = 0;

        $message->save();

        return redirect()->route('message-doctor');
    }

    public function patientIndex(){
        $users = User::all();
        $messages = DB::table('messages')->orderBy('created_at', 'asc')->get();

        return view("client_message")->with("messages", $messages)->with("users", $users);
    }

    public function insertClientMsg(Request $request){
        
        $assoc = Auth::user()->clients->associates->user_id;
        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;
        $message->read = 1;
        $message->receiver = $assoc;
        $message->save();
        return redirect()->back();
    }

    public function delete($id){
        
    }

// JEAN JATI OLD MESSAGE CODE 


    public $recipients;

    public function associateIndex(){
       

        $messages = DB::table('messages')->orderBy('created_at', 'asc')->get();
        
        $users = DB::table('users')
            ->join('messages', 'users.id', '=', 'messages.sender')
            ->select('users.*','messages.sender')
            ->orderBy('messages.created_at','desc')
            ->where('role','client')
            ->get()->groupBy('sender');
            // dd(Auth::user()->id);
                                                         
        return view("pages.associate.message.associate_messages",compact('messages', $messages,'users', $users));

    }
    public function associateMessageShow(Request $request, $id){
        $message = DB::table('messages')->where('sender',$id)
        
        ->orderBy('created_at', 'asc')->get('message');

        // return ($message);
       // dd($message);
        // dd($request->id);
        return view("pages.associate.message.associate_messages")->with("message", $message) ;
    }
    public function insertAssociateMsg(Request $request){
        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;
        $message->receiver = $request->name;
        $message->read = 0;    
        

        $message->save();
        if($message){
            Alert::success('Success', 'Message Successfuly Sent!');
        }
       
        return redirect()->back();
    }
    public function replyAssociate(Request $request){
        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;
        $message->receiver = $request->receiver;
        $message->read = 1;    
        
        $message->save();
        if($message){
            Alert::success('Success', 'Message Successfuly Sent!');
        }
        return redirect()->back();
    }






    public function clientIndex(){
        $users = User::All();
        $messages = DB::table('messages')->orderBy('created_at', 'asc')->get();
        
            
        return view("pages.client.client_message")->with("messages", $messages) 
                                                    ->with("users", $users);

    }
    public function clientMessageShow(Request $request, $id){
        $message = DB::table('messages')->where('sender',$request->id)
        ->orWhere('receiver',$request->id)
        ->orderBy('created_at', 'asc')->get();

    
        return view("pages.client.client_message")->with("message", $message);
    }
    public function insertClientMsg(Request $request){
        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;
        $message->receiver = $request->name;
        $message->read = 1;    
        
        $message->save();
        Alert::success('Success', 'Message Successfuly Sent!');
        return redirect()->back();
    }
    public function replyClient(Request $request){
        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;
        $message->receiver = $request->receiver;
        $message->read = 1;    
        
        $message->save();
        Alert::success('Success', 'Message Successfuly Sent!');
        return redirect()->back();
    }
    


}
