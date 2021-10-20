<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaxReminder extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $test;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($test)
    {
        $this->test = $test;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('test@bulano.com')
                    ->to('ajlemluna@gmail.com')
                ->markdown('pages.emails.reminder')
                ->with('reminders', $this->test);
    }
}
