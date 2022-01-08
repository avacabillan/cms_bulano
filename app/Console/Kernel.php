<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\SendReminderEmails;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
       
        // 'App\Console\Commands\SendReminderEmails',
        'App\Console\Commands\NotifyUsers',
    ];

   
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command('reminder:emails')
        // ->everyMinute();

        $schedule->command('notify:users')
        ->everyMinute();
    }

    
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
