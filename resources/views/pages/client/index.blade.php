@extends('layouts.client.main')

@section('content')

    @include('components.service')

    <div class="container-xxl py-5">

        @include('components.about')

        @include('components.categories')

        @include('components.team')

    </div>

@endsection
