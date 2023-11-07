@extends('layouts/app-auth/commonMaster')

@section('title', 'Appointment Status')

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
        <div class="col-md-12">
            <div class="card p-2">
                <h5 class="card-header text-uppercase">Appointment Status</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Date Appointment</th>
                                <th>Time Appointment</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($appointments as $app)
                                <tr>
                                    <td style="font-size: 0.90rem;">{{ ucfirst($app->category) }}</td>
                                    <td style="font-size: 0.90rem;">{{ $app->date_appointment->format('F d, Y') }}</td>
                                    <td style="font-size: 0.90rem;">{{ date('h:i A', strtotime($app->time_appointment)) }}
                                    </td>
                                    <td><span class="badge bg-label-primary">{{ $app->status }}</span></td>
                                    <td>
                                      @if($app->status != 'Did Not Attend' && $app->status != 'Approved' && $app->status != 'Checked Up' && $app->status != 'Cancelled' && $app->status != 'Cancelled Appointment' )
                                        <button type="button" class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#preconsult{{ $app->id }}">
                                          Cancel Appointment
                                        </button>
                                      @endif
                                    </td>
                                </tr>
                                <div class="modal fade" id="preconsult{{ $app->id }}" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                          </button>
                                      </div>
                                        <div class="modal-body">
                                          <form action="{{ route('app-stat.cancel' , $app->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <h5 class="text-wrap mb-0 text-center text-uppercase mb-2">
                                              Reason for Cancellation</h5>
                                              <div class="form-group">
                                                <input type="text" class="form-control" name="reason_cancel">
                                              </div>
                                            </h5>
                                          </div>
                                          <div class="modal-footer d-flex justify-content-center">
                                            <button type="submit" class="btn btn-danger">SUBMIT</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                                          </div>
                                          </form>
                                    </div>
                                  </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Appointment</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
