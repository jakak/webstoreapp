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

            <div class="profile-info announcekit-widget">
                <font color="#79C142"><i class="far fa-bell"></i></font>
            </div>

            <div class="profile-info">
                <div class="dropdown-toggle">
                    <div style="display: inline-block; vertical-align: middle;">
                        <i class="icon avatar active"></i>
                    </div>
                </div>

                <div class="dropdown-list bottom-right move-left" style="right: 10px!important;">
                    <div class="dropdown-container">
                        <ul>
							<span class="name">
                            {{ auth()->guard('admin')->user()->fullName() }}
                        </span>

                            <span class="role">
                            {{ auth()->guard('admin')->user()->role['name'] }}
                        </span>
                        </ul>
                        <hr style="height:1px; border:none; color:#e8e8e8; background:#e8e8e8;">
                        <ul>
                            <li>
                                <a href="{{ route('admin.account.index') }}"> {{ trans('admin::app.layouts.my-account') }}</a>
                            </li>
                        </ul>
                        <hr style="height:1px; border:none; color:#e8e8e8; background:#e8e8e8;">
                        <label><font size="2px">Quick Links</font></label>
                        <ul>
                            <li>
                                <a href="https://dashboard.paystack.com" target="_blank">{{ trans('admin::app.layouts.manage-paystack') }}</a>
                            </li>
                            <li>
                                <a href="https://help.webstore.ng" target="_blank">{{ trans('admin::app.layouts.get-support') }}</a>
                            </li>
                        </ul>
                        <hr style="height:1px; border:none; color:#e8e8e8; background:#e8e8e8;">
                        <ul>
                            <li>
                                <a href="{{ route('admin.session.destroy') }}"><i class="fas fa-sign-out-alt"></i> {{ trans('admin::app.layouts.logout') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="ld-scale">
                <div  class="profile-info">
                    <div class="dropdown-toggle">
                        <div style="display: inline-block; vertical-align: middle;">
                            <i style="color: #79C142; font-size: 2em" class="fab fa-buromobelexperte"></i>
                        </div>
                    </div>

                    <div class="dropdown-list bottom-right move-left" style="right: 10px!important;">
                        <div class="dropdown-container">
                            <ul>
                                <li>
                                    <a style="color: #79C142" href="{{ route('shop.home.index') }}" target="_blank" title="{{ trans('admin::app.layouts.storefront') }}">{{ core()->getCurrentChannel()->name }} <i class="fas fa-external-link-alt"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md-scale">
                <div  class="profile-info">
                    <a class="store-name" style="color: #79C142" href="{{ route('shop.home.index') }}" target="_blank" title="{{ trans('admin::app.layouts.storefront') }}">{{ core()->getCurrentChannel()->name }} <i class="fas fa-external-link-alt"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>
