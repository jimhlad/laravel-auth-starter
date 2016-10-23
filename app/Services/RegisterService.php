<?php

namespace App\Services;

use App\User;
use Exception;
use App\Events\UserSignup;
use App\Notifications\RegistrationWelcome;
use App\Exceptions\UserCouldNotBeRegisteredException;

class RegisterService extends BaseService
{

 /**
  * @var App\User $user
  */
  private $user;

 /**
  * Construct the service with the given models
  * 
  * @param App\User $user
  * @return void
  */
  public function __construct(User $user) {
    $this->user = $user;
  }

 /**
  * Sign the user up given a payload of user information
  *
  * @param  array $payload
  * @return App\User
  * @throws App\Exceptions\UserCouldNotBeRegisteredException
  */
	public function signup($payload) {

    try {

      // Create the user with a random verification token
      $payload['verify_token'] = str_random(32);
      $user = $this->user->create($payload);

      // Broadcast the appropriate events and notifications
      $user->notify(new RegistrationWelcome($user));
      event(new UserSignup($user));
      session()->flash('user.welcome', true);

      return $user;

    }
    catch(Exception $e) {
      throw new UserCouldNotBeRegisteredException;
    }

  }

}