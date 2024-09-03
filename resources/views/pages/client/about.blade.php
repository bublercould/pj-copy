@extends('layouts.client.main')

@section('content')
    @include('components.service')

    <div class="container-xxl py-5">

        @include('components.about')

        @include('components.team')

        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title bg-white text-center text-primary px-3">เครื่องแบบ</h5>
                    <h1 class="mb-5">เครื่องแบบนักเรียนระดับชั้น เตรียมอนุบาล - มัธยมศึกษา</h1>
                </div>
                <img class="img-fluid me-3" src="{{ asset('template/client-template/img/uiform2.jpg')}}" alt="">
                <img class="img-fluid me-3" src="{{ asset('template/client-template/img/uiform1.jpg')}}" alt="">
            </div>
        </div>
    </div>
@endsection
