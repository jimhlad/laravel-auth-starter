@extends(Auth::check() ? 'layouts.app' : 'layouts.error')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.servererror') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.500error') }}
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')

    <div class="error-page">
        <h2 class="headline text-yellow">500</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! {{ trans('adminlte_lang::message.somethingwrong') }}</h3>
            <p>
                {{ trans('adminlte_lang::message.wewillwork') }}
                {{ trans('adminlte_lang::message.mainwhile') }} <a href='{{ url('/home') }}'>{{ trans('adminlte_lang::message.returndashboard') }}</a>
            </p>
        </div>
    </div><!-- /.error-page -->
@endsection