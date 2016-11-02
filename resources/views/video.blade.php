@extends('layouts.app')

@section('htmlheader_title')
    Video
@endsection

@section('main-content')
    <div class="container spark-screen">

        <div class="col-md-12 col-md-offset-0">
            <div class="card">
              <div class="card-block">
                <h2 class="card-title"><center><span class='prefix'>In this {{ env('APP_NAME') }}:</span> {{ $video->title }}</center></h2>
              </div>
              <div class="flex-video widescreen">
                <iframe src="https://www.youtube.com/embed/{{ $video->youtube_id }}" frameborder="0" allowfullscreen></iframe>
              </div>
              <div class="card-block">
                <p class="card-text">{{ $video->description }}</p>
              </div>
            </div>
        </div>

    </div>
@endsection
