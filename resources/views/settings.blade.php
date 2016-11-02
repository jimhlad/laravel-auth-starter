@extends('layouts.app')

@section('htmlheader_title')
    Settings
@endsection

@section('main-content')

    <div class="container spark-screen">
        <div class="row">
            <!-- <div class="col-md-4 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url' => '/file/upload', 'class'=> 'dropzone']) !!}
                            <div class="dz-message needsclick">
                                Drop an image here to upload a profile picture.<br/>
                                <span class="note needsclick">Or click to browse your files.</span>
                            </div>
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div> -->
            <div class="col-md-8 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2><center>Basic Info</center></h2>

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

                        <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                            {!! Form::label('phone_number', 'Phone Number', ['class' => '']) !!}

                            {!! Form::text('phone_number', $user->phone_number, ['class'=> 'form-control', 'placeholder'=> '']) !!}

                            @if ($errors->has('phone_number'))
                                <span class="help-block error-help-block">{{ $errors->first('phone_number') }}</span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('is_email_opted_in') ? 'has-error' : '' }}">
                            {!! Form::checkbox('is_email_opted_in', 1, $user->is_email_opted_in === 1) !!} <span>Email me when new videos are added or about exclusive member-only offers</span>

                            @if ($errors->has('is_email_opted_in'))
                                <span class="help-block error-help-block">{{ $errors->first('is_email_opted_in') }}</span>
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