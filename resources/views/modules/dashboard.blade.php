@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Dashboard')

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
    @if (!auth()->user()->age && !auth()->user()->birthdate && !auth()->user()->contact_number && !auth()->user()->address)
        <div class="alert alert-danger fw-bold" role="alert">
            Please complete your personal information before booking an appointment. <a
                href="{{ route('user-management.view', auth()->user()->id) }}">Click here.</a>
        </div>
    @endif

    @unlessrole('patient')
        <div class="row">
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-user-circle"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $totalPatientCount }}</h4>
                        </div>
                        <p class="mb-1">TOTAL PATIENT</p>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-clinic"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $total_cons }}</h4>
                        </div>
                        <p class="mb-1">TOTAL CONSULTATION</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="card card-border-shadow-danger h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-danger"><i
                                        class="bx bx-git-repo-forked"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $total_baby }}</h4>
                        </div>
                        <p class="mb-1">TOTAL BABY CHECKUP</p>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="card card-border-shadow-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-info"><i class="bx bxs-band-aid"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $total_vacs }}</h4>
                        </div>
                        <p class="mb-1">TOTAL VACCINATION</p>

                    </div>
                </div>
            </div>
        </div>
    @endunlessrole
    @role('patient')
        <div class="row">
            <div class="col-md-12 h-80 mb-4">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Welcome {{ auth()->user()->firstname }}! 🎉</h5>
                                <p class="mb-4">Check you health status now for better living!</p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="140"
                                    alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole
    <div class="row">
        @role('patient')
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Appointment Today</h5>
                        <div class="">
                            <p>You have <strong>{{ $app_user_today }}</strong> appointment today.</p>
                        </div>
                        <a href="{{ route('app-stat.index') }}" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        @endrole
        @unlessrole('patient')
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Appointment Checkup</h5>
                        <div class="">
                            <p>You have <strong>{{ $appointment_today }}</strong> appointment today.</p>
                        </div>
                        <a href="{{ route('app-checkup.index') }}" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Appointment Request</h5>
                        <div class="">
                            <p>You have <strong>{{ $app_pending }}</strong> appointment today.</p>
                        </div>
                        <a href="{{ route('app-request.index') }}" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        @endunlessrole

    </div>
@endsection
