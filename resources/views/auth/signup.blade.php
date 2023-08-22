@extends('layouts/app/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">

    <style>
      #particles-js {
        position: absolute;
        z-index: -1;
        width: 100%;
        height: 100px;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 50% 50%;
    }

</style>
@endsection


@section('content')
<div id="particles-js"></div>
<div class="container-xxl"  style="position: absolute; top: 0px;">
    <div class="authentication-wrapper authentication-basic ">
        <!-- Register Card -->
        <div class="card col-md-8">
            <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                    <a href="{{url('/')}}" class="app-brand-link gap-2">
                        <h4 class="mb-1"><img src="{{ asset('assets/img/logo.png') }}" height="50" alt=""> Gubat Mom's & Kids Clinic - Sign Up</h4>
                    </a>
                </div>
                <!-- /Logo -->
                <p class="mb-4 text-center">Fill up the form correctly to sign-up!</p>

                <form id="formAuthentication" class="mb-3" action="{{url('/')}}" method="GET">
                    <div class="mb-3 row">
                        <div class="form-group col-md-3">
                            <label for="username" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Juan" autofocus>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="username" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Dela" autofocus>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="username" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Cruz" autofocus>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="username" class="form-label">Suffix</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Jr." autofocus>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="form-group col-md-4">
                            <label for="username" class="form-label">Gender</label>
                            <select name="" class="form-control" id="">
                                <option value="">Please Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="username" class="form-label">Birthdate</label>
                            <input type="date" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="username" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="+639123456789" autofocus>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="form-group col-md-5">
                            <label for="username" class="form-label">Email Address</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="juandelacruz@email.com" autofocus>
                        </div>
                        <div class="form-group col-md-7">
                            <label for="username" class="form-label">Address</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Home Address" autofocus>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="form-group col-md-6">
                            <label for="username" class="form-label">Password</label>
                            <input type="password" class="form-control" id="username" name="username" placeholder="" autofocus>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="username" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="username" name="username" placeholder="" autofocus>
                        </div>
                    </div>

                    {{-- <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                    <label class="form-check-label" for="terms-conditions">
                        I agree to
                        <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                </div>
            </div> --}}
                    <button class="btn btn-primary d-grid w-100">
                        Sign up
                    </button>
                </form>

                <p class="text-center">
                    <span>Already have an account?</span>
                    <a href="{{route('login')}}">
                        <span>Sign in instead</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <!-- Register Card -->
    @endsection
    @section('page-script')
    <script src="{{ asset('assets/js/particles.js-master/particles.js') }}"></script>
    <script src="{{ asset('assets/js/particles.js') }}"></script>
    @endsection
