<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<div class="navbar-top">
    <div class="navbar-top-left">
        <div class="brand-logo">
            <a href="{{ route('admin.dashboard.index') }}">
                <img src="{{ asset('vendor/webkul/ui/assets/images/webstore-logomark-two-toned.svg') }}" alt="Webstore by Haqqman"/>
            </a>
        </div>
    </div>

    <div class="navbar-top-right">
        <div class="profile">

			<div class="profile-info">
				<a href="#"><i class="far fa-bell"></i></a>
            </div>

			<div class="profile-info">
				<a href="{{ route('shop.home.index') }}" target="_blank" title="{{ trans('admin::app.layouts.storefront') }}"><i class="fas fa-external-link-alt"></i></a>
            </div>

            <div class="profile-info">
                <div class="dropdown-toggle">
                    <div style="display: inline-block; vertical-align: middle;">
                        <i class="icon avatar active"></i>
                    </div>
                </div>

                <div class="dropdown-list bottom-right">
                    <div class="dropdown-container">
                        <ul>
							<span class="name">
                            {{ auth()->guard('admin')->user()->name }}
                        </span>

                        <span class="role">
                            {{ auth()->guard('admin')->user()->role['name'] }}
                        </span>
                        </ul>
						<hr color="#e8e8e8">
                        <ul>
							<li>
                                <a href="{{ route('admin.account.index') }}"><i class="fas fa-user"></i> {{ trans('admin::app.layouts.my-account') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.session.destroy') }}"><i class="fas fa-sign-out-alt"></i> {{ trans('admin::app.layouts.logout') }}</a>
                            </li>
                        </ul>
						<br>
						<label>Quick Links</label>
                        <ul>
                            <li>
                                <a href="https://dashboard.paystack.com" target="_blank">{{ trans('admin::app.layouts.manage-paystack') }}</a>
                            </li>
							<li>
                                <a href="https://help.webstore.ng" target="_blank">{{ trans('admin::app.layouts.get-support') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
