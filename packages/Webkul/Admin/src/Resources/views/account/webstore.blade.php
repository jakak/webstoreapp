@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.account.title') }}
@stop

@section('css')
    <style>
        .hr {
            background-color: #79C142;
            border: none;
            height: 2px;
        }
    </style>
@endsection

@section('content-wrapper')
    <div class="inner-section">

        @include ('admin::account.side-bar')

        <div class="content-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="brand-logo">
                        <img src="{{ asset('vendor/webkul/ui/assets/images/webstore-logo.svg') }}" alt="Webstore by Haqqman"/>
                    </div>
                </div>
                <h2>@{{ changeLog.data.version }}</h2>
                <h4>Last updated: @{{ changeLog.data.last_updated }}</h4>
                <hr class="hr">
                <h2>@{{ changeLog.data.note }}</h2>
                <p>@{{ changeLog.data.description }}</p>
                <a href="https://announcekit.app/webstore/notifications" class="btn btn-md btn-primary">View Changelog</a>
            </div>
        </div>
    </div>
@endsection
