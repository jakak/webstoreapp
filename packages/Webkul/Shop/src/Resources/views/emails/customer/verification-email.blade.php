@component('shop::emails.layouts.master')

    <div>
        <div style="text-align: center;">
            <a href="{{ config('app.url') }}">
                <img src="{{ bagisto_asset('images/logo.svg') }}">
            </a>
        </div>

        <div  style="font-size:16px; color:#242424; font-weight:600; margin-top: 60px; margin-bottom: 15px">
            Hello,
        </div>
        <p>Hello,</p>
        <p></p>
        <p>
            Thank you for choosing <strong>KlingBakeShop!</strong> 
            You are just one click away from completing your account registration.
        </p>

        <p>
            Confirm your e-mail by clicking the button 'Verify Your Account' below.
        </p>        

        <div  style="margin-top: 40px; text-align: center">
            <a href="{{ route('customer.verify', $data['token']) }}" style="font-size: 16px;
            color: #FFFFFF; text-align: center; background: #0031F0; padding: 10px 30px;text-decoration: none;">Verify Your Account</a>
        </div>
        <p>
            <em>By clicking the button, you agree to the Terms of Service and the Privacy Policy on KlingBakeShop.</em>
        </p>
    </div>

@endcomponent