@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('main-content')
	<div class="container spark-screen">

		@foreach ($videos as $video)

			@if ($loop->first)
				<div class="row">
			@endif

			@if ($loop->iteration % 4 === 0)
				</div>
				<div class="row top-buffer">
			@endif

			<div class="col-md-4 col-md-offset-0">
	            <div class="card">
				  <a href="{{ url('/video/'.$video->slug) }}"><img class="card-img-top img-fluid" src="//img.youtube.com/vi/{{$video->youtube_id}}/0.jpg" alt=""></a>
				  <div class="card-block">
				    <h4 class="card-title">{{ str_limit($video->title, 40, '...') }}</h4>
				    <p class="card-text">{{ str_limit($video->description, 75, '...') }}</p>
				    <a href="{{ url('/video/'.$video->slug) }}" class="">WATCH VIDEO</a>
				  </div>
				</div>
	        </div>

			@if ($loop->last)
				</div>
			@endif

		@endforeach

	</div>
@endsection
