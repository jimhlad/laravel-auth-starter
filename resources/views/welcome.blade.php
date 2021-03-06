@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Welcome</h2>
                        {{ trans('adminlte_lang::message.logged') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

