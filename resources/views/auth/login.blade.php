@extends('layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page">

    <div class="login-box">

        <div class="login-logo">
            <a href="{{ url('/home') }}">{{ env('APP_NAME') }}</a>
        </div><!-- /.login-logo -->

        @include('auth.partials.errors')

        <div class="login-box-body">
        
            <p class="login-box-msg"> Sign In</p>
            
            {!! Form::open(['url' => '/login', 'method'=> 'post']) !!}

                {!! Form::email('email', '', ['class'=> 'form-control', 'placeholder'=> trans('adminlte_lang::message.email')]) !!}

                {!! Form::password('password', ['class'=> 'form-control', 'placeholder'=> trans('adminlte_lang::message.password')]) !!}

                {!! Form::submit(trans('adminlte_lang::message.buttonsign'), ['class'=> 'btn btn-primary btn-block btn-flat']) !!}

            {!! Form::close() !!}

            <a href="{{ url('/register') }}" class="text-center">Don't have an account? Click here.</a> <br />

            <a href="{{ url('/password/reset') }}" class="text-center">I forgot my password</a>

        </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    {!! JsValidator::formRequest('App\Http\Requests\LoginRequest') !!}

</body>

@endsection
