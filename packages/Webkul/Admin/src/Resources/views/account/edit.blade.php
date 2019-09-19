@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.account.title') }}
@stop

@section('content-wrapper')
    <div class="inner-section">

        @include ('admin::account.side-bar')

        <div class="content-wrapper">
            <div class="content">
                <form method="POST" action="" @submit.prevent="onSubmit">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>
                                {{ __('admin::app.account.title') }}
                            </h1>
                        </div>

                        <div class="page-action">
                            <button type="submit" class="btn btn-md btn-primary">
                                {{ __('admin::app.account.save-btn-title') }}
                            </button>
                        </div>
                    </div>

                    <div class="page-content">
                        <div class="form-container">
                            @csrf()
                            <input name="_method" type="hidden" value="PUT">
                            <accordian :title="'{{ __('admin::app.account.general') }}'" :active="true">
                                <div slot="body">
                                    <div class="wrap-control">
                                        <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                                            <label for="first_name" class="required">{{ __('admin::app.account.first-name') }}</label>
                                            <input type="text" v-validate="'required'" class="control" id="first_name" name="first_name" value="{{ $user->first_name }}"  data-vv-as="&quot;{{ __('admin::app.account.first-name') }}&quot;"/>
                                            <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
                                        </div>
                                        <div class="control-group last-name" :class="[errors.has('last_name') ? 'has-error' : '']">
                                            <label for="last_name" class="required">{{ __('admin::app.account.last-name') }}</label>
                                            <input type="text" v-validate="'required'" class="control" id="last_name" name="last_name" value="{{ $user->last_name }}"  data-vv-as="&quot;{{ __('admin::app.account.last-name') }}&quot;"/>
                                            <span class="control-error" v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</span>
                                        </div>
                                    </div>

                                    <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                                        <label for="email" class="required">{{ __('admin::app.account.email') }}</label>
                                        <input type="text" v-validate="'required|email'" class="control" id="email" name="email" value="{{ $user->email }}"  data-vv-as="&quot;{{ __('admin::app.account.email') }}&quot;"/>
                                        <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                                    </div>
                                </div>
                            </accordian>

                            <accordian :title="'{{ __('admin::app.account.security') }}'" :active="true">
                                <div slot="body">
                                    <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                                        <label for="password">{{ __('admin::app.account.password') }}</label>
                                        <input type="password" v-validate="'min:6'" class="control" id="password" name="password"  data-vv-as="&quot;{{ __('admin::app.account.password') }}&quot;"/>
                                        <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                                    </div>

                                    <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                                        <label for="password_confirmation">{{ __('admin::app.account.confirm-password') }}</label>
                                        <input type="password" v-validate="'min:6|confirmed:password'" class="control" id="password_confirmation" name="password_confirmation" data-vv-as="&quot;{{ __('admin::app.account.confirm-password') }}&quot;"/>
                                        <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
                                    </div>

                                    <div class="control-group" :class="[errors.has('current_password') ? 'has-error' : '']">
                                        <label for="current_password">{{ __('admin::app.account.current-password') }}</label>
                                        <input type="password" v-validate="'required|min:6'" class="control" id="current_password" name="current_password" data-vv-as="&quot;{{ __('admin::app.account.current-password') }}&quot;"/>
                                        <span class="control-error" v-if="errors.has('current_password')">@{{ errors.first('current_password') }}</span>
                                    </div>
                                </div>
                            </accordian>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
