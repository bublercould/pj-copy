    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title bg-white text-center text-primary px-3">แนะนำบุคลากร</h5>
                <h1 class="mb-5">บุคลากรหลัก</h1>
            </div>
            <div class="row g-4">

                @foreach ($staff as $i)

                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item bg-light">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset($i->image) }}" alt="{{ $i->position }}">
                            </div>
                            <div class="text-center p-4">
                                <h5 class="mb-0">
                                    {{ $i->position }}
                                </h5>
                                <small>
                                    {{ $i->name }}
                                </small>
                            </div>
                        </div>
                    </div>

                @endforeach

                {{-- <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('template/client-template/img/team-1.jpg') }}"
                                alt="team-1">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">
                                {{ $i->position }}
                            </h5>
                            <small>
                                {{ $i->name }}
                            </small>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('template/client-template/img/team-2.jpg') }}"
                                alt="team-2">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">รองผู้อำนวยการ</h5>
                            <small>ชื่อ-นามสกุล</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('template/client-template/img/team-3.jpg') }}"
                                alt="team-3">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">ผู้จัดการโรงเรียน</h5>
                            <small>ชื่อ-นามสกุล</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('template/client-template/img/team-4.jpg') }}"
                                alt="team-4">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">เลขานุการ</h5>
                            <small>ชื่อ-นามสกุล</small>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
    <!-- Team End -->
