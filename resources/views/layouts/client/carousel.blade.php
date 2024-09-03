@if (Route::is('client.home'))
    <!-- Home Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('template/client-template/img/background_1.jpg') }}"
                    alt="backgroud_1">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h4>
                                    <font style="color:#9CE9FF">Buranawit School</font>
                                </h4>
                                <h2 class="display-4 text-white ">ยินดีต้อนรับสู่โรงเรียนบูรณวิทย์</h2>
                                <p class="fs-5 text-white mb-4 pb-3">เปิดสอนตั้งแต่ ระดับชั้นเตรียมอนุบาล/อนุบาล 1-3
                                    /ประถม 1-6/มัธยม 1-3 รูปแบบห้องเรียน (ห้องปรับอากาศ - ห้องเรียนปกติ) </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('template/client-template/img/background_2.jpg') }}"
                    alt="background_2">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h4>
                                    <font style="color:#9CE9FF">Buranawit School</font>
                                </h4>
                                <h2 class="display-4 text-white animated slideInDown">ยินดีต้อนรับสู่โรงเรียนบูรณวิทย์
                                </h2>
                                <p class="fs-5 text-white mb-4 pb-3">เปิดสอนตั้งแต่ ระดับชั้นเตรียมอนุบาล/อนุบาล 1-3
                                    /ประถม 1-6/มัธยม 1-3 รูปแบบห้องเรียน (ห้องปรับอากาศ - ห้องเรียนปกติ)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home Carousel End -->
@endif

@php

    $routeDetails = [
        ['title' => 'เกี่ยวกับเรา', 'routeName' => 'about'],
        ['title' => 'กิจกรรม', 'routeName' => 'activity'],
        ['title' => 'ช่องทางการติดต่อ', 'routeName' => 'contact'],
    ];
@endphp

@foreach ($routeDetails as $route)
    @if (Route::is('client.' . $route['routeName']))
        <div class="container-fluid bg-primary py-5 mb-5 page-header">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="display-3 text-white animated slideInDown">{{ $route['title'] }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item">
                                    <a class="text-white" href="{{ route('client.home') }}">หน้าหลัก</a>
                                </li>
                                <li class="breadcrumb-item text-white active" aria-current="page">{{ $route['title'] }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach
