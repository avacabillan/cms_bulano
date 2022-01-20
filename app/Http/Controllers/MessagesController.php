<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Message;

class MessagesController extends Controller
{
    public $messages;
    public $message;

    public $users;
    public $recipients;

    public function adminIndex(){
        $recipients = User::All();
        $messages = DB::table('messages')->orderBy('created_at', 'asc')->get();
        
        $users = DB::table('users')
            ->join('messages', 'users.id', '=', 'messages.sender')
            ->select('users.*','messages.sender')
            ->orderBy('messages.created_at','desc')
            ->get()->groupBy('sender');
            
        return view("pages.admin.messages.admin_message")->with("messages", $messages) 
                                                         ->with("users", $users)
                                                         ->with("recipients", $recipients);
    }


    public function adminMessageShow(Request $request, $id){
        $message = DB::table('messages')->where('sender',$request->id)
        ->orWhere('receiver',$request->id)
        ->orderBy('created_at', 'asc')->get();

        return ($message);
    }

    public function insertAdminMsg(Request $request){

        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;
        $message->receiver = $request->name;

        $message->save();

        return redirect()->back();
    }

    public function associateIndex(){
        $recipients = User::All();

        $messages = DB::table('messages')->orderBy('created_at', 'asc')->get();
        
        $users = DB::table('users')
            ->join('messages', 'users.id', '=', 'messages.sender')
            ->select('users.*','messages.sender')
            ->orderBy('messages.created_at','desc')
            ->get()->groupBy('sender');
            
        return view("pages.associate.message.associate_messages")->with("messages", $messages) 
                                                         ->with("users", $users)
                                                         ->with("recipients", $recipients);

    }
    public function associateMessageShow(Request $request, $id){
        $message = DB::table('messages')->where('sender',$request->id)
        ->orWhere('receiver',$request->id)
        ->orderBy('created_at', 'asc')->get();

    
        return view("pages.associate.message.associate_messages")->with("messages", $messages)
                                                                ->with("users", $users)
                                                                ->with("sender", $sender);
    }
    public function insertAssociateMsg(Request $request){
        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;
        $message->receiver = $request->name;
        $message->read = 1;    
        

        $message->save();

        return redirect()->back();
    }

    public function clientIndex(){
        $recipients = User::All();

        $messages = DB::table('messages')->orderBy('created_at', 'asc')->get();
        
        $users = DB::table('users')
            ->join('messages', 'users.id', '=', 'messages.sender')
            ->select('users.*','messages.sender')
            ->orderBy('messages.created_at','desc')
            ->get()->groupBy('sender');
            
        return view("pages.client.messages.client_messages")->with("messages", $messages) 
                                                         ->with("users", $users)
                                                         ->with("recipients", $recipients);

    }
    public function clientMessageShow(Request $request, $id){
        $message = DB::table('messages')->where('sender',$request->id)
        ->orWhere('receiver',$request->id)
        ->orderBy('created_at', 'asc')->get();

    
        return view("pages.client.messages.client_messages")->with("messages", $messages)
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

        return redirect()->back();
    }

}