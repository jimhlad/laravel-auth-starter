<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\User\UpdateProfileRequest;

/**
 * Class SettingsController
 * @package App\Http\Controllers
 */
class SettingsController extends Controller
{

    /**
     * Our trusty Guard contract.
     * 
     * @var Illuminate\Contracts\Auth\Guard $auth
     */
    private $auth;

    /**
     * Create a new controller instance.
     *
     * @param Illuminate\Contracts\Auth\Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Show the app dashboard or welcome page if the user has just registered.
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->auth->user();
        return view('settings')->with('user', $user);
    }

    /**
     * Update the user's profile.
     *
     * @return Illuminate\Http\Response
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = $this->auth->user();
        $user->update($request->all());
        return view('settings')->with('user', $user);
    }
}