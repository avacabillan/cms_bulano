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

    private $clients;
    private $emails;
    public function __construct($clients, $emails)
    {   
        
        $this->clients = $clients;
        $this->subject = $emails->title;
       
        
        // $this->subject('This is Trial!');
        
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('pages.emails.reminder')
                    ->with('client', $this->client)
                    ->subject('subject',$this->subject);
    }
}
