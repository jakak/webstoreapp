<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>@yield('page_title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css">

        <link rel="icon" sizes="16x16" href="{{ asset('vendor/webkul/ui/assets/images/webstore-favicon-16x16.png') }}" />
        <style>
            .select2.select2-container {
                width: 70% !important;
            }
        </style>

        <link rel="stylesheet" href="{{ asset('vendor/webkul/admin/assets/css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/webkul/ui/assets/css/admin-ui.css') }}">

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

		<script>
			window.announcekit = (window.announcekit || { queue: [], on: function(n, x) { window.announcekit.queue.push([n, x]); }, push: function(x) { window.announcekit.queue.push(x); } });
			window.announcekit.push({
				"widget": "https://announcekit.app/widget/48CcJq",
				"selector": ".announcekit-widget",
				"version": 2,

                // Style config for badge:
                badge: {
                    style: {
                        position: "absolute",
                        top: "12px"
                    }
                }
			})
		</script>
		<script async src="https://cdn.announcekit.app/widget.js"></script>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('select.control[name]').select2({
                    minimumResultsForSearch: Infinity,
                    width: 'resolve'
                })
            })
        </script>
        @stack('scripts')

        {!! view_render_event('bagisto.admin.layout.body.after') !!}

        <div class="modal-overlay"></div>

    <script>
        $(function(){
            document.querySelectorAll('.select2').forEach(element => {
              element.addEventListener('click', function() {
                const options = document.querySelectorAll('.select2-results__option');
                options.forEach(element => {
                  const prevSibling = !!element.previousElementSibling;
                  const nextSibling = !!element.nextElementSibling;
                  const above = !!document.querySelector('.select2-container--above');

                  const below = !!document.querySelector('.select2-container--below');

                  if (prevSibling && nextSibling) {
                    return
                  }
                  if (options.length === 2) {
                    if (!!document.querySelector('.select2-container--below')) {
                      options[1].style.borderRadius = '0 0 7px 7px';
                    } else {
                      options[0].style.borderRadius = '7px 7px 0px 0px';
                    }
                    return;
                  }
                  if (!(prevSibling && !nextSibling)) {
                    if (!(!prevSibling && nextSibling)) {
                      return;
                    }
                    const needsRadius = nextSibling && !!above;
                    if (needsRadius) {
                      element.style.borderRadius = '7px 7px 0px 0px';
                    }
                    if (!needsRadius) {
                      element.style.borderTop = "solid 1px #79c142";
                      element.style.borderRadius = '0 0 0 0';
                    }
                  } else {
                    const needsRadius = prevSibling && below;
                    if (needsRadius) {
                      element.style.borderRadius = '0 0 7px 7px';
                    }
                    if (!needsRadius) {
                      element.style.borderRadius = '0 0 0 0';
                      element.style.borderBottom = "solid 1px #79c142";
                    }
                  }
                });
              })
            });
        });
    </script>
    </body>
</html>
