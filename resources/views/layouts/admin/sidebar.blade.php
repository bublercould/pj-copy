<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('template/client-template/img/logo.png') }}">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2" style="font-size: 20px">โรงเรียนบูรณวิทย์</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        {{-- begin --}}
        @foreach (getMenu() as $menu)
            <li
                class="menu-item
                {{ isset($menu['submenu']) && in_array(Route::currentRouteName(), array_column($menu['submenu'], 'slug'))
                    ? 'active open'
                    : (Route::currentRouteName() == $menu['slug']
                        ? 'active'
                        : '') }}">
                @if (isset($menu['submenu']))
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="{{ $menu['icon'] }}"></i>
                        <div data-i18n="{{ $menu['name'] }}">{{ $menu['name'] }}
                        </div>
                    </a>
                @else
                    <a href="{{ route($menu['slug']) }}" class="menu-link">
                        <i class="{{ $menu['icon'] }}"></i>
                        <div data-i18n="{{ $menu['name'] }}">{{ $menu['name'] }}
                        </div>
                    </a>
                @endif
                @if (isset($menu['submenu']))
                    @foreach ($menu['submenu'] as $submenu)
                        <ul class="menu-sub">
                            <li
                                class="menu-item {{ Route::currentRouteName() == $submenu['slug'] ? 'active open' : '' }}">
                                <a href="{{ route($submenu['slug']) }}" class="menu-link">
                                    <div data-i18n="{{ $submenu['name'] }}">{{ $submenu['name'] }}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    @endforeach
                @endif
            </li>
        @endforeach
    </ul>
