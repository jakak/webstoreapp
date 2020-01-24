<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>Opening Soon</title>
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

    <style>
        .mode-center {
            position: absolute;
            left: 55%;
            top: 50%;
            text-align: center;
            margin-left: -6%;
            padding-bottom: 90px;
            transform: translate(-50%, -50%);
        }
        .content {
            height: 50px;
            left: 50%;
            text-align: center;
            padding-top: 20px;
        }

        /* Mobile phones (portrait and landscape) ---------- */
        @media screen and (max-width: 767px) {
            img {
                width: 100%;
            }
            .mode-center {
                width: 100%;
                padding-left: 10px;
                padding-right: 10px;
            }
        }

    </style>
</head>

<body @if (app()->getLocale() == 'ar')class="rtl"@endif>

<div id="app">
    <div class="mode-center">
       <img src="https://res.cloudinary.com/webstore-cloud/image/upload/w_400,f_png,c_scale/v1576487786/Theme%20Manager/webstore-openingsoon-illustration_amnji2.svg">

        <div class="content">
            <h1>Opening Soon</h1>
            <p> The wait is almost over! We're presently updating our inventory and will be open for business soon.</p>
            <p>Follow us on our social media channels. Be the first to know when we open.</p>

            @foreach( App\SocialIcon::all() as $social )
                <a href="{{$social->url}}">{!! $social->icon !!}</a>
            @endforeach

            <custom-footer credit="{{core()->getCurrentChannel()->footer_credit}}"></custom-footer>
        </div>
        <div class="footer-bottom">

        </div>
    </div>

</div>

<script type="text/javascript" src="{{ bagisto_asset('js/shop.js') }}"></script>
</body>
</html>

