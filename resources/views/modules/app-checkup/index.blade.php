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
            height: 130px;
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
                <span>Wait for the pediatrician for consultation.</span>
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
                                <p class="ms-2">TIME: <span>{{ date('h:i A', strtotime($book_app->time_appointment)) }}</span></p>
                            </div>
                            <div class="d-flex mt-2">
                              @role('staff')
                                <a href="{{ route('app-checkup.view', $book_app->id) }}" class="btn btn-sm btn-success">VIEW</a>
                                @if(!$book_app->bookAppConsult)
                                <button type="button" class="btn btn-primary btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#preconsult{{ $book_app->id }}">
                                  PRE CONSULT
                                </button>
                                <a href="{{ route('app-checkup.noshow', $book_app->id) }}" class="btn btn-sm btn-danger">DID NOT ATTEND</a>
                                @endrole
                                @endif
                                @role('pediatrician')
                                <a href="{{ route('app-checkup.book-view-med', $book_app->id) }}" class="btn btn-sm btn-primary mx-1">MEDICAL HISTORY</a>
                                @if($book_app->bookAppConsult)
                                <a href="{{ route('app-checkup.consult' , $book_app->id) }}" class="btn btn-sm btn-info">CONSULT</a>
                                @endif
                                @endrole
                            </div>
                        </div>

                        <div class="modal fade" id="preconsult{{ $book_app->id }}" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h6 class="modal-title text-uppercase" id="exampleModalLabel">PRE CONSULT | {{ $book_app->user->full_name }}</h6>
                                  </button>
                              </div>
                              <form action="{{ route('app-checkup.pre-consult', [$book_app] ) }}" method="post">
                                @csrf
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="" class="form-label">WEIGHT (KG)</label>
                                    <input step="0.01" type="number" name="weight" value="{{ old('weight') }}" class="form-control">
                                    @error('weight')
                                          <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                              {{ $message }}
                                          </div>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="" class="form-label">HEIGHT (CM)</label>
                                    <input step="0.01" type="number"  name="height" value="{{ old('height') }}" class="form-control">
                                    @error('height')
                                          <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                              {{ $message }}
                                          </div>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="" class="form-label">BLOOD PRESSURE</label>
                                    <input type="text" placeholder="0/0" name="blood_pressure"  pattern="^\d+\/\d+$" value="{{ old('blood_pressure') }}" class="form-control">
                                    @error('blood_pressure')
                                          <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                              {{ $message }}
                                          </div>
                                      @enderror
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                                  <button type="submit" class="btn btn-primary">SUBMIT</button>
                                </div>
                              </form>
                            </div>
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
        <div class="col-lg-6">
          <div class="card p-2 card-app">
              <div class="card-header d-flex align-items-center justify-content-between">
                  <div class="card-title p-0 mb-0 d-flex align-item-center">
                      <h5 class="card-header p-0 text-uppercase">WALKIN Appointment</h5>
                  </div>
                  <div class="card-tool">
                      @role('staff')
        <a href="{{ route('walkin-appointment.create') }}" class="btn btn-primary btn-sm" style="color: #ffff;">ADD WALK-IN</a>
        @endrole
                  </div>
              </div>
              <div class="card-body">
                  @forelse ($walkinapp as $walkin)
                      <div class="card-patient mb-2">
                          <div class="">
                              <p>NAME: <span>{{ $walkin->walkInPatient->full_name }}</span></p>
                              <div class="d-flex">
                                  <p>CATEGORY: <span>{{ $walkin->type_consult }}</span></p>
                                  <p class="ms-2">STATUS: <span class="text-uppercase">{{ $walkin->status }}</span></p>
                              </div>
                          </div>
                          <div class="d-flex">
                              <p>DATE: <span>{{ $walkin->date_consultation->format('F d, Y') }}</span></p>
                              <p class="ms-2">TIME: <span>{{ date('h:i A', strtotime($walkin->time_consultation)) }}</span></p>
                          </div>
                          <div class=" mt-2">
                            @role('staff')
                            <a href="{{ route('walkin-appointment.view' , $walkin->id) }}" class="btn btn-sm btn-success">VIEW</a>
                              <a href="{{ route('walkin-appointment.edit', $walkin->id) }}" class="btn btn-sm btn-primary mx-1">UPDATE</a>
                              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#walkInDelete{{$walkin->id}}">
                                DELETE
                              </button>
                              @endrole
                              @role('pediatrician')
                              <a href="{{ route('app-checkup.view-med', $walkin->id) }}" class="btn btn-sm btn-primary me-1">MEDICAL HISTORY</a>
                              <a href="{{ route('walkin-appointment.consult', $walkin->id) }}" class="btn btn-sm btn-info">CONSULT</a>
                              @endrole
                          </div>
                      </div>

                      <div class="modal fade" id="walkInDelete{{$walkin->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                              {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button> --}}
                            </div>
                            <div class="modal-body">
                              <h5 class="text-center mb-0" style="line-height: unset;">Are you sure you want to delete <br> <span class="text-primary">{{ $walkin->walkInPatient->full_name }}</span> appointment?</h5>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                              <form action="{{ route('walkin.delete', [$walkin] ) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                          </div>
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
