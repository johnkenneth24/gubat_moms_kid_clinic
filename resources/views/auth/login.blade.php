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
                    <h4 class="mb-2 text-center">Welcome to {{ config('variables.templateName') }}!</h4>
                    <p class="mb-4 text-center">Please sign-in to your account</p>

                    <form action="{{ route('auth.verify') }}" method="POST" id="formAuthentication" class="mb-3">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email" autofocus>
                        </div>
                        {{-- 3 error --}}
                        @error('email')
                            <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class=" form-group mt-3 mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>New on our platform?</span>
                        <a href="{{ route('signup') }}">
                            <span>Create an account</span>
                        </a>
                    </p>
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
