@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Users Management')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
<form action="{{ route('user-management.update', $user->id) }}" method="POST">
@csrf
@method('PUT')
<x-success></x-success>
<div class="row">
    <div class="col-lg-12">
        <div class="card p-2">
            <h5 class="card-header text-uppercase">MY PERSONAL INFORMATION</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                placeholder="" name="" value="{{ $user->firstname }}">
                                @error('firstname')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control @error('middlename') is-invalid @enderror"
                                placeholder="" name="middlename" value="{{ $user->middlename }}">
                                @error('middlename')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                placeholder="" name="" value="{{ $user->lastname }}">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label class="form-label">Ext.</label>
                            <input type="text" class="form-control @error('suffix') is-invalid @enderror"
                                placeholder="" name="suffix" value="{{ $user->suffix }}">
                                @error('suffix')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Mother Name</label>
                            <input type="text" class="form-control @error('mother_name') is-invalid @enderror"
                                placeholder="" name="mother_name" value="{{ $user->mother_name }}">
                                @error('mother_name')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Father Name</label>
                            <input type="text" class="form-control @error('father_name') is-invalid @enderror"
                                placeholder="" name="father_name" value="{{ $user->father_name }}">
                                @error('father_name')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-control  @error('gender') is-invalid @enderror"
                                id="">
                                <option value="">Please Select</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender }}" @selected($user->gender == $gender)>
                                        {{ $gender }}</option>
                                @endforeach
                            </select>
                            @error('gender')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Birthdate</label>
                            <input type="date" class="birthdate form-control @error('birthdate') is-invalid @enderror"
                                placeholder="" onchange="calculateAge()" name="birthdate" value="{{ optional($user->birthdate)->format('Y-m-d') }}">
                                @error('birthdate')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label">Age</label>
                            <input type="text" class="age form-control @error('age') is-invalid @enderror" placeholder="" readonly
                                name="age" value="{{ $user->age }}">
                                @error('age')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control @error('contact_number') is-invalid @enderror"
                                placeholder="" name="contact_number" value="{{ $user->contact_number }}">
                                @error('contact_number')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" readonly
                                placeholder="" name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                placeholder="" name="address" value="{{ $user->address }}">
                                @error('address')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer justify-content-end d-flex">
              <button type="submit" class="btn btn-primary float-right">UPDATE PERSONAL INFORMATION</button>
            </div>
        </div>
    </div>
</div>

</form>
<form method="POST" action="{{ route('user-management.change-password', auth()->user()->id ) }}">
  @csrf
    <div class="row mt-3">
      <div class="col-lg-12">
          <div class="card p-2">
              <h5 class="card-header text-uppercase">CHANGE PASSWORD</h5>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Old Password</label>
                        <input type="password" name="oldPassword" class="form-control @error('oldPassword') is-invalid @enderror">
                        @error('oldPassword')
                                      <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                          {{ $message }}
                                      </div>
                                  @enderror
                      </div>
                  </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">New Password</label>
                        <input type="password" name="newPassword" class="form-control @error('newPassword') is-invalid @enderror">
                        @error('newPassword')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                      </div>
                  </div>
              </div>
          </div>
          <div class="card-footer justify-content-end d-flex">
            <button type="submit" class="btn btn-primary float-right">CHANGE PASSWORD</button>
          </div>
      </div>
    </div>
  </form>
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
