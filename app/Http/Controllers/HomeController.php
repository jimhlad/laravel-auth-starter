<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\VideoService;
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
     * Our VideoService class
     * 
     * @var App\Services\VideoService $videoService
     */
    private $videoService;

    /**
     * Create a new controller instance.
     *
     * @param Illuminate\Contracts\Auth\Guard $auth
     * @return void
     */
    public function __construct(Guard $auth, VideoService $videoService)
    {
        $this->middleware('auth');
        $this->auth = $auth;
        $this->videoService = $videoService;
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
        $videos = $this->videoService->getRecentVideos();
        return view('home')->with('videos', $videos);
    }
}