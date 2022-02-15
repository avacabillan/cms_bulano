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

    
    public $reminder;
  public $client;
   
    public function __construct($reminder, $client)
    {   
        
    //  dd($clients);
       foreach($client as $name ){
          $this->name = $name;
        
       }
        // $this->clients = $clients;
        //dd($name->company_name);
        $this->reminder = $reminder;
       
     // dd($reminder);
        
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
        //dd($address);
        return $this ->from($address, $name)
      //  ->to($emails)
        ->markdown('pages.emails.reminder')
        ->with('reminder') ->with('name');
      
                    // ->subject('subject',$this->subject);
    }
}
