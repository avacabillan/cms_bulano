<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Jobs\SendMailJob;
use Carbon\Carbon;
use App\Models\Client;
use App\Mail\NewArrivals;

class MessageController extends Controller
{
    
    public function getUsers(){

      $users =  Client::all();

        return view ('test')->with('users', '$users');
    }

    public function getMessages(){

       $messages = Message::orderBy('created_at', 'desc')->get();
        return view('test')->with('messages', '$messages');
    }

    public function sendMail(Request $request)
    {

        $message = new Message();
        $message->title = $request->title;
        $message->body = $request->body;
        $message->save();

        if($request->item == "now") {

            $message->delivered = 'YES';
            $message->send_date = Carbon::now();
            $message->save();   

            $users = Client::all();

            foreach($users as $user) {
                dispatch(new SendMailJob($user->email, new NewArrivals($user, $message)));
            }
                
            return response()->json('Mail sent.', 201);

        } else { 

            $message->date_string = date("Y-m-d H:i", strtotime($request->send_date));

            $message->save();   

            return response()->json('Notification will be sent later.', 201);
        }
    }
}

