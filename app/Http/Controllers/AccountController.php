<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\AccountService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class AccountController
 * @package App\Http\Controllers
 */
class AccountController extends Controller
{

    /**
     * The service responsible for handling user account operations
     * 
     * @var App\Services\AccountService $accountService
     */
    private $accountService;

    /**
     * Construct the controller with the given service
     * 
     * @param App\Services\AccountService $accountService
     */
    public function __construct(AccountService $accountService) {
        $this->accountService = $accountService;
    }

    /**
     * Handle the account verification link
     *
     * @param string $token
     * @return Illuminate\Http\Response
     */
    public function verify($token)
    {
        try {
            $this->accountService->verify($token);
            flash('Your account has been successfully verified', 'success');
            return redirect('/home');
        }
        catch(ModelNotFoundException $e) {
            abort(403);
        }
        
    }
}