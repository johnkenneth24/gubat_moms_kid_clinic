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
            height: 155px;
        }

        #app_check .card-header{
          height: 80px;
          display: flex;
          align-items: center;
        }

        #app_check .card-patient p {
            margin-bottom: 2px;
            font-weight: 500;
            color: #1f1f1f;
        }

        #app_check .card-patient span {
            color: #1b43d5;
            text-transform: uppercase;
        }

        #app_check .card-app .card-body{
            height: 420px;
            overflow-y: scroll;
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
                {{-- <span>Wait for the pediatrician for consultation.</span> --}}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
    <div class="row" id="app_check">
        <div class="col-lg-6">
            <div class="card p-2 card-app">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title p-0 mb-0 d-flex align-item-center">
                        <h5 class="card-header p-0 text-uppercase">PATIENT ONLINE</h5>
                    </div>
                    <div class="card-tool">
                      <form action="{{ route('patient-record.index') }}" method="get" class="d-flex">
                        @csrf
                        <div class="form-group">
                            <input class="form-control form-control-sm d-sm-none d-md-block me-2" type="search"
                                placeholder="Search..." name="search" style="width: 150px;">
                        </div>
                      <button type="submit" class="btn btn-sm btn-primary">SEARCH</button>
                    </form>
                    </div>
                </div>
                <div class="card-body">
                    @forelse ($patient_online as $patient_on)
                        <div class="card-patient mb-2">
                            <div class="">
                                <p>NAME: <span>{{ $patient_on->full_name }}</span></p>
                                <p class="">BIRTHDATE: <span>{{ $patient_on->birthdate->format('F d, Y') }}</span> GENDER:<span> {{ $patient_on->gender }}</span></p>
                                <div class="d-flex">
                                    <p>ADDRESS: <span>{{ $patient_on->address }}</span></p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <p>CONTACT: <span>{{ $patient_on->contact_number }}</span></p>
                            </div>
                            <div class="d-flex mt-2">
                                @role('pediatrician')
                                <a href="{{ route('patient-record.view_book_consult', $patient_on->id) }}" class="btn btn-sm btn-primary">MEDICAL HISTORY</a>
                                @endrole
                            </div>
                        </div>
                    @empty
                        <div class=" d-flex align-items-center justify-content-center"
                            style="height: 111.172px;">
                            <p class="">NO RECORD TO SHOW!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-lg-6">
          <div class="card p-2 card-app">
              <div class="card-header d-flex align-items-center justify-content-between">
                  <div class="card-title p-0 mb-0 d-flex align-item-center">
                      <h5 class="card-header p-0 text-uppercase">PATIENT WALKIN</h5>
                  </div>
                  <div class="card-tool">
                    <form action="{{ route('patient-record.index') }}" method="get" class="d-flex">
                      @csrf
                      <div class="form-group">
                          <input class="form-control form-control-sm d-sm-none d-md-block me-2" type="search"
                              placeholder="Search..." name="search" style="width: 150px;">
                      </div>
                    <button type="submit" class="btn btn-sm btn-primary">SEARCH</button>
                  </form>
                  </div>
              </div>
              <div class="card-body">
                  @forelse ($patient_walkin as $patient_walk)
                  <div class="card-patient mb-2">
                    <div class="">
                        <p>NAME: <span>{{ $patient_walk->full_name }}</span></p>
                        <p class="">BIRTHDATE: <span>{{ $patient_walk->birthdate->format('F d, Y')}}</span> GENDER:<span> {{ $patient_walk->gender }}</span></p>
                        <div class="d-flex">
                            <p>ADDRESS: <span>{{ $patient_walk->address}}</span></p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <p>CONTACT: <span>{{ $patient_walk->contact}}</span></p>
                    </div>
                    <div class="d-flex mt-2">
                        @role('pediatrician')
                        <a href="{{ route('patient-record.view_consult', $patient_walk->id) }}" class="btn btn-sm btn-primary">MEDICAL HISTORY</a>
                        @endrole
                    </div>
                </div>
                  @empty
                      <div class=" d-flex align-items-center justify-content-center"
                          style="height: 111.172px;">
                          <p class="">NO APPOINTMENT TO SHOW!</p>
                      </div>
                  @endforelse
              </div>
          </div>
      </div>
    </div>
@endsection
