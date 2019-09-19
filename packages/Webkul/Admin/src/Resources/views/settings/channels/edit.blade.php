@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.channels.edit-title') }}
@stop

@section('content')
    <div class="content">

        <form method="POST" action="{{ route('admin.channels.update', $channel->id) }}" @submit.prevent="onSubmit" enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>

                        {{ __('admin::app.settings.channels.edit-title') }}
                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-md btn-primary">
                        {{ __('admin::app.settings.channels.save-btn-title') }}
                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    @csrf()
                    <input name="_method" type="hidden" value="PUT">

                    <accordian :title="'{{ __('admin::app.settings.channels.general') }}'" :active="true">
                        <div slot="body">

                            <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                                <label for="name" class="required">{{ __('admin::app.settings.channels.code') }}</label>
                                <input type="text" v-validate="'required'" class="control" id="name" name="name" data-vv-as="&quot;{{ __('admin::app.settings.channels.code') }}&quot;" value="{{ $channel->name }}" />
                                <input type="hidden" name="code" value="{{ $channel->code }}"/>
                                <br><span >*Maximum of 20 Characters</span>
                                <span class="control-error" v-if="errors.has('name')">@{{ errors.first('name') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('business_name') ? 'has-error' : '']">
                                <label for="business_name" class="required">{{ __('admin::app.settings.channels.business_name') }}</label>
                                <input v-validate="'required'" class="control" id="business_name" name="business_name"
                                    data-vv-as="&quot;{{ __('admin::app.settings.channels.business_name') }}&quot;"
                                    value="{{ old('business_name') ?: $channel->business_name }}"/>
                                <span class="control-error" v-if="errors.has('business_name')">@{{ errors.first('business_name') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('description') ? 'has-error' : '']">
                                <label for="description" class="required">{{ __('admin::app.settings.channels.description') }}</label>
                                <input v-validate="'required'" class="control" id="description" name="description"
                                    data-vv-as="&quot;{{ __('admin::app.settings.channels.description') }}&quot;"
                                    value="{{ old('description') ?: $channel->description }}"/>
                                <span class="control-error" v-if="errors.has('description')">@{{ errors.first('description') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']" >
                                <label for="email" class="required">{{ __('admin::app.settings.channels.email') }}</label>
                                <input v-validate="'required'" class="control" id="email" name="email" data-vv-as="&quot;{{ __('admin::app.settings.channels.email') }}&quot;" value="{{ old('email') ?: $channel->email }}"/>
                                <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                            </div>

                            {{-- <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                                <span class="checkbox">
                                    <input type="checkbox" id="receives_notification"  name="receives_notification" {{ $channel->receives_notification ? 'checked' : '' }}>

                                    <label class="checkbox-view" for="receives_notification"></label>
                                        Get notified when a customer places an order.
                                </span>
                            </div> --}}

                            <div class="control-group" :class="[errors.has('phone_number') ? 'has-error' : '']" >
                                <label for="phone_number" class="required">{{ __('admin::app.settings.channels.phone_number') }}</label>
                                <input v-validate="'required'" class="control" id="phone_number" name="phone_number" data-vv-as="&quot;{{ __('admin::app.settings.channels.phone_number') }}&quot;" value="{{ old('phone_number') ?: $channel->phone_number }}"/>
                                <span class="control-error" v-if="errors.has('phone_number')">@{{ errors.first('phone_number') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('address') ? 'has-error' : '']" >
                                <label for="address" class="required">{{ __('admin::app.settings.channels.address') }}</label>
                                <input v-validate="'required'" class="control" id="address" name="address" data-vv-as="&quot;{{ __('admin::app.settings.channels.address') }}&quot;" value="{{ old('address') ?: $channel->address }}"/>
                                <span class="control-error" v-if="errors.has('address')">@{{ errors.first('address') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('city') ? 'has-error' : '']" >
                                <label for="city" class="required">{{ __('admin::app.settings.channels.city') }}</label>
                                <input v-validate="'required'" class="control" id="city" name="city" data-vv-as="&quot;{{ __('admin::app.settings.channels.city') }}&quot;" value="{{ old('city') ?: $channel->city }}"/>
                                <span class="control-error" v-if="errors.has('city')">@{{ errors.first('city') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('postal_code') ? 'has-error' : '']" >
                                <label for="postal_code" class="required">{{ __('admin::app.settings.channels.postal_code') }}</label>
                                <input v-validate="'required'" class="control" id="postal_code" name="postal_code" data-vv-as="&quot;{{ __('admin::app.settings.channels.postal_code') }}&quot;" value="{{ old('postal_code') ?: $channel->postal_code }}"/>
                                <span class="control-error" v-if="errors.has('postal_code')">@{{ errors.first('postal_code') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('state') ? 'has-error' : '']" >
                                <label for="state" class="required">{{ __('admin::app.settings.channels.state') }}</label>
                                <input v-validate="'required'" class="control" id="state" name="state" data-vv-as="&quot;{{ __('admin::app.settings.channels.state') }}&quot;" value="{{ old('state') ?: $channel->state }}"/>
                                <span class="control-error" v-if="errors.has('state')">@{{ errors.first('state') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('country') ? 'has-error' : '']" >
                                <label for="country" class="required">{{ __('admin::app.settings.channels.country') }}</label>
                                <select type="text" v-validate="'required'" class="control" id="country" name="country" data-vv-as="&quot;{{ __('admin::app.customers.customers.country') }}&quot;">
                                    <option value=""></option>

                                    @foreach (core()->countries() as $country)

                                        <option value="{{ $country->name }}" {{ $country->name == $channel->country? 'selected' : '' }}>{{ $country->name }}</option>

                                    @endforeach
                                </select>
                                <span class="control-error" v-if="errors.has('country')">@{{ errors.first('country') }}</span>
                            </div>

{{--                             <div class="control-group">
                                <label for="description">{{ __('admin::app.settings.channels.description') }}</label>
                                <textarea class="control" id="description" name="description">{{ old('description') ?: $channel->description }}</textarea>
                            </div>
 --}}
                            <div class="control-group" :class="[errors.has('inventory_sources[]') ? 'has-error' : '']">
                                <label for="inventory_sources" class="required">{{ __('admin::app.settings.channels.inventory_sources') }}</label>
                                <?php $selectedOptionIds = old('inventory_sources') ?: $channel->inventory_sources->pluck('id')->toArray() ?>
                                <select v-validate="'required'" class="control" id="inventory_sources" name="inventory_sources[]" data-vv-as="&quot;{{ __('admin::app.settings.channels.inventory_sources') }}&quot;" multiple>
                                    @foreach (app('Webkul\Inventory\Repositories\InventorySourceRepository')->all() as $inventorySource)
                                        <option value="{{ $inventorySource->id }}" {{ in_array($inventorySource->id, $selectedOptionIds) ? 'selected' : '' }}>
                                            {{ $inventorySource->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="control-error" v-if="errors.has('inventory_sources[]')">@{{ errors.first('inventory_sources[]') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('root_category_id') ? 'has-error' : '']">
                                <label for="root_category_id" class="required">{{ __('admin::app.settings.channels.root-category') }}</label>
                                <?php $selectedOption = old('root_category_id') ?: $channel->root_category_id ?>
                                <select v-validate="'required'" class="control" id="root_category_id" name="root_category_id" data-vv-as="&quot;{{ __('admin::app.settings.channels.root-category') }}&quot;">
                                    @foreach (app('Webkul\Category\Repositories\CategoryRepository')->getRootCategories() as $category)
                                        <option value="{{ $category->id }}" {{ $selectedOption == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="control-error" v-if="errors.has('root_category_id')">@{{ errors.first('root_category_id') }}</span>
                            </div>

                            <div class="control-group">
                                <label for="hostname">{{ __('admin::app.settings.channels.hostname') }}</label>
                                <input type="text" class="control" id="hostname" name="hostname" value="{{ $channel->hostname }}" placeholder="https://www.example.com"/>
                            </div>

                        </div>
                    </accordian>

                    <accordian :title="'{{ __('admin::app.settings.channels.currencies-and-locales') }}'" :active="true">
                        <div slot="body">
                            <div class="control-group" :class="[errors.has('currencies[]') ? 'has-error' : '']">
                                <label for="currencies" class="required">{{ __('admin::app.settings.channels.currencies') }}</label>
                                <?php $selectedOptionIds = old('currencies') ?: $channel->currencies->pluck('id')->toArray() ?>
                                <select v-validate="'required'" class="control" id="currencies" name="currencies[]" data-vv-as="&quot;{{ __('admin::app.settings.channels.currencies') }}&quot;" multiple>
                                    @foreach (core()->getAllCurrencies() as $currency)
                                        <option value="{{ $currency->id }}" {{ in_array($currency->id, $selectedOptionIds) ? 'selected' : '' }}>
                                            {{ $currency->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="control-error" v-if="errors.has('currencies[]')">@{{ errors.first('currencies[]') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('base_currency_id') ? 'has-error' : '']">
                                <label for="base_currency_id" class="required">{{ __('admin::app.settings.channels.base-currency') }}</label>
                                <?php $selectedOption = old('base_currency_id') ?: $channel->base_currency_id ?>
                                <select v-validate="'required'" class="control" id="base_currency_id" name="base_currency_id" data-vv-as="&quot;{{ __('admin::app.settings.channels.base-currency') }}&quot;">
                                    @foreach (core()->getAllCurrencies() as $currency)
                                        <option value="{{ $currency->id }}" {{ $selectedOption == $currency->id ? 'selected' : '' }}>
                                            {{ $currency->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="control-error" v-if="errors.has('base_currency_id')">@{{ errors.first('base_currency_id') }}</span>
                            </div>

                        </div>
                    </accordian>
                </div>
            </div>
        </form>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: 'textarea#home_page_content,textarea#footer_content',
                height: 200,
                width: "100%",
                plugins: 'image imagetools media wordcount save fullscreen code',
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
                image_advtab: true,
                valid_elements : '*[*]'
            });
        });
    </script>
@endpush
