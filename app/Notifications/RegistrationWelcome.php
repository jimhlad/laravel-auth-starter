<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegistrationWelcome extends Notification
{
    use Queueable;

    /**
     * @var App\User
     */
    private $user;

    /**
     * Create a new notification instance.
     *
     * @param App\User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
                    ->subject('Welcome to '.env('APP_NAME').' '.$this->user->name)
                    ->greeting('Hi '.$this->user->name.',')
                    ->line('Thank you for taking time to register for '.env('APP_NAME').'.')
                    ->line('Please take a moment to click on the link below to verify your email address.')
                    ->action('Verify Account', url('/account/verify/'.$this->user->verify_token))
                    ->line('If you have any questions, please don\'t hesitate to contact us.');
    }

}
