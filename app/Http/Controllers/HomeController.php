<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
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
        $this->middleware('auth');
        $this->auth = $auth;
    }

    /**
     * Show the app dashboard or welcome page if the user has just registered.
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $welcome = session()->pull('user.welcome');
        if ($welcome) {
            return view('welcome');
        }
        return view('home');
    }
}