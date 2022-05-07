<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Message;
use App\Models\Client;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AssocNewMessageNotification;
use App\Notifications\ClientNewMessageNotification;
class MessagesController extends Controller
{


    public $messages;
    public $message;

    public $users;
    
    public function associateIndex(){
        

        $messages = Message::orderBy('created_at', 'asc')->get();
        $id = Auth::user()->associates->id;
        $recipients = Client::where('assoc_id', $id)->get();
        $users = DB::table('users')
            ->join('messages', 'users.id', '=', 'messages.sender')
            ->join('clients', 'users.id', '=', 'clients.user_id')
            ->select('users.*','messages.sender')  
            ->where('clients.assoc_id','=',$id )
            ->where('role','client')
            ->orderBy('messages.created_at','desc')
            ->get()->groupBy('sender');
         // dd($recepients);
            $clientUsers = User::all();
            $clients = Client::all();
        return view("pages.associate.message.associate_messages")
        ->with( compact('messages', $messages,'users', $users,
                        'clientUsers', $clientUsers, "clients", $clients,
                        'recipients', $recipients));
    }
    public function associateMessageShowCreate($id){

        $messages =Message::orderBy('created_at', 'asc')->get();

        $users = DB::table('users')
            ->join('messages', 'users.id', '=', 'messages.sender')
            ->select('users.*','messages.sender')
            ->orderBy('messages.created_at','desc')
            ->where('role','client')
            ->get()->groupBy('sender');
            $clientUsers = User::all();
            $clients = Client::all();

        return view("pages.associate.message.associate_composemsg")->with( compact(
            "id",
            "users", $users,
            "messages", $messages,
            "clientUsers", $clientUsers,
            "clients", $clients
        ));
    }
    public function insertAssociateMsg(Request $request, $id){

        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;
        if($request->has('file')){
            $request->validate([
                'file' => 'required|mimes:pdf, png,jpeg,jpg|max:2048',
            ]); 
            
            $file = $request->file('file');
            $size = $request->file('file')->getSize();
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = $request->name.'filename'. $extension;
            $file->move('public/imgfileMessages', $filename); 
            $message ->img_file = $filename;
        }
        $message->receiver = $id;
        $message->read = 0;
        $message->save();
        $users = User::where('role', 'client')->get();
        Notification::send($users, new ClientNewMessageNotification ($message));
        return redirect()->back();
    }

    public function clientIndex(){
        $users = User::all();
        $messages = Message::orderBy('created_at', 'asc')->get();

        return view('pages.client.client_inbox')->with('messages', $messages)->with('users', $users);
    }

    public function insertClientMsg(Request $request){
        
        $id = Auth::user()->id;
        $assoc = Auth::user()->clients->associates->user_id;
        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;
        $message->read = 0  ;
        $message->receiver = $assoc;
        $message->save();
       // dd($message);
        $user = User::where('id', $assoc)->get();
        Notification::send($user, new AssocNewMessageNotification ($message));
        return redirect()->back();
    }

    public function delete($id){
        
    }

}