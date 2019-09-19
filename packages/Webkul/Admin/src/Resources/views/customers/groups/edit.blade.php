@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.customers.groups.edit-title') }}
@stop

@section('content')
    <div class="content">
        <form method="POST" action="{{ route('admin.groups.update', $group->id) }}">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>

                        {{ __('admin::app.customers.groups.edit-title') }}
                    </h1>
                </div>
            </div>

            <div class="page-content">

                <div class="form-container">
                    @csrf()

                    <input name="_method" type="hidden" value="PUT">

                    <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                        <label for="name" class="required">
                            {{ __('admin::app.customers.groups.name') }}
                        </label>
                        <input type="text" class="control" name="name" v-validate="'required'" value="{{ $group->name }}" data-vv-as="&quot;{{ __('admin::app.customers.groups.name') }}&quot;">
                        <span class="control-error" v-if="errors.has('name')">@{{ errors.first('name') }}</span>
                    </div>
                </div>

                <hr class="horizontal-line">
                <div class="form-bottom">
                    <button type="submit" class="btn btn-md btn-primary">
                        {{ __('admin::app.customers.groups.save-btn-title') }}
                    </button>
                </div>

            </div>
        </form>
    </div>
@stop
