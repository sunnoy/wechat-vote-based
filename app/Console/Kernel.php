<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [

        Commands\zipFiles::class,

        Commands\SendEmails::class,

        Commands\deleteFiles::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //zip files
        $schedule->command('zipFiles')
            ->timezone('Asia/Shanghai')
            ->dailyAt('12:45');

        //send emails
        $schedule->command('sendEmails')
            ->timezone('Asia/Shanghai')
            ->dailyAt('13:30');

        //delete files
        $schedule->command('deleteFiles')
            ->timezone('Asia/Shanghai')
            ->dailyAt('23:50');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
