@extends('admin::layouts.anonymous-master')

@section('page_title')
    {{ __('admin::app.users.sessions.title') }}
@stop

@section('content')

    <div class="panel">

        <div class="panel-content">

            <div class="form-container" style="text-align: left">

                <h2 style="text-align: center;">{{ __('admin::app.users.sessions.title') }}</h2>

                <form method="POST" action="{{ route('admin.session.store') }}" @submit.prevent="onSubmit">
                    @csrf

                    <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                        <label for="email">{{ __('admin::app.users.sessions.email') }}</label>
                        <input type="text" v-validate="'required'" class="control" id="email" name="email" data-vv-as="&quot;{{ __('admin::app.users.sessions.email') }}&quot;"/>
                        <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                        <label for="password" style="display: flex; justify-content: space-between; width: 100%">
                            <span>{{ __('admin::app.users.sessions.password') }}</span>
                            <a href="{{ route('admin.forget-password.create') }}" class="primary">Reset</a>
                        </label>

                        <input type="password" v-validate="'required|min:6'" class="control" id="password" name="password" data-vv-as="&quot;{{ __('admin::app.users.sessions.password') }}&quot;"/>
                        <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                    </div>

                    <div class="button-group">
                        <button class="btn btn-xl btn-primary">{{ __('admin::app.users.sessions.submit-btn-title') }}</button>
                    </div>
                </form>

            </div>

        </div>

    </div>

@stop
