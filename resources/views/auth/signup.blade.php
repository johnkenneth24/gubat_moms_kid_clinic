@extends('layouts/app/blankLayout')

@section('title', 'Register')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">

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
    <div class="container-xxl" style="position: absolute; top: 0px;">
        <div class="authentication-wrapper authentication-basic ">
            <!-- Register Card -->
            <div class="card col-md-8">
                <div class="card-body pt-2 pb-2">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="{{ url('/') }}" class="app-brand-link gap-2">
                            <h4 class="mb-1"><img src="{{ asset('assets/img/logo.png') }}" height="50" alt="">
                                Gubat Mom's & Kids Clinic - Sign Up</h4>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <p class="mb-4 text-center">Fill up the form correctly based on patient information to sign-up <span class="text-danger">*</span></p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <div class="form-group col-md-3">
                                <label class="form-label">First Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                    value="{{ old('firstname') }}" id="firstname" name="firstname" placeholder="Juan"
                                    required autofocus>
                                @error('firstname')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">Middle Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('middlename') is-invalid @enderror"
                                    value="{{ old('middlename') }}" id="middlename" name="middlename" placeholder="Dela">
                                @error('middlename')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">Last Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                    value="{{ old('lastname') }}" id="lastname" name="lastname" placeholder="Cruz"
                                    required>
                                @error('lastname')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">Suffix</label>
                                <input type="text" class="form-control @error('suffix') is-invalid @enderror"
                                    value="{{ old('suffix') }}" id="suffix" name="suffix" placeholder="Jr.">
                                @error('suffix')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                          <div class="form-group col-md-6">
                            <label class="form-label">MOTHER'S NAME</label>
                            <input type="text" class="form-control @error('mother_name') is-invalid @enderror"
                                required value="{{ old('mother_name') }}" id="mother_name" name="mother_name"
                                placeholder="Mother's Name">
                            @error('mother_name')
                                <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label class="form-label">FATHER'S NAME</label>
                          <input type="text" class="form-control @error('father_name') is-invalid @enderror"
                              required value="{{ old('father_name') }}" id="father_name" name="father_name"
                              placeholder="Father's Name">
                          @error('father_name')
                              <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="form-group col-md-3">
                                <label class="form-label">Gender<span class="text-danger">*</span></label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror" required
                                    id="">
                                    <option value="">Please Select</option>
                                    <option value="Male" @selected(old('gender') == 'Male')>Male</option>
                                    <option value="Female" @selected(old('gender') == 'Female')>Female</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">Birthdate<span class="text-danger">*</span></label>
                                <input onchange="calculateAge()" type="date" class="birthdate form-control @error('b_date') is-invalid @enderror" required
                                    value="{{ old('b_date') }}" id="birthdate" name="b_date"
                                    placeholder="Enter your b_date" >
                                @error('b_date')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                              <label class="form-label">Age<span class="text-danger">*</span></label>
                              <input type="number" class="age form-control @error('age') is-invalid @enderror"
                                  required value="{{ old('age') }}" id="age" name="age"
                                  placeholder="">
                              @error('age')
                                  <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Contact Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('contact_no') is-invalid @enderror"
                                    required value="{{ old('contact_no') }}" id="contact_no" name="contact_no"
                                    placeholder="+639123456789">
                                @error('contact_no')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="form-group col-md-5">
                                <label class="form-label">Email Address<span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" required
                                    value="{{ old('email') }}" id="email" name="email"
                                    placeholder="juandelacruz@email.com">
                                @error('email')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-7">
                                <label class="form-label">Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" required
                                    value="{{ old('address') }}" id="address" name="address"
                                    placeholder="Home Address">
                                @error('address')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Password<span class="text-danger">*</span></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    required value="{{ old('password') }}" id="password" name="password"
                                    placeholder="" autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Confirm Password</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" required
                                    value="{{ old('password_confirmation') }}" id="password_confirmation"
                                    name="password_confirmation" placeholder="" autocomplete="new-password">
                                @error('password_confirmation')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
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
                        <button class="btn btn-primary d-grid w-100" type="submit">
                            Sign up
                        </button>
                    </form>

                    <p class="text-center">
                        <span>Already have an account?</span>
                        <a href="{{ route('login') }}">
                            <span>Sign in instead</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <!-- Register Card -->
    @endsection
    @push('page-script')
        <script src="{{ asset('assets/js/particles.js-master/particles.js') }}"></script>
        <script src="{{ asset('assets/js/particles.js') }}"></script>

        <script>
          function calculateAge() {
              var bdateValue = document.querySelector('.birthdate').value;
              var bdate = new Date(bdateValue);
              var today = new Date();
              var age = today.getFullYear() - bdate.getFullYear();
              var monthDiff = today.getMonth() - bdate.getMonth();

              if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < bdate.getDate())) {
                  age--;
              }

              document.querySelector('.age').value = age;
          }
      </script>
    @endpush
