<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>@yield('page_title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" sizes="16x16" href="{{ asset('vendor/webkul/ui/assets/images/favicon.ico') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css">

        <link rel="stylesheet" href="{{ asset('vendor/webkul/admin/assets/css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/webkul/ui/assets/css/admin-ui.css') }}">
        <style>
            .select2.select2-container {
                box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.05);
                border: 1px solid #c7c7c7;
                padding: 3px 5px 3px 5px;
                margin-top: 10px;
                margin-bottom: 5px;
                font-size: 15px;
                -webkit-border-radius: 7px;
                -moz-border-radius: 7px;
                border-radius: 7px;

            }
            .select2.select2-container.select2-container--focus.select2-container--open {
                -webkit-border-radius: 7px 7px 0 0;
                -moz-border-radius: 7px 7px 0 0;
                border-radius: 7px 7px 0 0;
                border-bottom-color: #fff;
            }
            .select2.select2-container .selection .select2-selection {
                border: none;
            }
            .select2-container--default .select2-selection--single .select2-selection__arrow {
                top: 4px;
            }
            .select2-container--default .select2-results__option {
                padding: 8px 13px;
                font-size: 15px;
            }
            .select2-container--default .select2-results__option[aria-selected=true] {
                background-color: #fff;
                color: #3a3a3a;
            }
            .select2-container--default .select2-results__option.select2-results__option--highlighted {
                background-color: #79C142;
                color: #fff;
            }
        </style>

        @yield('head')

        @yield('css')

        @stack('styles')

        {!! view_render_event('bagisto.admin.layout.head') !!}

    </head>

    <body style="scroll-behavior: smooth;">
        {!! view_render_event('bagisto.admin.layout.body.before') !!}

        <div id="app">

            <flash-wrapper ref='flashes'></flash-wrapper>

            {!! view_render_event('bagisto.admin.layout.nav-top.before') !!}

            @include ('admin::layouts.nav-top')

            {!! view_render_event('bagisto.admin.layout.nav-top.after') !!}


            {!! view_render_event('bagisto.admin.layout.nav-left.before') !!}

            @include ('admin::layouts.nav-left')

            {!! view_render_event('bagisto.admin.layout.nav-left.after') !!}


            <div class="content-container">

                {!! view_render_event('bagisto.admin.layout.content.before') !!}

                @yield('content-wrapper')

                {!! view_render_event('bagisto.admin.layout.content.after') !!}

            </div>

        </div>
        <script type="text/javascript">
            window.flashMessages = [];

            @if ($success = session('success'))
                window.flashMessages = [{'type': 'alert-success', 'message': "{{ $success }}" }];
            @elseif ($warning = session('warning'))
                window.flashMessages = [{'type': 'alert-warning', 'message': "{{ $warning }}" }];
            @elseif ($error = session('error'))
                window.flashMessages = [{'type': 'alert-error', 'message': "{{ $error }}" }];
            @elseif ($info = session('info'))
                window.flashMessages = [{'type': 'alert-error', 'message': "{{ $info }}" }];
            @endif

            window.serverErrors = [];
            @if (isset($errors))
                @if (count($errors))
                    window.serverErrors = @json($errors->getMessages());
                @endif
            @endif
        </script>

        <script type="text/javascript" src="{{ asset('vendor/webkul/admin/assets/js/admin.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('select').select2({
                    minimumResultsForSearch: Infinity,
                    width: 'resolve'
                })
                $('select.filter-column-select').select2({
                    minimumResultsForSearch: Infinity,
                    width: '100%'
                })
            })
        </script>
        @stack('scripts')

        {!! view_render_event('bagisto.admin.layout.body.after') !!}

        <div class="modal-overlay"></div>
    </body>
</html>
