@extends('layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

<body class="hold-transition register-page">

    <div class="register-box">

        <div class="register-logo">
            <a href="{{ url('/home') }}">{{ env('APP_NAME') }}</a>
        </div>

        @include('auth.partials.errors')

        <div class="register-box-body">
        
            <p class="login-box-msg">Create a Free Account</p>

            {!! Form::open(['url' => '/register', 'method'=> 'post']) !!}

                <div class="form-group">
                    {!! Form::text('name', '', ['class'=> 'form-control', 'placeholder'=> trans('adminlte_lang::message.fullname')]) !!}
                </div>
                <div class="form-group">
                    {!! Form::email('email', '', ['class'=> 'form-control', 'placeholder'=> trans('adminlte_lang::message.email')]) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password', ['class'=> 'form-control', 'placeholder'=> trans('adminlte_lang::message.password')]) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password_confirmation', ['class'=> 'form-control', 'placeholder'=> trans('adminlte_lang::message.retrypepassword')]) !!}
                </div>
                {!! Form::submit(trans('adminlte_lang::message.register'), ['class'=> 'btn btn-primary btn-block btn-flat']) !!}

            {!! Form::close() !!}

            <a href="{{ url('/login') }}" class="text-center">I already have an account</a>

        </div><!-- /.form-box -->

    </div><!-- /.register-box -->

    {!! JsValidator::formRequest('App\Http\Requests\RegisterRequest') !!}

</body>

@endsection
