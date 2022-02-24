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
    // public function index(){
    //     $users = User::all();
    //     $messages = Message::all();

    //     return view("pages.patient.patient-dashboard")->with("messages", $messages)->with("users", $users);
    // }
    public function associateIndex(){
        
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
        return view("pages.associate.message.associate_inbox")->with( compact("messages", $messages,"users", $users));
    }
    public function associateMessageShow(Request $request, $id){
        $message = DB::table('messages')->where('sender',$request->id)
        ->orWhere('receiver',$request->id)
        ->orderBy('created_at', 'asc')->get();

        return ($message);
    }
    public function insertAssociateMsg(Request $request){

        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;
        $message->receiver = $request->receiver_id;
        $message->read = 0;

        $message->save();

        return redirect()->route('associate_messages');
    }

    public function clientIndex(){
        $users = User::all();
        $messages = DB::table('messages')->orderBy('created_at', 'asc')->get();

        return view("pages.client.client_inbox")->with("messages", $messages)->with("users", $users);
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

}