@extends('layouts.app')

@section('htmlheader_title')
    Settings
@endsection

@section('main-content')

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Your Profile</h2>

                        {!! Form::open(['url' => '/settings', 'method'=> 'post']) !!}

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            {!! Form::label('name', 'Full name', ['class' => '']) !!}

                            {!! Form::text('name', $user->name, ['class'=> 'form-control', 'placeholder'=> trans('adminlte_lang::message.fullname')]) !!}

                            @if ($errors->has('name'))
                                <span class="help-block error-help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            {!! Form::label('email', 'Email', ['class' => '']) !!}

                            {!! Form::email('email', $user->email, ['class'=> 'form-control', 'placeholder'=> trans('adminlte_lang::message.email')]) !!}

                            @if ($errors->has('email'))
                                <span class="help-block error-help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        {!! Form::submit('Save', ['class'=> 'btn btn-primary btn-block btn-flat']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! JsValidator::formRequest('App\Http\Requests\User\UpdateProfileRequest') !!}

@endsection
