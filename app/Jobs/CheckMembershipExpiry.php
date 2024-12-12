<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CheckMembershipExpiry implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Handle the job execution.
     *
     * @return void
     */
    public function handle()
    {
        // Chunking the query to handle large datasets efficiently
        User::where('membership_status', 'active')
            ->where('membership_end_date', '<', now())
            ->chunk(100, function ($users) {
                foreach ($users as $user) {
                    try {
                        // Update user membership status
                        $user->update(['membership_status' => 'expired']);

                        // Log the update
                        Log::info("Membership expired for user: {$user->id}, Membership: {$user->membership_type}");
                    } catch (\Exception $e) {
                        // Log any errors encountered during the update
                        Log::error("Failed to update membership for user: {$user->id}, Error: {$e->getMessage()}");
                    }
                }
            });

        // Log a summary
        Log::info('Membership expiry check completed successfully.');
    }
}
