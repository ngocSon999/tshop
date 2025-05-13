<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
    <div class="position-sticky">
        <h4 class="text-center text-white py-3">{{ __('translation.menu.dashboard') }}</h4>
        <ul class="nav flex-column">
            <li class="nav-item has-submenu">
                <a class="nav-link" href="#userMenu" data-bs-toggle="collapse" aria-expanded="false">
                    <i class="bi bi-people"></i>{{ __('translation.menu.account') }}
                </a>
                <ul class="collapse submenu" id="userMenu">
                    <li><a class="nav-link" href="{{ route('admin.user.index') }}"><i class="bi bi bi-card-list"></i>{{ __('translation.menu.list') }}</a></li>
                    <li><a class="nav-link" href="{{ route('admin.user.create') }}"><i class="bi bi bi-plus-square"></i>{{ __('translation.menu.add') }}</a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link" href="#categoryMenu" data-bs-toggle="collapse" aria-expanded="false">
                    <i class="bi bi-list"></i>{{ __('translation.menu.category') }}
                </a>
                <ul class="collapse submenu" id="categoryMenu">
                    <li><a class="nav-link" href="{{ route('admin.category.index') }}"><i class="bi bi bi-card-list"></i>{{ __('translation.menu.list') }}</a></li>
                    <li><a class="nav-link" href="{{ route('admin.category.create') }}"><i class="bi bi bi-plus-square"></i>{{ __('translation.menu.add') }}</a></li>
                </ul>
            </li>

            <li class="nav-item has-submenu">
                <a class="nav-link" href="#productMenu" data-bs-toggle="collapse" aria-expanded="false">
                    <i class="bi bi-pie-chart"></i>{{ __('translation.menu.product') }}
                </a>
                <ul class="collapse submenu" id="productMenu">
                    <li><a class="nav-link" href="{{ route('admin.product.index') }}"><i class="bi bi bi-card-list"></i>{{ __('translation.menu.list') }}</a></li>
                    <li><a class="nav-link" href="{{ route('admin.product.create') }}"><i class="bi bi bi-plus-square"></i>{{ __('translation.menu.add') }}</a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link" href="#sliderMenu" data-bs-toggle="collapse" aria-expanded="false">
                    <i class="bi bi-pie-chart"></i>{{ __('translation.menu.slider') }}
                </a>
                <ul class="collapse submenu" id="sliderMenu">
                    <li><a class="nav-link" href="{{ route('admin.slider.index') }}"><i class="bi bi bi-card-list"></i>{{ __('translation.menu.list') }}</a></li>
                    <li><a class="nav-link" href="{{ route('admin.slider.create') }}"><i class="bi bi bi-plus-square"></i>{{ __('translation.menu.add') }}</a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link" href="#contactMenu" data-bs-toggle="collapse" aria-expanded="false">
                    <i class="bi bi-phone"></i>{{ __('translation.menu.contact') }}
                </a>
                <ul class="collapse submenu" id="contactMenu">
                    <li><a class="nav-link" href="{{ route('admin.contact.index') }}">{{ __('translation.menu.contact') }}</a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link" href="#settingMenu" data-bs-toggle="collapse" aria-expanded="false">
                    <i class="bi bi-gear"></i>{{ __('translation.menu.setting') }}
                </a>
                <ul class="collapse submenu" id="settingMenu">
                    <li><a class="nav-link" href="{{ route('admin.about.index') }}"><i class="bi bi bi-building"></i>{{ __('translation.menu.about') }}</a></li>
                    <li><a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="bi bi bi-building"></i>{{ __('translation.menu.setting') }}</a></li>
                </ul>
            </li>

            <li class="nav-item has-submenu">
                <a class="nav-link" href="#thongkeSubmenu" data-bs-toggle="collapse" aria-expanded="false">
                    <i class="bi bi-graph-up"></i>Thống kê
                </a>
                <ul class="collapse submenu" id="thongkeSubmenu">
                    <li><a class="nav-link" href="#"><i class="bi bi-bar-chart-line"></i> Thống kê doanh thu</a></li>
                    <li><a class="nav-link" href="#"><i class="bi bi-pie-chart"></i> Thống kê sản phẩm</a></li>
                    <li><a class="nav-link" href="#"><i class="bi bi-calendar-date"></i> Thống kê theo ngày</a></li>
                </ul>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link" href="{{ route('admin.logout') }}">
                    <i class="bi bi-chat-left-quote"></i>{{ __('translation.menu.logout') }}
                </a>
            </li>
        </ul>
    </div>
</nav>
