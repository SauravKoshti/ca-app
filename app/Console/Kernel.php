<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
{
    $schedule->command('email:birthday')->dailyAt('08:00');
    $schedule->command('email:anniversary')->dailyAt('08:30');
    $schedule->command('send:business-reminder')->dailyAt('00:15');
    $schedule->command('send:birthday-message')->dailyAt('09:00'); 
    $schedule->command('send:anniversary-sms')->dailyAt('09:00');
    // $schedule->command('send:text-messages')
    // ->monthlyOn([1, 2, 3, 4, 5], '9:00')
    // ->withoutOverlapping();
    $schedule->command('send:text-messages')
    ->monthlyOn([25, 26, 27, 28, 29, 30, 31, 1, 2], '21:10')
    ->withoutOverlapping();

}


    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}