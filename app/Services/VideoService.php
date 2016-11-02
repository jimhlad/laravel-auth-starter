<?php

namespace App\Services;

use App\Video;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VideoService extends BaseService
{

 /**
  * @var Illuminate\Contracts\Auth\Guard $auth
  */
  private $auth;

  /**
  * @var App\Video
  */
  private $video;

 /**
  * Construct the service with the given repo
  *
  * @param Illuminate\Contracts\Auth\Guard $auth
  * @param App\Video $video
  */
  public function __construct(Guard $auth, Video $video) {

    $this->auth = $auth;
    $this->video = $video;

  }

  /**
   * Get the most recent videos
   * 
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function getRecentVideos() {

    return $this->video->where('is_approved', 1)->orderBy('created_at', 'desc')->take(12)->get();

  }

  /**
   * Get the video object for a particular slug
   *
   * @param string $slug
   * @return App\Video
   * @throws Illuminate\Database\Eloquent\ModelNotFoundException
   */
  public function findBySlug($slug) {

    return $this->video->where('slug', $slug)->where('is_approved', 1)->firstOrFail();

  }


}