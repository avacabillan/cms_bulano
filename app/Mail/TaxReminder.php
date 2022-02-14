<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class TaxReminder extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    
    public $reminders;
    public $clients;
   
    public function __construct($reminders, $clients)
    {   
        
      
    //   foreach($clients as $client){ 
         
          
    //     }
    //    foreach($reminders as $reminder){
    //     $this->reminders = $reminders;
       
    //    }
       $this->clients = $clients;
       $this->reminders = $reminders;
        // $this->to($deadlines);
        // dd($this->reminders);
        // and subject
        // $this->subject('Pay Tax!');
  
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        return $this ->from('bulano@gmail.com')
        ->markdown('pages.emails.reminder')
        ->with('reminders')->with('clients');
      
                    // ->subject('subject',$this->subject);
    }
}
