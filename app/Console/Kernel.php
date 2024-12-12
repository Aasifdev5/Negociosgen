<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    // Register custom commands
    protected $commands = [
        \App\Console\Commands\CheckUserActivity::class,
    ];

    protected function schedule(Schedule $schedule)
    {

        // Schedule the command to run on the 1st of every month at midnight
        $schedule->command('usuarios:verificar-actividad')->monthlyOn(1, '00:00');
        $schedule->job(new \App\Jobs\CheckMembershipExpiry)->daily();
        $schedule->job(new \App\Jobs\SendMembershipRenewalReminders)->daily();
    }
}
