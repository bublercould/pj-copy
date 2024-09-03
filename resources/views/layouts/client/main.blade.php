<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title>โรงเรียนบูรณวิทย์</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('layouts.client.styles')
    @livewireStyles()

</head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <!-- Spinner End -->
        @include('layouts.client.navbar')
        @include('layouts.client.carousel')

        {{-- Content --}}
        @yield('content')

        {{-- Script Footer --}}
        @include('layouts.client.footer')
        @include('layouts.client.scripts')

        {{-- Livewire --}}
        @livewireScripts()
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />

    </body>

</html>
