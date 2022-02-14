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
        
      
      foreach($clients as $client){ 
          $this->client = $client;
         // dd($company_name);
        }
       foreach($reminders as $reminder){
        $this->reminder = $reminder;
       
       }
        
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
        $address = config("mail.from.address");
        $name = config("mail.from.name");
        dd( $address);
        return $this ->from($address, $name)
        ->markdown('pages.emails.reminder')
        ->with('reminder')->with('client');
      
                    // ->subject('subject',$this->subject);
    }
}
