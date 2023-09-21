@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Appointment Checkup')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
    <style>
        .card-patient {
            border: solid 1px;
            padding: 8px;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .card-patient p {
            margin-bottom: 2px;
            font-weight: 500;
            color: #1f1f1f;
        }

        .card-patient span {
            color: #1b43d5;
        }
    </style>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-primary d-flex alert-dismissible" role="alert">
            <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
                    class='bx bx-user-check'></i></span>
            <div class="d-flex flex-column ps-1">
                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">{{ session('success') }}</h6>
                <span>Wait for the pediatrician for consultation.</span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-6">
            <div class="card p-2">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title p-0 mb-0 d-flex align-item-center">
                        <h5 class="card-header p-0 text-uppercase">Appointment Checkup</h5>
                    </div>
                    <div class="card-tool">
                        {{-- @role('staff')
          <a href="{{ route('walkin-appointment.create') }}" class="btn btn-primary" style="color: #ffff;">ADD WALK-IN</a>
          @endrole --}}
                    </div>
                </div>
                <div class="card-body">
                    @forelse ($book_appointment as $book_app)
                        <div class="card-patient mb-2">
                            <div class="">
                                <p>NAME: <span>{{ $book_app->user->full_name }}</span></p>
                                <div class="d-flex">
                                    <p>CATEGORY: <span>{{ $book_app->category }}</span></p>
                                    <p class="ms-2">STATUS: <span class="text-uppercase">{{ $book_app->status }}</span></p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <p>DATE: <span>{{ $book_app->date_appointment->format('F d, Y') }}</span></p>
                                <p class="ms-2">TIME: <span>{{ date('h:i A', strtotime($book_app->time)) }}</span></p>
                            </div>
                            <div class="d-flex mt-2">
                                <a href="" class="btn btn-sm btn-success">VIEW</a>
                                <a href="" class="btn btn-sm btn-primary mx-1">UPDATE</a>
                                <a href="" class="btn btn-sm btn-info">CONSULT</a>
                            </div>
                        </div>
                    @empty
                        <div class="card-patient d-flex align-items-center justify-content-center"
                            style="height: 111.172px;">
                            <p class="">NO APPOINTMENT TO SHOW!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-lg-6">
          <div class="card p-2">
              <div class="card-header pt-2 d-flex align-items-center justify-content-between">
                  <div class="card-title p-0 mb-0 d-flex align-item-center">
                      <h5 class="card-header p-0 text-uppercase">WALKIN Appointment</h5>
                  </div>
                  <div class="card-tool">
                      @role('staff')
        <a href="{{ route('walkin-appointment.create') }}" class="btn btn-primary" style="color: #ffff;">ADD WALK-IN</a>
        @endrole
                  </div>
              </div>
              <div class="card-body">
                  @forelse ($walkinapp as $walkin)
                      <div class="card-patient mb-2">
                          <div class="">
                              <p>NAME: <span>{{ $walkin->walkInPatient->full_name }}</span></p>
                              <div class="d-flex">
                                  <p>CATEGORY: <span>{{ $walkin->category }}</span></p>
                                  <p class="ms-2">STATUS: <span class="text-uppercase">{{ $walkin->status }}</span></p>
                              </div>
                          </div>
                          <div class="d-flex">
                              <p>DATE: <span>{{ $walkin->date_consultation->format('F d, Y') }}</span></p>
                              <p class="ms-2">TIME: <span>{{ date('h:i A', strtotime($walkin->time_consultation)) }}</span></p>
                          </div>
                          <div class="d-flex mt-2">
                              <a href="{{ route('walkin-appointment.view' , $walkin->id) }}" class="btn btn-sm btn-success">VIEW</a>
                              <a href="{{ route('walkin-appointment.edit', $walkin->id) }}" class="btn btn-sm btn-primary mx-1">UPDATE</a>
                              <a href="{{ route('walkin-appointment.consult', $walkin->id) }}" class="btn btn-sm btn-info">CONSULT</a>
                          </div>
                      </div>
                  @empty
                      <div class="card-patient d-flex align-items-center justify-content-center"
                          style="height: 111.172px;">
                          <p class="">NO APPOINTMENT TO SHOW!</p>
                      </div>
                  @endforelse
              </div>
          </div>
      </div>
    </div>
@endsection
