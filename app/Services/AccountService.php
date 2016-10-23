<?php

namespace App\Services;

use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AccountService extends BaseService
{

 /**
  * @var App\User $user
  */
  private $user;

 /**
  * Construct the service with the given repo
  * 
  * @param App\User $user
  */
  public function __construct(User $user) {

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

}