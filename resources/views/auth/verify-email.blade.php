@extends('layouts/app/blankLayout')

@section('title', 'Login')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">

    <style>
        #particles-js {
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 99%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 50% 50%;
        }
    </style>
@endsection

@section('content')
    <div id="particles-js"></div>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="{{ url('/') }}" class="app-brand-link gap-2">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="" height="100">
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2 text-center">{{ config('variables.templateName') }}!</h4>
                    <br>
                    <br>
                    <h6 class="mb-4 text-center">Please check your email to verify your account!</h6>
                    <h6 class="text-center">Thank you!</h6>
                    <form action="{{ route('verification.send') }}" method="POST">
                      @csrf
                      <p class="text-center"><button type="submit" class="text-center btn btn-primary text-uppercase">Click Here To Request Another</button></p>
                    </form>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/particles.js-master/particles.js') }}"></script>
    <script src="{{ asset('assets/js/particles.js') }}"></script>
@endsection
