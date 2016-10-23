<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verify_token', 'is_verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        $toEmail = (env('APP_DEBUG') === true && filter_var(env('APP_DEBUG_EMAIL'), FILTER_VALIDATE_EMAIL) ? env('APP_DEBUG_EMAIL') : $this->email);

        return $toEmail;
    }
}
