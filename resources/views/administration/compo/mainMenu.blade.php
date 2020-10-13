<div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            @if(auth('admin')->check() || auth('provider')->check())
                <li class="nav-item">
                    <a href="{{ route('app.dashboard') }}">
                        <i class="la la-television"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check())
                <li class="nav-item">
                    <a href="javascript:void(0);">
                        <i class="la la-user"></i>
                        <span class="menu-title">Users</span>
                    </a>

                    <ul class="menu-content">
                        <li>
                            <a class="menu-item" href="{{ route('app.provider.list') }}" >Providers</a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{ route('app.customer.list') }}">Customers</a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{ route('app.admin.list') }}">Admins</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(auth('admin')->check())
                <li class="nav-item">
                    <a href="{{ route('app.coupon.list') }}">
                        <i class="la la-gift"></i>
                        <span class="menu-title">Coupon</span>
                    </a>
                </li>
            @endif

            @if(auth('admin')->check() or auth('provider')->check())
                <li class="nav-item">
                    <a href="javascript:void(0);">
                        <i class="la la-bank"></i>
                        <span class="menu-title">Properties</span>
                    </a>

                    <ul class="menu-content">
                        <li>
                            <a class="menu-item" href="{{ route('app.property.list') }}" >All Properties</a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{ route('app.property.add') }}">Add Property</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(auth('admin')->check() or auth('provider')->check())
                <li class="nav-item">
                    <a href="javascript:void(0);">
                        <i class="la la-automobile"></i>
                        <span class="menu-title">Bookings</span>
                    </a>

                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('app.booking.list') }}" >New Pending</a></li>
                    </ul>
                </li>
            @endif


            @if(auth('admin')->check())
                <li class="nav-item">
                    <a href="{{ route('app.setting.view') }}">
                        <i class="la la-cogs"></i>
                        <span class="menu-title">Settings</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</div>
