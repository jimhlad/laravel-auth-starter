<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\VideoService;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class VideoController
 * @package App\Http\Controllers
 */
class VideoController extends Controller
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
        $this->auth = $auth;
        $this->videoService = $videoService;
    }

    /**
     * Show the app dashboard or welcome page if the user has just registered.
     *
     * @param string $slug
     * @return Illuminate\Http\Response
     */
    public function index($slug)
    {
        try {
            $video = $this->videoService->findBySlug($slug);
            if ($this->auth->check()) {
                return view('video')->with('video', $video);
            }
            return view('preview')->with('video', $video);
        }
        catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}