<?php

namespace App\Listeners;
use App\Models\User;
use Illuminate\Notifications\Notification;
use  App\Notifications\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewUserNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new NewUserNotification($event->user));
    }
}
