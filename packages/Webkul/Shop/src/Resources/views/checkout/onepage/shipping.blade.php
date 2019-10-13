<form data-vv-scope="shipping-form">
    <div class="form-container">
        <div class="form-header">
            <h1>{{ __('shop::app.checkout.onepage.shipping-method') }}</h1>
        </div>

        <div class="shipping-methods">
            <label for="shipping">Select Store Pickup or Delivery Location</label>
            <div class="control-group" :class="[errors.has('shipping-form.shipping_method') ? 'has-error' : '']">
                <select type="text" placeholder="Select Store Pickup or Delivery Location" v-model="selected_shipping_method" v-validate="'required'" class="control" id="shipping" name="shipping_method" @change="methodSelected()">
                    @foreach ($shippingRateGroups as $rateGroup)
                        @foreach ($rateGroup['rates'] as $rate)
                            <option value="{{ $rate->method }}"> {{ $rate->method_title }}</option>
                        @endforeach
                        <hr style="border: 2px solid #C7C7C7; width: 70%;">
                    @endforeach
                    <optgroup label="Select Delivery Location">
                        @foreach ($location as $loc)
                            <option id="location" value="{{ $loc->id }}">{{ $loc->location }}</option>
                        @endforeach
                    </optgroup>
                </select>
                <label for="shipping" id="shippingLabel"> {!! core()->getConfigData('sales.carriers.free.description') !!}</label>
                {{-- @foreach ($shippingRateGroups as $rateGroup)
                    <h4 for="">{{ $rateGroup['carrier_title'] }}</h4>

                    @foreach ($rateGroup['rates'] as $rate)
                        <span class="radio" >
                            <input v-validate="'required'" type="radio" id="{{ $rate->method }}" name="shipping_method" data-vv-as="&quot;{{ __('shop::app.checkout.onepage.shipping-method') }}&quot;" value="{{ $rate->method }}" v-model="selected_shipping_method" @change="methodSelected()">
                            <label class="radio-view" for="{{ $rate->method }}"></label>
                            {{ $rate->method_title }}
                            <b>{{ core()->currency($rate->base_price) }}</b>
                        </span>
                    @endforeach

                @endforeach --}}

                <span class="control-error" v-if="errors.has('shipping-form.shipping_method')">
                    @{{ errors.first('shipping-form.shipping_method') }}
                </span>

            </div>

        </div>
    </div>
</form>
