@component('shop::emails.layouts.master')

    <div>
        <div style="text-align: center;">
            <a href="{{ config('app.url') }}">
                <img src="{{ bagisto_asset('images/logo.png') }}" style="width: 260px">
            </a>
        </div>

        <div  style="font-size:16px; color:#242424; font-weight:600; margin-top: 60px; margin-bottom: 15px">
            Awesome!
        </div>

        <div>
            <p>
                Your email has been verified.
            </p>
            <p>
                Proceed to order from our wide range of cakes and have it delivered to your doorstep. <br>
                We've put together some of our best cakes and products to help you and any recipient of your choice have an amazing experience.
            </p>
            <p>
                Anytime you have questions, we're here, just call or chat us up on WhatsApp; <em>+234 803 671 9340</em>.
            </p>
        </div>

    </div>

@endcomponent
