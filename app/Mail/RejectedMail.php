<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RejectedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $requestee;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($requestee)
    {
        $this->requestee = $requestee;
 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
       
        return $this->markdown('pages.emails.rejectEmail')->with('requestee');
    }
}
