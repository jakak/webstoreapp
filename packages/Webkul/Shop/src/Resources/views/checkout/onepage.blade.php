@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.onepage.title') }}
@stop

@section('content-wrapper')

    <checkout></checkout>

@endsection

@push('scripts')

    <script type="text/x-template" id="checkout-template">
        <div id="checkout" class="checkout-process">

            <div class="col-main">

                <ul class="checkout-steps">
                    <li class="active" :class="[completedStep >= 0 ? 'active' : '', completedStep > 0 ? 'completed' : '']" @click="navigateToStep(1)">
                        <div class="decorator address-info"></div>
                        <span>{{ __('shop::app.checkout.onepage.information') }}</span>
                    </li>

                    <div class="line mb-25"></div>

                    <li :class="[currentStep == 2 || completedStep > 1 ? 'active' : '', completedStep > 1 ? 'completed' : '']" @click="navigateToStep(2)">
                        <div class="decorator shipping"></div>
                        <span>{{ __('shop::app.checkout.onepage.shipping') }}</span>
                    </li>

                    <div class="line mb-25"></div>

                    <li :class="[currentStep == 3 || completedStep > 2 ? 'active' : '', completedStep > 2 ? 'completed' : '']" @click="navigateToStep(3)">
                        <div class="decorator payment"></div>
                        <span>{{ __('shop::app.checkout.onepage.payment') }}</span>
                    </li>

                    <div class="line mb-25"></div>

                    <li :class="[currentStep == 4 ? 'active' : '']">
                        <div class="decorator review"></div>
                        <span>{{ __('shop::app.checkout.onepage.complete') }}</span>
                    </li>
                </ul>

                <div class="step-content information" v-show="currentStep == 1">

                    @include('shop::checkout.onepage.customer-info')

                    <div class="button-group">

                        <button type="button" class="btn btn-lg btn-primary" @click="validateForm('address-form')" :disabled="disable_button">
                            {{ __('shop::app.checkout.onepage.continue') }}
                        </button>

                    </div>

                </div>

                <div class="step-content shipping" v-show="currentStep == 2">

                    <shipping-section v-if="currentStep == 2" @onShippingMethodSelected="shippingMethodSelected($event)"></shipping-section>

                    <div class="button-group">

                        <button type="button" class="btn btn-lg btn-primary" @click="validateForm('shipping-form')" :disabled="disable_button">
                            {{ __('shop::app.checkout.onepage.continue') }}
                        </button>

                    </div>

                </div>

                <div class="step-content payment" v-show="currentStep == 3">

                    <payment-section v-if="currentStep == 3" @onPaymentMethodSelected="paymentMethodSelected($event)"></payment-section>

                    <div class="button-group">

                        <button type="button" class="btn btn-lg btn-primary" v-if="selected_payment_method.method != 'paystack_payments'" @click="validateForm('payment-form')" :disabled="disable_button">
                            {{ __('shop::app.checkout.onepage.continue') }}
                        </button>
                    <paystack-component 
                        :email="address.billing.email" 
                        :amount="newTotal * 100" 
                        :publicKey="'{{ core()->getConfigData('payment.paymentmethods.paystack_payments.public_key') }}'" 
                        :referenceCode="`${address.billing.first_name.replace(/\s/g, '')}-${address.billing.last_name.replace(/\s/g, '')}-`+ '{{  $cart->id . '-' . $cart->grand_total}}'" 
                        class="btn btn-lg btn-primary" 
                        v-if="selected_payment_method.method == 'paystack_payments'"
                        :disabled="disable_button"
                        >
                    </paystack-component>
                    </div>

                </div>

                <div class="step-content review" v-show="currentStep == 4">

                    <review-section v-if="currentStep == 4"></review-section>

                    <div class="button-group">

                        <button type="button" class="btn btn-lg btn-primary" @click="placeOrder()" :disabled="disable_button">
                            {{ __('shop::app.checkout.onepage.place-order') }}
                        </button>

                    </div>

                </div>

            </div>

            <div class="col-right" v-show="currentStep != 4">

                <summary-section></summary-section>

            </div>

        </div>
    </script>

    <script>
        var shippingHtml = '';
        var paymentHtml = '';
        var reviewHtml = '';
        var summaryHtml = Vue.compile(`<?php echo view('shop::checkout.total.summary', ['cart' => $cart])->render(); ?>`);
        var customerAddress = null;
        var locations = @json($location);
        var base_price = Number({{ $cart->base_sub_total}});
        var newTotal = 0;
        
        @auth('customer')
            @if (auth('customer')->user()->default_address)
                customerAddress = @json(auth('customer')->user()->default_address);
            @else
                customerAddress = {};
            @endif
            customerAddress.email = "{{ auth('customer')->user()->email }}";
            customerAddress.first_name = "{{ auth('customer')->user()->first_name }}";
            customerAddress.last_name = "{{ auth('customer')->user()->last_name }}";
        @endauth

        Vue.component('checkout', {

            template: '#checkout-template',

            inject: ['$validator'],

            data: () => ({
                currentStep: 1,

                completedStep: 0,

                newTotal: 0,

                address: {
                    billing: {
                        use_for_shipping: true
                    },

                    shipping: {},
                },

                selected_shipping_method: '',

                selected_payment_method: '',

                disable_button: false,

                countryStates: @json(core()->groupedStatesByCountries())
            }),

            created() {
                if (customerAddress) {
                    this.address.billing = customerAddress;
                    this.address.use_for_shipping = true;
                }
            },

            methods: {
                navigateToStep (step) {
                    if (step <= this.completedStep) {
                        this.currentStep = step
                        this.completedStep = step - 1;
                    }
                },

                haveStates(addressType) {
                    if (this.countryStates[this.address[addressType].country] && this.countryStates[this.address[addressType].country].length)
                        return true;
                    
                    return false;
                },

                validateForm: function (scope) {
                    this.$validator.validateAll(scope).then((result) => {
                        if (result) {
                            if (scope == 'address-form') {
                                this.saveAddress()
                            } else if (scope == 'shipping-form') {
                                this.saveShipping()
                            } else if (scope == 'payment-form') {
                                this.savePayment()
                            }
                        }
                    });
                },

                saveAddress () {
                    var this_this = this;

                    this.disable_button = true;

                    this.$http.post("{{ route('shop.checkout.save-address') }}", this.address)
                        .then(function(response) {
                            this_this.disable_button = false;

                            if (response.data.jump_to_section == 'shipping') {
                                shippingHtml = Vue.compile(response.data.html)
                                this_this.completedStep = 1;
                                this_this.currentStep = 2;
                            }
                        })
                        .catch(function (error) {
                            this_this.disable_button = false;

                            this_this.handleErrorResponse(error.response, 'address-form')
                        })
                },

                saveShipping () {
                    var this_this = this;

                    this.disable_button = true;

                    this.$http.post("{{ route('shop.checkout.save-shipping') }}", {'shipping_method': this.selected_shipping_method})
                        .then(function(response) {
                            this_this.disable_button = false;

                            if (response.data.jump_to_section == 'payment') {
                                paymentHtml = Vue.compile(response.data.html)
                                this_this.completedStep = 2;
                                this_this.currentStep = 3;
                            }
                        })
                        .catch(function (error) {
                            this_this.disable_button = false;

                            this_this.handleErrorResponse(error.response, 'shipping-form')
                        })
                },

                savePayment () {
                    var this_this = this;

                    this.disable_button = true;

                    this.$http.post("{{ route('shop.checkout.save-payment') }}", {'payment': this.selected_payment_method})
                        .then(function(response) {
                            this_this.disable_button = false;

                            if (response.data.jump_to_section == 'review') {
                                reviewHtml = Vue.compile(response.data.html)
                                this_this.completedStep = 3;
                                this_this.currentStep = 4;
                            }
                        })
                        .catch(function (error) {
                            this_this.disable_button = false;

                            this_this.handleErrorResponse(error.response, 'payment-form')
                        })
                },

                placeOrder () {
                    var this_this = this;

                    this.disable_button = true;

                    this.$http.post("{{ route('shop.checkout.save-order') }}", {'_token': "{{ csrf_token() }}"})
                        .then(function(response) {
                            if (response.data.success) {
                                if (response.data.redirect_url) {
                                    window.location.href = response.data.redirect_url;
                                } else {
                                    window.location.href = "{{ route('shop.checkout.success') }}";
                                }
                            }
                        })
                        .catch(function (error) {
                            this_this.disable_button = true;

                            window.flashMessages = [{'type': 'alert-error', 'message': "{{ __('shop::app.common.error') }}" }];

                            this_this.$root.addFlashMessages()
                        })
                },

                handleErrorResponse (response, scope) {
                    if (response.status == 422) {
                        serverErrors = response.data.errors;
                        this.$root.addServerErrors(scope)
                    } else if (response.status == 403) {
                        if (response.data.redirect_url) {
                            window.location.href = response.data.redirect_url;
                        }
                    }
                },

                shippingMethodSelected (shippingMethod) {
                    this.selected_shipping_method = shippingMethod;

                    let currLocation = locations.find(loc => {
                        return loc.id == shippingMethod;
                    });
                    if (!currLocation) {
                        currLocation = {
                            location: 'Store Pickup',
                            rate: 0.00,
                            description: "{!! core()->getConfigData('sales.carriers.free.description') !!}"
                        }
                    }

                    let detailsHTML = document.createElement('div');
                    detailsHTML.classList.add('item-detail');
                    detailsHTML.innerHTML = `
                        <label>Delivery Charges</label>
                        <label class="right">NGN${currLocation.rate}</label>
                        `
                    let details = document.querySelectorAll('.item-detail');
                    
                    if (details.length == 2) {
                        details[0].insertAdjacentElement('afterend', detailsHTML);
                    } else if (details.length == 3) {
                        document.querySelector('.order-summary').removeChild(details[1]);
                        details[0].insertAdjacentElement('afterend', detailsHTML);
                    }

                    document.querySelector('#shippingLabel').innerHTML = currLocation.description;
                    let payableAmountDisplay = document.querySelector('.payble-amount').querySelector('.right');
                    const formatter = new Intl.NumberFormat('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                    newTotal = formatter.format(base_price + Number(currLocation.rate));
                    this.newTotal = base_price + Number(currLocation.rate);
                    payableAmountDisplay.innerHTML = `NGN${newTotal}`;
                    
                },

                paymentMethodSelected (paymentMethod) {
                    this.selected_payment_method = paymentMethod;
                }
            }
        })

        var summaryTemplateRenderFns = [];
        Vue.component('summary-section', {

            inject: ['$validator'],

            data: () => ({
                templateRender: null
            }),

            staticRenderFns: summaryTemplateRenderFns,

            mounted() {
                this.templateRender = summaryHtml.render;

                for (var i in summaryHtml.staticRenderFns) {
                    summaryTemplateRenderFns.push(summaryHtml.staticRenderFns[i]);
                }
            },

            render(h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                    ]);
            }
        })

        var shippingTemplateRenderFns = [];
        Vue.component('shipping-section', {

            inject: ['$validator'],

            data: () => ({
                templateRender: null,

                selected_shipping_method: '',
            }),

            staticRenderFns: shippingTemplateRenderFns,

            mounted() {
                this.templateRender = shippingHtml.render;
                for (var i in shippingHtml.staticRenderFns) {
                    shippingTemplateRenderFns.push(shippingHtml.staticRenderFns[i]);
                }
            },

            render(h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                    ]);
            },

            methods: {
                methodSelected () {
                    this.$emit('onShippingMethodSelected', this.selected_shipping_method)
                }
            }
        })

        var paymentTemplateRenderFns = [];
        Vue.component('payment-section', {

            inject: ['$validator'],

            data: () => ({
                templateRender: null,

                payment: {
                    method: ""
                },
            }),

            
            computed: {
                showPaymentButton() {
                    return this.selected_payment_method == 'paystack_payments';
                }
            },

            staticRenderFns: paymentTemplateRenderFns,

            mounted() {
                this.templateRender = paymentHtml.render;

                for (var i in paymentHtml.staticRenderFns) {
                    paymentTemplateRenderFns.unshift(paymentHtml.staticRenderFns[i]);
                }
            },

            render(h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                    ]);
            },

            methods: {
                methodSelected () {
                    this.$emit('onPaymentMethodSelected', this.payment)
                }
            }
        })

        var reviewTemplateRenderFns = [];
        Vue.component('review-section', {

            data: () => ({
                templateRender: null
            }),

            staticRenderFns: reviewTemplateRenderFns,

            mounted() {
                this.templateRender = reviewHtml.render;

                for (var i in reviewHtml.staticRenderFns) {
                    reviewTemplateRenderFns.unshift(reviewHtml.staticRenderFns[i]);
                }
            },

            render(h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                    ]);
            }
        })
    </script>

@endpush