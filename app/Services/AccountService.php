<?php

namespace App\Services;

use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AccountService extends BaseService
{

 /**
  * @var App\User $user
  */
  private $user;

 /**
  * @var Illuminate\Contracts\Auth\Guard $auth
  */
  private $auth;

 /**
  * Construct the service with the given repo
  *
  * @param Illuminate\Contracts\Auth\Guard $auth
  * @param App\User $user
  */
  public function __construct(Guard $auth, User $user) {

    $this->auth = $auth;
    $this->user = $user;

  }

 /**
  * Verify the user's email address using the provided token
  *
  * @param  string $token
  * @return void
  * @throws Illuminate\Database\Eloquent\ModelNotFoundException
  */
  public function verify($token) {

    $user = $this->user->where('verify_token', $token)->firstOrFail();
    $user->is_verified = 1;
    $user->save();
  
  }

 /**
  * Update the users's profile information given an array payload
  *
  * @param  array $payload
  * @return void
  */
  public function updateProfile($payload) {

    if (!isset($payload['is_email_opted_in'])) {
      $payload['is_email_opted_in'] = 0;
    }

    $payload['is_email_opted_in'] = (int) $payload['is_email_opted_in'];
    $this->auth->user()->update($payload);
  
  }

}