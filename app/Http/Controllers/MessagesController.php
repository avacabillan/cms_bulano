<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Message;

class MessagesController extends Controller
{
    public $messages;
    public $message;

    public $users;
    public $recipients;

    public function associateIndex(){
        $recipients = User::All();

        $messages = DB::table('messages')->orderBy('created_at', 'asc')->get();
        
        $users = DB::table('users')
            ->join('messages', 'users.id', '=', 'messages.sender')
            ->select('users.*','messages.sender')
            ->orderBy('messages.created_at','desc')
            ->where('role','client')
            ->get()->groupBy('sender');
            // dd(Auth::user()->id);
                                                         
        return view("pages.associate.message.associate_messages",compact('messages', $messages,'users', $users,'recipients', $recipients));

    }
    public function associateMessageShow(Request $request, $id){
        $message = DB::table('messages')->where('sender',$request->id)
        
        ->orderBy('created_at', 'asc')->get('message');

        return ($message);
        dd($message);
        // dd($request->id);
        // return view("pages.associate.message.associate_messages")->with("messages", $messages)
        //                                                         ->with("users", $users)
        //                                                         ;
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

    
        return view("pages.client.client_message")->with("messages", $messages)
                                                                ->with("users", $users)
                                                                ->with("sender", $sender);
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