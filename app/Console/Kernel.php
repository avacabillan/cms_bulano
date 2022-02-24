<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\SendReminderEmails;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
       
        'App\Console\Commands\SendReminderEmails',
        'App\Console\Commands\ResetStatusAnnualy',
        'App\Console\Commands\ResetStatusMonthly',
        'App\Console\Commands\ResetStatusQuarterly',
        
    ];

   
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('reminder:emails')
        ->timezone('UTC')
        ->dailyAt('12:00');
        $schedule->command('reset:annual')
        ->yearly();
        $schedule->command('reset:monthly')
        ->monthlyOn(1, '12:00');
        $schedule->command('reset:quarterly')
        ->quarterly();
        

        // $schedule->command('notify:users')
        // ->everyMinute();
    }

    
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
