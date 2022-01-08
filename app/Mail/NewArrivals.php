<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewArrivals extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $new_arrival;
    protected $user;

    public function __construct($user, $new_arrival)
    {
        $this->user = $user;
        $this->new_arrival = $new_arrival;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newarrivals')
        ->subject($this->new_arrival->title)
        ->from('bulano@company.com', 'Bulano Accounting & Auditing Firm')
        ->with([
            'user'=> $this->user,
            'new_arrival' => $this->new_arrival,
        ]);
    }
}
