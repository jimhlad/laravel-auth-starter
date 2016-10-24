@extends('layouts.auth')

@section('htmlheader_title')
    Password recovery
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
            <p class="login-box-msg">Reset Password</p>

            {!! Form::open(['url' => '/password/email', 'method'=> 'post']) !!}

                {!! Form::email('email', '', ['class'=> 'form-control', 'placeholder'=> trans('adminlte_lang::message.email')]) !!}

                {!! Form::submit(trans('adminlte_lang::message.sendpassword'), ['class'=> 'btn btn-primary btn-block btn-flat']) !!}

            {!! Form::close() !!}

            <a href="{{ url('/login') }}">Log in</a><br />

            <a href="{{ url('/register') }}" class="text-center">Create an account</a>

        </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    {!! JsValidator::formRequest('App\Http\Requests\ForgotPasswordRequest') !!}

</body>

@endsection
