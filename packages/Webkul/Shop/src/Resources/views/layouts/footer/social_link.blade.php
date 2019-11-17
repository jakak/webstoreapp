@section('css')
    <style>
        /* The container */
        .container {
            padding-left: 16px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 19px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default radio button */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        /* Create a custom radio button */
        .checkmark {
            position: absolute;
            top: 3px;
            left: 0;
            height: 18px;
            width: 18px;
            background-color: #eee;
            border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the radio button is checked, add a green background */
        .container input:checked ~ .checkmark {
            background-color: #79C142;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .container input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        .container .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        /* Ccontrol the padding of the buttons */
        .control-group {
            width: auto;
        }
    </style>
@endsection
<div slot="body">
    @include('shop::layouts.footer.social_theme')
    <hr>
    <h3>{{ __('admin::app.settings.footer.social-username') }}</h3>
    <div class="wrap-control">
        <div class="control-group">
            <label for="first_name">{{ __('admin::app.settings.footer.social') }}</label>
            <select type="text" v-validate="'required'" class="control" id="first_name" name="social_1">
                @foreach($socials as $social)
                    <option value="{{ $social }}" @foreach( App\SocialIcon::skip(0)->take(1)->get() as $socialName) {{ $socialName->name == $social ? "selected"  : "" }} @endforeach>{{$social}}</option>
                @endforeach
            </select>
        </div>

        <div class="control-group last-name">
            <label for="last_name">{{ __('admin::app.settings.footer.username') }}</label>
            <input type="text" v-validate="'required'" class="url control" id="last_name" name="name_1" placeholder="https://" value="{{App\SocialIcon::skip(0)->take(1)->get(['url'])[0]->url}}"/>
        </div>
    </div>

    <div class="wrap-control">
        <div class="control-group">
            <label for="first_name">{{ __('admin::app.settings.footer.social') }}</label>
            <select type="text" v-validate="'required'" class="control"  name="social_2">
                @foreach($socials as $social)
                    <option value="{{ $social }}" @foreach( App\SocialIcon::skip(1)->take(1)->get() as $socialName) {{ $socialName->name == $social ? "selected"  : "" }} @endforeach>{{$social}}</option>
                @endforeach
            </select>
        </div>

        <div class="control-group last-name">
            <label for="last_name">{{ __('admin::app.settings.footer.username') }}</label>
            <input type="text" v-validate="'required'" class="url control" id="last_name" name="name_2" placeholder="https://" value="{{App\SocialIcon::skip(1)->take(1)->get(['url'])[0]->url}}"/>
        </div>
    </div>

    <div class="wrap-control">
        <div class="control-group">
            <label for="first_name">{{ __('admin::app.settings.footer.social') }}</label>
            <select type="text" v-validate="'required'" class="control"  name="social_3">
                @foreach($socials as $social)
                    <option value="{{ $social }}" @foreach( App\SocialIcon::skip(2)->take(1)->get() as $socialName) {{ $socialName->name == $social ? "selected"  : "" }} @endforeach>{{$social}}</option>
                @endforeach
            </select>
        </div>

        <div class="control-group last-name">
            <label for="last_name">{{ __('admin::app.settings.footer.username') }}</label>
            <input type="text" v-validate="'required'" class="url control" id="last_name" name="name_3" placeholder="https://" value="{{App\SocialIcon::skip(2)->take(1)->get(['url'])[0]->url}}"/>
        </div>
    </div>

    <div class="wrap-control">
        <div class="control-group">
            <label for="first_name">{{ __('admin::app.settings.footer.social') }}</label>
            <select type="text" v-validate="'required'" class="control"  name="social_4">
                @foreach($socials as $social)
                    <option value="{{ $social }}" @foreach( App\SocialIcon::skip(3)->take(1)->get() as $socialName) {{ $socialName->name == $social ? "selected"  : "" }} @endforeach>{{$social}}</option>
                @endforeach
            </select>
        </div>

        <div class="control-group last-name">
            <label for="last_name">{{ __('admin::app.settings.footer.username') }}</label>

            <input type="text" v-validate="'required'" class="url control" id="last_name" name="name_4" value="{{App\SocialIcon::skip(3)->take(1)->get(['url'])[0]->url}}"/>
        </div>
    </div>

    <div class="wrap-control">
        <div class="control-group">
            <label for="first_name">{{ __('admin::app.settings.footer.social') }}</label>
            <select id="username5" type="text" v-validate="'required'" class="control"  name="social_5">
                @foreach($socials as $social)
                    <option value="{{ $social }}" @foreach( App\SocialIcon::skip(4)->take(1)->get() as $socialName) {{ $socialName->name == $social ? "selected"  : "" }} @endforeach>{{$social}}</option>
                @endforeach
            </select>
        </div>

        <div class="control-group last-name">
            <label for="last_name">{{ __('admin::app.settings.footer.username') }}</label>
            <input id="url" type="text" v-validate="'required'" class="control" id="last_name" name="name_5" value="{{App\SocialIcon::skip(4)->take(1)->get(['url'])[0]->url}}"/>
        </div>
    </div>

</div>

