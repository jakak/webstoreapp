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
            <span class="avatar">
            </span>
			
			<div class="profile-icon">
				<a href="#"><i class="far fa-bell"></i></a>
            </div>
			
			<div class="profile-icon">
				<a href="{{ route('shop.home.index') }}" target="_blank" title="{{ trans('admin::app.layouts.storefront') }}"><i class="fas fa-external-link-alt"></i></a>
            </div>

            <div class="profile-info">
                <div class="dropdown-toggle">
                    <div style="display: inline-block; vertical-align: middle;">
                        <span class="name">
                            {{ auth()->guard('admin')->user()->name }}
                        </span>

                        <span class="role">
                            {{ auth()->guard('admin')->user()->role['name'] }}
                        </span>
                    </div>
                    <i class="icon arrow-down-icon active"></i>
                </div>

                <div class="dropdown-list bottom-right">
                    <div class="dropdown-container">
                        <label>Account</label>
                        <ul>
							<li>
                                <a href="{{ route('admin.account.edit') }}">{{ trans('admin::app.layouts.my-account') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.session.destroy') }}">{{ trans('admin::app.layouts.logout') }}</a>
                            </li>
                        </ul>
						<br>
						<label>Quick Links</label>
                        <ul>
                            <li>
                                <a href="https://dashboard.paystack.com" target="_blank">{{ trans('admin::app.layouts.manage-paystack') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>	
			
        </div>
    </div>
</div>