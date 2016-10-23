<?php

namespace App\Events;

use App\User;
use Illuminate\Queue\SerializesModels;

/**
 * This class represents a user sign up (registration) event.
 */
class UserSignup
{
    use SerializesModels;

    /**
     * @var App\User $user
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param App\User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
