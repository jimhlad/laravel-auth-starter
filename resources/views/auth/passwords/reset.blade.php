@extends('layouts.auth')

@section('htmlheader_title')
    Password reset
@endsection

@section('content')

<body class="login-page">

    <div class="login-box">

        <div class="login-logo">
            <a href="{{ url('/home') }}">{{ env('APP_NAME') }}</a>
        </div><!-- /.login-logo -->

        @include('auth.passwords.partials.success_message')

        @include('auth.partials.errors')

        <div class="login-box-body">

            <p class="login-box-msg">{{ trans('adminlte_lang::message.passwordreset') }}</p>


            {!! Form::open(['url' => '/password/reset', 'method'=> 'post']) !!}

                {!! Form::hidden('token', $token) !!}

                {!! Form::email('email', '', ['class'=> 'form-control', 'placeholder'=> trans('adminlte_lang::message.email')]) !!}

                {!! Form::password('password', ['class'=> 'form-control', 'placeholder'=> trans('adminlte_lang::message.password')]) !!}

                {!! Form::password('password_confirmation', ['class'=> 'form-control', 'placeholder'=> trans('adminlte_lang::message.retrypepassword')]) !!}

                {!! Form::submit(trans('adminlte_lang::message.passwordreset'), ['class'=> 'btn btn-primary btn-block btn-flat']) !!}

            {!! Form::close() !!}

            <a href="{{ url('/login') }}">Log in</a><br />
            
            <a href="{{ url('/register') }}" class="text-center">Create an account</a>

        </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    {!! JsValidator::formRequest('App\Http\Requests\ResetPasswordRequest') !!}

</body>

@endsection
