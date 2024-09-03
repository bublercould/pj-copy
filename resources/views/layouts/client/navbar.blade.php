<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('client.home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h3 class="m-0 text-primary"><img class="img-fluid me-3" src="{{ asset('template/client-template/img/logo.png') }}"
                alt=""></i>โรงเรียนบูรณวิทย์</h3>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0 ">
            <a href="{{ route('client.home') }}"
                class="nav-item nav-link  {{ Route::is('client.home') ? 'active' : '' }}">
                หน้าหลัก
            </a>
            <a href="{{ route('client.about') }}"
                class="nav-item nav-link {{ Route::is('client.about') ? 'active' : '' }}">เกี่ยวกับเรา</a>
            <a href="{{ route('client.activity') }}" 
                class="nav-item nav-link {{ Route::is('client.activity') ? 'active' : '' }}">กิจกรรม</a>
            <a href="{{ route('client.contact') }}"
                class="nav-item nav-link {{ Route::is('client.contact') ? 'active' : '' }}">ช่องทางติดต่อ</a>
        </div>
    </div>
</nav>
<!-- Navbar End -->