</aside>
<!-- / Menu -->
{{--
<!-- Dashboards -->
<li class="menu-item active open">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Dashboards">Dashboards</div>
        <div class="badge bg-danger rounded-pill ms-auto">5</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/dashboards-crm.html"
                target="_blank" class="menu-link">
                <div data-i18n="CRM">CRM</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
            </a>
        </li>
        <li class="menu-item active">
            <a href="index.html" class="menu-link">
                <div data-i18n="Analytics">Analytics</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-ecommerce-dashboard.html"
                target="_blank" class="menu-link">
                <div data-i18n="eCommerce">eCommerce</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-logistics-dashboard.html"
                target="_blank" class="menu-link">
                <div data-i18n="Logistics">Logistics</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-academy-dashboard.html"
                target="_blank" class="menu-link">
                <div data-i18n="Academy">Academy</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
            </a>
        </li>
    </ul>
</li>

<!-- Layouts -->
<li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Layouts">Layouts</div>
    </a>

    <ul class="menu-sub">
        <li class="menu-item">
            <a href="layouts-without-menu.html" class="menu-link">
                <div data-i18n="Without menu">Without menu</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="layouts-without-navbar.html" class="menu-link">
                <div data-i18n="Without navbar">Without navbar</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="layouts-container.html" class="menu-link">
                <div data-i18n="Container">Container</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="layouts-fluid.html" class="menu-link">
                <div data-i18n="Fluid">Fluid</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="layouts-blank.html" class="menu-link">
                <div data-i18n="Blank">Blank</div>
            </a>
        </li>
    </ul>
</li>

<!-- Front Pages -->
<li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-store"></i>
        <div data-i18n="Front Pages">Front Pages</div>
        <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/landing-page.html"
                class="menu-link" target="_blank">
                <div data-i18n="Landing">Landing</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/pricing-page.html"
                class="menu-link" target="_blank">
                <div data-i18n="Pricing">Pricing</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/payment-page.html"
                class="menu-link" target="_blank">
                <div data-i18n="Payment">Payment</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/checkout-page.html"
                class="menu-link" target="_blank">
                <div data-i18n="Checkout">Checkout</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/help-center-landing.html"
                class="menu-link" target="_blank">
                <div data-i18n="Help Center">Help Center</div>
            </a>
        </li>
    </ul>
</li>

<li class="menu-header small text-uppercase">
    <span class="menu-header-text">Apps &amp; Pages</span>
</li>
<!-- Apps -->
<li class="menu-item">
    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-email.html"
        target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-envelope"></i>
        <div data-i18n="Email">Email</div>
        <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
    </a>
</li>
<li class="menu-item">
    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-chat.html"
        target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-chat"></i>
        <div data-i18n="Chat">Chat</div>
        <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
    </a>
</li>
<li class="menu-item">
    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-calendar.html"
        target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-calendar"></i>
        <div data-i18n="Calendar">Calendar</div>
        <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
    </a>
</li>
<li class="menu-item">
    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-kanban.html"
        target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-grid"></i>
        <div data-i18n="Kanban">Kanban</div>
        <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
    </a>
</li>
<!-- Pages -->
<li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Account Settings">Account Settings</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item">
            <a href="pages-account-settings-account.html" class="menu-link">
                <div data-i18n="Account">Account</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="pages-account-settings-notifications.html" class="menu-link">
                <div data-i18n="Notifications">Notifications</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="pages-account-settings-connections.html" class="menu-link">
                <div data-i18n="Connections">Connections</div>
            </a>
        </li>
    </ul>
</li>
<li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
        <div data-i18n="Authentications">Authentications</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item">
            <a href="auth-login-basic.html" class="menu-link" target="_blank">
                <div data-i18n="Basic">Login</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="auth-register-basic.html" class="menu-link" target="_blank">
                <div data-i18n="Basic">Register</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                <div data-i18n="Basic">Forgot Password</div>
            </a>
        </li>
    </ul>
</li>
<li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cube-alt"></i>
        <div data-i18n="Misc">Misc</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item">
            <a href="pages-misc-error.html" class="menu-link">
                <div data-i18n="Error">Error</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="pages-misc-under-maintenance.html" class="menu-link">
                <div data-i18n="Under Maintenance">Under Maintenance</div>
            </a>
        </li>
    </ul>
</li>
<!-- Components -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
<!-- Cards -->
<li class="menu-item">
    <a href="cards-basic.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-collection"></i>
        <div data-i18n="Basic">Cards</div>
    </a>
</li>
<!-- User interface -->
<li class="menu-item">
    <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-box"></i>
        <div data-i18n="User interface">User interface</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item">
            <a href="ui-accordion.html" class="menu-link">
                <div data-i18n="Accordion">Accordion</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-alerts.html" class="menu-link">
                <div data-i18n="Alerts">Alerts</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-badges.html" class="menu-link">
                <div data-i18n="Badges">Badges</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-buttons.html" class="menu-link">
                <div data-i18n="Buttons">Buttons</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-carousel.html" class="menu-link">
                <div data-i18n="Carousel">Carousel</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-collapse.html" class="menu-link">
                <div data-i18n="Collapse">Collapse</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-dropdowns.html" class="menu-link">
                <div data-i18n="Dropdowns">Dropdowns</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-footer.html" class="menu-link">
                <div data-i18n="Footer">Footer</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-list-groups.html" class="menu-link">
                <div data-i18n="List Groups">List groups</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-modals.html" class="menu-link">
                <div data-i18n="Modals">Modals</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-navbar.html" class="menu-link">
                <div data-i18n="Navbar">Navbar</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-offcanvas.html" class="menu-link">
                <div data-i18n="Offcanvas">Offcanvas</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-pagination-breadcrumbs.html" class="menu-link">
                <div data-i18n="Pagination &amp; Breadcrumbs">Pagination &amp; Breadcrumbs</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-progress.html" class="menu-link">
                <div data-i18n="Progress">Progress</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-spinners.html" class="menu-link">
                <div data-i18n="Spinners">Spinners</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-tabs-pills.html" class="menu-link">
                <div data-i18n="Tabs &amp; Pills">Tabs &amp; Pills</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-toasts.html" class="menu-link">
                <div data-i18n="Toasts">Toasts</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-tooltips-popovers.html" class="menu-link">
                <div data-i18n="Tooltips & Popovers">Tooltips &amp; popovers</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="ui-typography.html" class="menu-link">
                <div data-i18n="Typography">Typography</div>
            </a>
        </li>
    </ul>
</li>

<!-- Extended components -->
<li class="menu-item">
    <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-copy"></i>
        <div data-i18n="Extended UI">Extended UI</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item">
            <a href="extended-ui-perfect-scrollbar.html" class="menu-link">
                <div data-i18n="Perfect Scrollbar">Perfect scrollbar</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="extended-ui-text-divider.html" class="menu-link">
                <div data-i18n="Text Divider">Text Divider</div>
            </a>
        </li>
    </ul>
</li>

<li class="menu-item">
    <a href="icons-boxicons.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-crown"></i>
        <div data-i18n="Boxicons">Boxicons</div>
    </a>
</li>

<!-- Forms & Tables -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
<!-- Forms -->
<li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-detail"></i>
        <div data-i18n="Form Elements">Form Elements</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item">
            <a href="forms-basic-inputs.html" class="menu-link">
                <div data-i18n="Basic Inputs">Basic Inputs</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="forms-input-groups.html" class="menu-link">
                <div data-i18n="Input groups">Input groups</div>
            </a>
        </li>
    </ul>
</li>
<li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-detail"></i>
        <div data-i18n="Form Layouts">Form Layouts</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item">
            <a href="form-layouts-vertical.html" class="menu-link">
                <div data-i18n="Vertical Form">Vertical Form</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="form-layouts-horizontal.html" class="menu-link">
                <div data-i18n="Horizontal Form">Horizontal Form</div>
            </a>
        </li>
    </ul>
</li>
<!-- Form Validation -->
<li class="menu-item">
    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/form-validation.html"
        target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-list-check"></i>
        <div data-i18n="Form Validation">Form Validation</div>
        <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
    </a>
</li>
<!-- Tables -->
<li class="menu-item">
    <a href="tables-basic.html" class="menu-link">
        <i class="menu-icon tf-icons bx bx-table"></i>
        <div data-i18n="Tables">Tables</div>
    </a>
</li>
<!-- Data Tables -->
<li class="menu-item">
    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/tables-datatables-basic.html"
        target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-grid"></i>
        <div data-i18n="Datatables">Datatables</div>
        <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
    </a>
</li>
<!-- Misc -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
<li class="menu-item">
    <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
        class="menu-link">
        <i class="menu-icon tf-icons bx bx-support"></i>
        <div data-i18n="Support">Support</div>
    </a>
</li>
<li class="menu-item">
    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/" target="_blank"
        class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Documentation">Documentation</div>
    </a>
</li> --}}
