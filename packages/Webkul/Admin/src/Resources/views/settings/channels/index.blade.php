@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.channels.title') }}
@stop

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('admin::app.settings.channels.title') }}</h1>
                <p>{{ __('admin::app.settings.channels.sub-title') }}</p>
            </div>

            <div class="page-action">
                <a href="{{ route('admin.channels.edit', $channel->id) }}" class="btn btn-md btn-primary">
                    {{ __('admin::app.settings.channels.edit-title') }}
                </a>
            </div>
        </div>

        <div class="page-content">
            <div class="table">
                <table class="table">
                    <thead>
                        <tr style="height: 50px;">
                            <th class="grid_head">
                                Merchant ID
                            </th>
                            <th class="grid_head">
                                Webstore Name
                            </th>
                            <th class="grid_head">
                                Websto.re Domain
                            </th>
                            <th class="grid_head">
                                Date Created
                            </th>
                            <th class="grid_head">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ 'MID-000000000' }}</td>
                            <td>{{ $channel->business_name }}</td>
                            <td>{{ $channel->hostname }}</td>
                            <td>{{ $channel->created_at ? $channel->created_at->format('M d, Y') : '' }}</td>
                            <td style="text-transform: capitalize">{{ $channel->status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
