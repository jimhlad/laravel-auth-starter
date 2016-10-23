<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class DisplayAccountAlerts
{

    /**
     * Our trusty Guard contract
     *
     * @var Illuminate\Contracts\Auth\Guard $auth
     */
    private $auth;

    /**
     * Create a new middleware instance.
     *
     * @param Illuminate\Contracts\Auth\Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $is_verified = $this->auth->user()->is_verified;
        if ($is_verified !== 1) {
            flash('Your email has not yet been verified. Please take a moment to check your email to verify your account.', 'warning');
        }

        return $next($request);
    }
}
