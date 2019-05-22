@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.exchange_rates.title') }}
@stop

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('admin::app.settings.exchange_rates.title') }}</h1>
            </div>

            <div class="page-action">
                <a href="{{ route('admin.exchange_rates.create') }}" class="btn btn-md btn-primary">
                    {{ __('admin::app.settings.exchange_rates.add-title') }}
                </a>
            </div>
        </div>

        <div class="page-content">
            @inject('exchange_rates','Webkul\Admin\DataGrids\ExchangeRatesDataGrid')
            {!! $exchange_rates->render() !!}
        </div>
    </div>
@stop