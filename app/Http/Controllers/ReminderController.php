<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;

class ReminderController extends Controller
{
    public function reminderList (Request $request) {
                        
        $reminders= Reminder::all();
        
            
            return view ('pages.associate.clients.client_reminders')
            ->with( compact('reminders',$reminders
                            
                            
            ));
    }


    public function reminderNew(Request $request){
        $reminder =new Reminder();
        $reminder->reminder =$request ->reminder;
        $reminder->schedule_date =$request ->schedule_date;


    }
}
