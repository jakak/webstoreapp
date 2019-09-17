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
                <h2>{webstore-version}</h2>
                <h4>Last updated {update-date}</h4>
                <hr class="hr">
                <h2>You have the latest version of webstore</h2>
                <p>[Version Description]</p>
                <button class="btn btn-md btn-primary">View Changelog</button>
            </div>
        </div>
    </div>
@endsection
