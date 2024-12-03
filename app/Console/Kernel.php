<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
{
    // Run the check on the 1st of every month at midnight
    $schedule->command('users:check-activity')->monthlyOn(1, '00:00');
}

}
