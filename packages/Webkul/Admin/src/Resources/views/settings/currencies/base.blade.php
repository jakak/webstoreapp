@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.base_currencies.edit-title') }}
@stop

@section('content')

    <div class="content">

        <form method="POST" action="{{ route('admin.base.currencies.update', $baseCurrency->id) }}" @submit.prevent="onSubmit" enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        {{ __('admin::app.settings.base_currencies.edit-title') }}
                    </h1>
                </div>

            </div>

            <div class="page-content">
                <div class="form-container">
                    @csrf()
                    <input name="_method" type="hidden" value="PUT">

                        <div slot="body">
                            <div class="control-group" :class="[errors.has('currencies[]') ? 'has-error' : '']">
                                <label for="currencies" class="required">{{ __('admin::app.settings.channels.currencies') }}</label>
                                <?php $selectedOptionIds = old('currencies') ?: $baseCurrency->currencies->pluck('id')->toArray() ?>

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
                                <?php $selectedOption = old('base_currency_id') ?: $baseCurrency->base_currency_id ?>
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

                    <hr class="horizontal-line">
                    <div class="form-bottom">
                        <button type="submit" class="btn btn-md btn-primary">
                            {{ __('admin::app.settings.currencies.save-btn-title') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
