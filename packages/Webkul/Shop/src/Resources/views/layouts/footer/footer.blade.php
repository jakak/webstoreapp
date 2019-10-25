<div class="footer">
    <div class="footer-content">
        <div class="footer-list-container">

            <div class="list-container">
                <span class="list-heading">{{ __('shop::app.footer.page-links') }}</span>
                <div class="form-container">
                    <div class="control-group">
                        <ul class="text-color list-group">
                            @foreach(App\FooterPage::all() as $page)
                                @if($page->name != "none")
                                    <li><a href="{{ $page->url  }}">{{ $page->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

            <div class="list-container">
                <span class="list-heading">{{ __('shop::app.footer.store-info') }}</span>
                <div class="form-container">
                    <div class="control-group">
                        <ul class="list-group">
                            <li><a href="/about">About</a></li>
                            <li><a href="/refund-policy">Refund policy</a></li>
                            <li><a href="/return-policy">Return policy</a></li>
                            <li><a href="/privacy-policy">Privacy policy</a></li>
                            <li><a href="/terms-of-use">Terms of use</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="list-container">
                <span class="list-heading">{{ __('shop::app.footer.secure-shopping') }}</span>
                <div class="form-container">
                    <div class="control-group">
                        <img src="https://res.cloudinary.com/webstore-cloud/image/upload/c_scale,w_250/v1567929421/Paystack/paystack-badge-cards_nji4dn.png" />
                    </div>
                </div>

                <span class="list-heading">{{ __('shop::app.footer.social') }}</span>
                <div class="form-container">
                    <div class="control-group">
                        <a href="https://instagram.com/#"><span><i class="fab fa-instagram" style="font-size: 1.5em; color: #4F5B64; margin-right: 15px;"></i></span></a>
                        <a href="https://twitter.com/#"><span><i class="fab fa-twitter" style="font-size: 1.5em; color: #1da1f2; margin-right: 15px;"></i></span></a>
                        <a href="https://facebook.com/#"><span><i class="fab fa-facebook-square fa-1x" style="font-size: 1.5em; color: #3b5998; margin-right: 15px;"></i></span></a>
                        <a href="+234 803 671 9340"><span><i class="fab fa-whatsapp" style="font-size: 1.5em; color: #25d366; margin-right: 15px;"></i></span></a>
                    </div>
                </div>

            </div>

            <div class="list-container">
                <span class="list-heading">{{ __('shop::app.footer.customer-care') }}</span>
                <div class="form-container">
                    <div class="control-group">
                        <a href="/contact-store"><button class="btn btn-md btn-primary"><span><i class="fas fa-headset"></i></span> Contact Store</button></a>
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
