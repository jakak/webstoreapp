@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.catalog.families.title') }}
@stop

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('admin::app.catalog.families.title') }}</h1>
            </div>

            <div class="page-action">
                <a href="{{ route('admin.catalog.families.create') }}" class="btn btn-md btn-primary">
                    {{ __('admin::app.catalog.families.add-family-btn-title') }}
                </a>
            </div>
        </div>

        <div class="page-content">
            @inject('attributefamily','Webkul\Admin\DataGrids\AttributeFamilyDataGrid')
            {!! $attributefamily->render() !!}
        </div>
    </div>
@stop