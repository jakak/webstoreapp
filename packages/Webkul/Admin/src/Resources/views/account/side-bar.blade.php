<div class="aside-nav">
    <ul>
        <li @if (url()->current() === route('admin.account.index') || url()->current() === route('admin.account.edit')  )
            class="active"
            @endif
        >
            <a href="{{ route('admin.account.index') }}">
                Account Settings
                <i class="angle-right-icon"></i>
            </a>
        </li>
        <li
            @if (url()->current() === route('admin.account.subscription') ||
                url()->current() === route('admin.account.payment-method') ||
                url()->current() === route('admin.account.select-plan'))
            class="active"
            @endif
        >
            <a href="{{ route('admin.account.subscription') }}">
                Subscription
                <i class="angle-right-icon"></i>
            </a>
        </li>
        <li
            @if (url()->current() === route('admin.account.changelog'))
            class="active"
            @endif
        >
            <a href="{{route('admin.account.changelog')}}">
                Changelog
                <i class="angle-right-icon"></i>
            </a>
        </li>
    </ul>
</div>
