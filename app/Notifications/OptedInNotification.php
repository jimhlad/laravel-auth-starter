<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OptedInNotification extends Notification
{
    use Queueable;

    /**
     * @var App\User
     */
    public $user;

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
        if ((int) $this->user->is_email_opted_in === 1) {
            return ['mail'];
        }
        return [];
    }

}
