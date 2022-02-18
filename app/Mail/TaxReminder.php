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

    
    public $reminds;
  public $client;
   
    public function __construct($reminds, $client)
    {   
        
    //  dd($clients);
      //  foreach($client as $name ){
          $this->name = $client;
        
      //  }
        // $this->clients = $clients;
        //dd($name->company_name);
        $this->reminds = $reminds;
       
      // dd(   $this->reminds = $reminds->title);
        
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
      //   dd($address);
        return $this ->from($address, $name)
      //  ->to($emails)
        ->markdown('pages.emails.reminder')
        ->with('reminds') ->with('name');
      
                    // ->subject('subject',$this->subject);
    }
}
