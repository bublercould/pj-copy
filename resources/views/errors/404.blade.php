@extends('layouts.client.main')

@section('content')

    <div class="container-xxl py-5">
        <div class="d-flex align-items-center justify-content-center">
            <div class="text-center">
                <h1 class="display-1 fw-bold">404</h1>
                <p class="fs-3"> <span class="text-danger">ผิดพลาด!</span>
                    ไม่พบหน้าที่ท่านหา.
                </p>
                <p class="lead">
                    หน้าที่ท่านหาถูกลบ หรือ ไม่มีอยู่.
                </p>
                <a
                    href="{{ route('client.home') }}"
                    class="btn btn-primary"
                >
                    ย้อนกลับ
                </a>
            </div>
        </div>
    </div>

@endsection
