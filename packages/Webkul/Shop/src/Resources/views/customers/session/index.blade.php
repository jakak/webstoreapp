@extends('shop::layouts.master')
@section('page_title')
    {{ __('shop::app.customer.login-form.page-title') }}
@endsection
@section('content-wrapper')

    <div class="auth-content">

        {!! view_render_event('bagisto.shop.customers.login.before') !!}

        <form method="POST" action="{{ route('customer.session.create') }}" @submit.prevent="onSubmit">
            {{ csrf_field() }}
            <div class="login-form">
                <div class="login-text">{{ __('shop::app.customer.login-form.title') }}</div>

                {!! view_render_event('bagisto.shop.customers.login_form_controls.before') !!}

                <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                    <label for="email">{{ __('shop::app.customer.login-form.email') }}</label>
                    <input type="text" class="control" name="email" v-validate="'required|email'" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.login-form.email') }}&quot;">
                    <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                </div>

                <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                    <label for="password">{{ __('shop::app.customer.login-form.password') }}</label>
                    <input type="password" class="control" name="password" v-validate="'required|min:6'" value="{{ old('password') }}" data-vv-as="&quot;{{ __('shop::app.customer.login-form.password') }}&quot;">
                    <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                </div>

                {!! view_render_event('bagisto.shop.customers.login_form_controls.after') !!}

                <div class="control-group">
                    <input class="btn btn-primary btn-md" type="submit" value="{{ __('shop::app.customer.login-form.button_title') }}">
                </div>

                <div class="sign-up-text">
                    <a class="hyperlink" href="{{ route('customer.register.index') }}">{{ __('shop::app.customer.login-text.new-customer') }} {{ __('shop::app.customer.login-text.title') }}</a>
                </div>

                <div class="forgot-password-link">
                    <a class="hyperlink" href="{{ route('customer.forgot-password.create') }}">{{ __('shop::app.customer.login-form.forgot_pass') }}</a>

                    <div class="mt-10">
                        @if (Cookie::has('enable-resend'))
                            @if (Cookie::get('enable-resend') == true)
                                <a  href="{{ route('customer.resend.verification-email', Cookie::get('email-for-resend')) }}">{{ __('shop::app.customer.login-form.resend-verification') }}</a>
                            @endif
                        @endif
                    </div>
                </div>

            </div>
        </form>

        {!! view_render_event('bagisto.shop.customers.login.after') !!}
    </div>

@endsection
