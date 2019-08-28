@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.themes.title') }}
@stop
<style>
    .tabs {
        display: none;
    }
    .page-img {
        display: flex;
        justify-content: center;
    }
    .page-img img {
        width: 65%;
        height: 65%;
    }
</style>
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('admin::app.settings.themes.title') }}</h1>
            </div>
        </div>
        <div class="page-content">
            <div class="page-img">
                <img src="{{ asset('https://res.cloudinary.com/haqqmancloud/image/upload/v1563697651/webstore.ng/storemanager/x0t3oejjpjhcsfbyf3sb.svg') }}" alt="">
            </div>
            <div class="table">
                <table class="table">
                    <thead>
                        <tr style="height: 65px;">
                            <th style="width:80%">
                                Current Theme
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>Web Space Theme</td>
                        <td><a href="{{ route('admin.themes.customize') }}" class="btn btn-md btn-primary">Customize</a></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop