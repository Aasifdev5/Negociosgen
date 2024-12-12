<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\MembershipRenewalReminder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendMembershipRenewalReminders implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $users = User::where('membership_status', 'active')
            ->where('renewal_due_date', '<=', now())
            ->where('membership_end_date', '>=', now())
            ->get();

        if ($users->isEmpty()) {
            Log::info('No users require membership renewal reminders at this time.');
            return;
        }

        foreach ($users as $user) {
            try {
                $user->notify(new MembershipRenewalReminder());
                Log::info("Reminder sent to user: {$user->email}");
            } catch (\Exception $e) {
                Log::error("Failed to send reminder to user: {$user->email}, Error: {$e->getMessage()}");
            }
        }
    }
}
