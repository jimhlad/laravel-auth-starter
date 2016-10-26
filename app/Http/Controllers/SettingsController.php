<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AccountService;
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
     * The AccountService responsible for updating a user's account
     * 
     * @var App\Services\AccountService $accountService
     */
    private $accountService;

    /**
     * Create a new controller instance.
     *
     * @param Illuminate\Contracts\Auth\Guard $auth
     * @return void
     */
    public function __construct(Guard $auth, AccountService $accountService)
    {
        $this->auth = $auth;
        $this->accountService = $accountService;
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
        $this->accountService->updateProfile($request->all());
        flash('Your profile information has been updated', 'success');
        $user = $this->auth->user();
        return view('settings')->with('user', $user);
    }
}