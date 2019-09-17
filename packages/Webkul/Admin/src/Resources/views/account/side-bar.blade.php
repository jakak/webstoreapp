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
            @if (url()->current() === route('admin.account.subscription'))
            class="active"
            @endif
        >
            <a href="#">
                Subscription
                <i class="angle-right-icon"></i>
            </a>
        </li>
        <li
            @if (url()->current() === route('admin.account.webstore'))
            class="active"
            @endif
        >
            <a href="{{route('admin.account.webstore')}}">
                Webstore Version
                <i class="angle-right-icon"></i>
            </a>
        </li>
    </ul>
</div>
