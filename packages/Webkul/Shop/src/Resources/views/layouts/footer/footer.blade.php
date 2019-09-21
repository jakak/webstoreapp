<div class="footer">
    <div class="footer-content">
        <div class="footer-list-container">

            {!! DbView::make(core()->getCurrentChannel())->field('footer_content')->render() !!}

            <div class="list-container">
                <span class="list-heading">{{ __('shop::app.footer.secure-shopping') }}</span>
                <div class="form-container">
                    <div class="control-group">
                        <img src="https://res.cloudinary.com/webstore-cloud/image/upload/c_thumb,w_200,g_face/v1567928939/Paystack/secured-by-paystack-square_ar41bj.png" />
                    </div>
                </div>

            </div>

			<div class="list-container">
                <span class="list-heading">{{ __('shop::app.footer.customer-care') }}</span>
                <div class="form-container">
                    <div class="control-group">
                        <a href="/pages/contact-store"><button class="btn btn-md btn-primary">Contact Store</button></a>
                    </div>
                </div>

				<span class="list-heading">{{ __('shop::app.footer.subscribe-newsletter') }}</span>
                <div class="form-container">
                    <form action="{{ route('shop.subscribe') }}">
                        <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                            <input type="email" class="control subscribe-field" name="email" placeholder="Email Address" required><br/>

                            <button class="btn btn-md btn-primary">{{ __('shop::app.subscription.subscribe') }}</button>
                        </div>
                    </form>
                </div>

				<div class="currency">
                    <span class="list-heading">{{ __('shop::app.footer.currency') }}</span>
                    <div class="form-container">
                        <div class="control-group">
                            <select class="control locale-switcher" onchange="window.location.href = this.value">

                                @foreach (core()->getCurrentChannel()->currencies as $currency)
                                    <option value="?currency={{ $currency->code }}" {{ $currency->code == core()->getCurrentCurrencyCode() ? 'selected' : '' }}>{{ $currency->code }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
