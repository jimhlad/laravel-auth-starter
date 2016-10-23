@extends(Auth::check() ? 'layouts.app' : 'layouts.error')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.pagenotfound') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.404error') }}
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')

    <div class="error-page">
        <h2 class="headline text-blue"> 404</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-blue"></i> Oops! {{ trans('adminlte_lang::message.pagenotfound') }}.</h3>
            <p>
                {{ trans('adminlte_lang::message.notfindpage') }}
                {{ trans('adminlte_lang::message.mainwhile') }} <a href='{{ url('/home') }}'>{{ trans('adminlte_lang::message.returndashboard') }}</a>
            </p>
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->
@endsection