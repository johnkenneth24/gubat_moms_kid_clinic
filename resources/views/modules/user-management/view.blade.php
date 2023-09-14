@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Users List')

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
    <div class="row">
        <div class="col-lg-12">
            <div class="card p-2">
                <h5 class="card-header text-uppercase">MY PERSONAL INFORMATION</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">First Name</label>
                                <input readonly type="text" class="form-control @error('firstname') is-invalid @enderror"
                                    placeholder="" name="firstname" value="{{ $user->firstname }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Middle Name</label>
                                <input readonly type="text" class="form-control @error('firstname') is-invalid @enderror"
                                    placeholder="" name="firstname" value="{{ $user->middlename ?? 'N/A' }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Last Name</label>
                                <input readonly type="text" class="form-control @error('firstname') is-invalid @enderror"
                                    placeholder="" name="firstname" value="{{ $user->lastname }}">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label class="form-label">Ext.</label>
                                <input readonly type="text" class="form-control @error('firstname') is-invalid @enderror"
                                    placeholder="" name="firstname" value="{{ $user->suffix ?? 'N/A' }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Gender</label>
                            <input readonly type="text" class="form-control @error('firstname') is-invalid @enderror"
                                placeholder="" name="firstname" value="{{ $user->gender }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Birthdate</label>
                            <input readonly type="date" class="form-control @error('firstname') is-invalid @enderror"
                                placeholder="" name="firstname" value="{{ $user->birthdate->format('Y-m-d')}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Contact Number</label>
                            <input readonly type="text" class="form-control @error('firstname') is-invalid @enderror"
                                placeholder="" name="firstname" value="{{ $user->contact_number }}">
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                      <div class="form-group">
                          <label class="form-label">Email</label>
                          <input readonly type="text" class="form-control @error('firstname') is-invalid @enderror"
                              placeholder="" name="firstname" value="{{ $user->email }}">
                      </div>
                  </div>
                    <div class="col-md-6 mt-2">
                      <div class="form-group">
                          <label class="form-label">Address</label>
                          <input readonly type="text" class="form-control @error('firstname') is-invalid @enderror"
                              placeholder="" name="firstname" value="{{ $user->address }}">
                      </div>
                  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
