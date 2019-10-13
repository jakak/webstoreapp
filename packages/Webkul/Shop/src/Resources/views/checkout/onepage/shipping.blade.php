<form data-vv-scope="shipping-form">
    <div class="form-container">
        <div class="form-header">
            <h1>{{ __('shop::app.checkout.onepage.delivery-method') }}</h1>
        </div>

        <div class="shipping-methods">
            <label for="shipping">Select Store Pickup or Delivery Location</label>
            <div class="control-group" :class="[errors.has('shipping-form.shipping_method') ? 'has-error' : '']">
                <select type="text" placeholder="Select Store Pickup or Delivery Location" v-model="selected_shipping_method" v-validate="'required'" class="control" id="shipping" name="shipping_method" @change="methodSelected()">
                    @foreach ($shippingRateGroups as $rateGroup)
                        <optgroup label="Pick up your Items In-store">
                            @foreach ($rateGroup['rates'] as $rate)
                                <option value="{{ $rate->method }}"> {{ $rate->method_title }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                    <optgroup label="Select Delivery Location">
                        @foreach ($location as $loc)
                            <option id="location" value="{{ $loc->id }}">{{ $loc->location }}</option>
                        @endforeach
                    </optgroup>
                </select>
                <label for="shipping" id="shippingLabel"> {!! core()->getConfigData('sales.carriers.free.description') !!}</label>

                <span class="control-error" v-if="errors.has('shipping-form.shipping_method')">
                    @{{ errors.first('shipping-form.shipping_method') }}
                </span>

            </div>

        </div>
    </div>
</form>
