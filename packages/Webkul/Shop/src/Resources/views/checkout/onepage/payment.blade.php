<form data-vv-scope="payment-form">
    <div class="form-container">
        <div class="form-header">
            <h1>{{ __('shop::app.checkout.onepage.payment-information') }}</h1>
        </div>

        <div class="payment-methods">

            <div class="control-group" :class="[errors.has('payment-form.payment[method]') ? 'has-error' : '']">

                @foreach ($paymentMethods as $payment)


                    <span class="radio">
                        <input v-validate="'required'" type="radio" id="{{ $payment['method'] }}" name="payment[method]" value="{{ $payment['method'] }}" v-model="payment.method" @change="methodSelected()" data-vv-as="&quot;{{ __('shop::app.checkout.onepage.payment-method') }}&quot;">
                        <label class="radio-view" for="{{ $payment['method'] }}"></label>
                        {{ $payment['method_title'] }}
                    </span>
                    @if($payment['other_details'])
                        <div class="control-info">
                            <div>
                                <span class="details">Bank Name:</span>
                                <span>
                                    <strong>{{$payment['other_details']['bank']}}</strong>
                                </span>
                            </div>
                            <div>
                                <span class="details">Account Number:</span>
                                <span>
                                    <strong>
                                        <strong>{{$payment['other_details']['account_no']}}</strong>
                                    </strong>
                                </span>
                            </div>
                            <div>
                                <span class="details">Account Name:</span>
                                <span>
                                    <strong>
                                        <strong>{{$payment['other_details']['account_name']}}</strong>
                                    </strong>
                                </span>
                            </div>
                            <div style="margin-top:1em">Note: Call {{core()->getCurrentChannel()->phone_number}} to confirm payment after a successful bank transfer.</div>
                        </div>
                    @else
                        <span class="control-info">{{ $payment['description'] }}</span>
                    @endif
                @endforeach

                <span class="control-error" v-if="errors.has('payment-form.payment[method]')">
                    @{{ errors.first('payment-form.payment[method]') }}
                </span>

            </div>
        </div>
    </div>
</form>
