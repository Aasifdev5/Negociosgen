<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MembershipRenewalReminder extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        // Initialization logic (if needed)
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
{
    // Ensure membership_end_date is a Carbon instance
    $membershipEndDate = \Carbon\Carbon::parse($notifiable->membership_end_date);

    // Generate the dynamic renewal URL with the user_id as a query parameter
    $renewUrl = url('/membership/renew') . '?user_id=' . $notifiable->id;

    return (new MailMessage)
        ->subject('Membership Renewal Reminder')
        ->greeting("Hello, {$notifiable->name}!")
        ->line("Your {$notifiable->membership_type} membership is set to expire on " . $membershipEndDate->format('d M Y') . ".")
        ->line('Please renew your membership to avoid interruption in services.')
        ->action('Renew Now', $renewUrl)
        ->line('Thank you for being a valued member!');
}



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'membership_type' => $notifiable->membership_type,
            'membership_end_date' => $notifiable->membership_end_date,
        ];
    }
}
