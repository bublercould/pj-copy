<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('template/admin-template/assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    @include('layouts.admin.styles')

    @livewireStyles

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.admin.sidebar')

            <!-- Layout container -->
            <div class="layout-page">

                @include('layouts.admin.navbar')


                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <div class="container mt-0 mb-1">

                        {{-- breadcrumb will depend on slug --}}
                        @include('layouts.admin.breadcrumb')

                        <!-- Content -->
                        @yield('content')

                    </div>

                    <div class="content-backdrop fade"></div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="#" target="_blank" class="footer-link fw-medium"> PSC IT
                                </a>
                                {{-- ThemeSelection https://themeselection.com --}}
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->
                </div>

                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    @include('layouts.admin.scripts')

</body>

</html>
