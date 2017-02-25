<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscriptionNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $email;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->email = $request->input('email');
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
        return (new MailMessage)
            ->greeting('Hello ' . $this->email . '!')
            ->subject('Subscription Confirmation at ' . config('app.name'))
            ->line('Do you confirm your sign up to our mailing list?')
            ->line('You have received this message because you signed up to our mailing list. Please confirm your interest by clicking of the link below:')
            ->action('Yes, add me to the list', url('subscription/confirm/' . $this->email))
            ->line('Your email address will be safely stored in our database. We do not share or sell this information with anyone')
            ->line('If you did not sign up for this list and your do not want to receive any emails from us, simply do not click the link below');

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
            //
        ];
    }
}
