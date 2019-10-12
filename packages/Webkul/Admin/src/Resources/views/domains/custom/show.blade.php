@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.domains.connect-domain') }}
@stop
@section('css')
    <style>
        .tabs {
            display: none;
        }
        .sub-title {
            color: #8b8b8b;
        }
        #datagrid-filters {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('admin::app.settings.domains.connect-domain') }}</h1>
                <p class="sub-title">Connect a domain to your webstore</p>
            </div>
            <div class="page-action">
                <a href="{{ route('admin.domains.custom') }}" class="btn btn-md btn-primary">
                    Connect Domain
                </a>
            </div>
        </div>
        <div class="page-content">
            @inject('domainGrid', 'App\DataGrids\DomainsDataGrid')
            {!! $domainGrid->render() !!}
        </div>
    </div>
@stop
