@if(core()->getCurrentChannel()->status == 'Online' || auth()->guard('admin')->user())
    <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <title>{{ core()->getCurrentChannel()->business_name ?? 'My Webstore Space' }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ bagisto_asset('css/shop.css') }}">
    <link rel="stylesheet" href="{{ bagisto_asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    @if ($favicon = core()->getCurrentChannel()->favicon)
        <link rel="icon" sizes="16x16" href="{{ asset('storage/' . $favicon) }}" />
    @else
        <link rel="icon" sizes="16x16" href="{{ bagisto_asset('images/favicon.ico') }}" />
    @endif

    @yield('head')

    @section('seo')
        <meta name="description" content="{{ core()->getCurrentChannel()->description }}"/>
    @show

    @stack('css')

    {!! view_render_event('bagisto.shop.layout.head') !!}

    {{-- Render Style from database --}}
    <style>
        .footer {
            background-color: {{ '#'.core()->getColorPicker()->footer_bg }} !important;
        }
        .list-group a {
            color: {{ '#'.core()->getColorPicker()->footer_text }} !important;
        }
        .btn-primary {
            background-color: {{ '#'.core()->getColorPicker()->footer_button }} !important;
        }
        .list-heading {
            color: {{ '#'.core()->getColorPicker()->footer_title }} !important;
        }
        .addtocart {
            background: {{ '#'.core()->getColorPicker()->cart_button_bg }} !important;
            color: {{ '#'.core()->getColorPicker()->cart_button_text }} !important;
        }

        .nav a {
            color: {{ '#'.core()->getColorPicker()->top_menu_text }} !important;
        }
        .nav a:hover {
            color: {{ '#'.core()->getColorPicker()->top_menu_hover }} !important;
        }

        .header .header-bottom {
            background: {{ '#'.core()->getColorPicker()->top_menu_bg }} !important;
        }
        .link, .hyperlink, .remove-filter-link, .completed, .checkout-process .col-main ul.checkout-steps li.active {
            color: {{ '#'.core()->getColorPicker()->hyperlinks }} !important;
        }
        input:focus, select:focus {
            border-color: {{ '#'.core()->getColorPicker()->hyperlinks }} !important;
        }
        .decorator {
            border: 1px solid {{ '#'.core()->getColorPicker()->hyperlinks }} !important;
        }
        .menu-block .menubar li.active a {
            color: {{ '#'.core()->getColorPicker()->hyperlinks }} !important;
        }
        .tabs ul li.active a {
            border-bottom: 3px solid {{ '#'.core()->getColorPicker()->hyperlinks }} !important;
        }

    </style>

</head>

<body @if (app()->getLocale() == 'ar')class="rtl"@endif>

{!! view_render_event('bagisto.shop.layout.body.before') !!}

<div id="app">
    <flash-wrapper ref='flashes'></flash-wrapper>

    <div class="main-container-wrapper">

        {!! view_render_event('bagisto.shop.layout.header.before') !!}

        @include('shop::layouts.header.index')

        {!! view_render_event('bagisto.shop.layout.header.after') !!}

        @yield('slider')

        <div class="content-container">

            {!! view_render_event('bagisto.shop.layout.content.before') !!}

            @yield('content-wrapper')

            {!! view_render_event('bagisto.shop.layout.content.after') !!}

        </div>

    </div>

    {!! view_render_event('bagisto.shop.layout.footer.before') !!}

    @include('shop::layouts.footer.footer')

    {!! view_render_event('bagisto.shop.layout.footer.after') !!}

    <div class="footer-bottom">
        <custom-footer  credit="{{core()->getCurrentChannel()->footer_credit}}"></custom-footer>
    </div>

</div>
<script type="text/javascript">
    window.flashMessages = [];

    @if ($success = session('success'))
        window.flashMessages = [{'type': 'alert-success', 'message': "{{ $success }}" }];
    @elseif ($warning = session('warning'))
        window.flashMessages = [{'type': 'alert-warning', 'message': "{{ $warning }}" }];
    @elseif ($error = session('error'))
        window.flashMessages = [{'type': 'alert-error', 'message': "{{ $error }}" }
    ];
    @elseif ($info = session('info'))
        window.flashMessages = [{'type': 'alert-info', 'message': "{{ $info }}" }
    ];
    @endif

        window.serverErrors = [];
    @if(isset($errors))
        @if (count($errors))
        window.serverErrors = @json($errors->getMessages());
    @endif
    @endif
</script>

<script type="text/javascript" src="{{ bagisto_asset('js/shop.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>

@stack('scripts')

{!! view_render_event('bagisto.shop.layout.body.after') !!}

<div class="modal-overlay"></div>

</body>

</html>
@elseif(core()->getCurrentChannel()->status == 'Maintenance Mode')
    @include('shop::mode.maintenance')
@endif
