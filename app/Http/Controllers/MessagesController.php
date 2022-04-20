<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Message;
use App\Models\Client;
class MessagesController extends Controller
{


    public $messages;
    public $message;

    public $users;
    
    public function associateIndex(){
        

        $messages = Message::orderBy('created_at', 'asc')->get();
        $id = Auth::user()->associates->id;
        $users = DB::table('users')

            ->join('messages', 'users.id', '=', 'messages.sender')
            ->join('clients', 'users.id', '=', 'clients.user_id')
            ->select('users.*','messages.sender')  
            ->where('clients.assoc_id','=',$id )
            ->where('role','client')
            ->orderBy('messages.created_at','desc')
            ->get()->groupBy('sender');
           //  dd($users);
            $clientUsers = User::all();
            $clients = Client::all();
        return view("pages.associate.message.associate_messages")->with( compact('messages', $messages,'users', $users,'clientUsers', $clientUsers, "clients", $clients));
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
            
            $image_file = $request->file('file');
            $imagefileName = time().'.'.$image_file->extension();
            $image_file->move(public_path('imgfileMessages'), $imagefileName);
            $message->img_file = $imagefileName;
        }
        $message->receiver = $id;
        $message->read = 0;
        $message->save();

        return redirect()->back();
    }

    public function clientIndex(){
        $users = User::all();
        $messages = Message::orderBy('created_at', 'asc')->get();

        return view('pages.client.client_inbox')->with('messages', $messages)->with('users', $users);
    }

    public function insertClientMsg(Request $request){
        
        $assoc = Auth::user()->clients->associates->user_id;
        $message = new Message();
        $message->sender = Auth::id();
        $message->message = $request->message;
        $message->read = 0  ;
        $message->receiver = $assoc;
        $message->save();
        return redirect()->back();
    }

    public function delete($id){
        
    }

}