@extends('layouts.client.main')

@section('content')

    <div class="container-xxl py-5">

        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title bg-white text-center text-primary px-3">ติดต่อเรา</h5>
                    <h1 class="mb-5">ช่องทางติดต่อโรงเรียนบูรณวิทย์</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h5>เกี่ยวกับโรงเรียน</h5>
                        <p class="mb-3">รหัสโรงเรียน : 10100398
                            <p>ชื่อสถาบัน : โรงเรียนบูรณวิทย์</p>
                            <p>ประเภท : โรงเรียนสามัญ</p>
                            <p>ระดับชั้นที่เปิดสอน : ระดับชั้นประถมศึกษา ปีที่ 1 (ป.1) ถึงระดับชั้นมัธยมศึกษาปีที่ 3 (ม.3)</p>
                        <div class="d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                                <i class="fa fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="text-primary">ที่อยู่</h5>
                                <p class="mb-0">509/56 จรัญสนิทวงศ์ บางพลัด เขตบางพลัด กรุงเทพมหานคร 10700</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="text-primary">เบอร์โทรศัพท์</h5>
                                <p class="mb-0">02-4245422</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.843032385653!2d100.49783092490803!3d13.788334336607317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29bdd684ebad5%3A0x3f136894b0e43939!2z4LmC4Lij4LiH4LmA4Lij4Li14Lii4LiZ4Lia4Li54Lij4LiT4Lin4Li04LiX4Lii4LmM!5e0!3m2!1sth!2sth!4v1707290728312!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                    <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                        @livewire('client.contact')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
