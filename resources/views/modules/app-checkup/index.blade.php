@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Appointment Checkup')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-primary d-flex alert-dismissible" role="alert">
  <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i class='bx bx-user-check'></i></span>
  <div class="d-flex flex-column ps-1">
    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">{{ session('success') }}</h6>
    <span>Wait for the pediatrician for consultation.</span>
  </div>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
  </button>
</div>
@endif
<div class="row">
  <div class="col-lg-12">
    <div class="card p-2">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title p-0 mb-0 d-flex align-item-center">
          <h5 class="card-header p-0 text-uppercase">Appointment Checkup</h5>
        </div>
        <div class="card-tool">
          @role('staff')
          <a href="{{ route('walkin-appointment.create') }}" class="btn btn-primary" style="color: #ffff;">ADD WALK-IN APPOINTMENT</a>
          @endrole
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Patient Name</th>
                <th>Category</th>
                <th>Date Appointment</th>
                <th>Time Appointment</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @forelse ($walkinapp as $walkin)
              <tr>
                <td style="font-size: 0.90rem;">{{ $walkin->full_name }}</td>
                <td style="font-size: 0.90rem;">{{ $walkin->type_consult }}</td>
                <td style="font-size: 0.90rem;">{{ $walkin->date_consultation->format('F d, Y') }}</td>
                <td style="font-size: 0.90rem;">{{ date('h:i A', strtotime($walkin->time_consultation)) }}</td>
                <td>
                  @role('staff')
                  <a href="{{ route('walkin-appointment.view', $walkin->id)  }}" class="btn btn-success btn-sm text-white">View</a>
                  <a href="{{ route('walkin-appointment.edit', $walkin->id)  }}" class="btn btn-primary btn-sm text-white">Update</a>
                  @endrole
                  @role('pediatrician')
                  <a href="{{ route('walkin-appointment.consult', $walkin->id) }}" class="btn btn-info btn-sm text-white">Consult</a>
                  @endrole
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="5" class="text-center">
                  No Record of Appointment Today!
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {{ $walkinapp->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
