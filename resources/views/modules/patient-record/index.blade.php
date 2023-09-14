@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Patient Record')

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
<div class="alert alert-primary d-flex align-items-center alert-dismissible" role="alert">
  <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i class='bx bx-user-check'></i></span>
  <div class="d-flex align-items-center ps-1">
    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">{{ session('success') }}</h6>
  </div>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row">
  <div class="col-lg-12">
    <div class="card p-2">
      <h5 class="card-header text-uppercase">Patient Record</h5>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Patient Name</th>
              <th>Category</th>
              <th>Date Consulted</th>
              <th>Time Consulted</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @forelse ($patient_record as $patient_rec)
            <tr>
              <td style="font-size: 0.90rem;">{{ $patient_rec->full_name }}</td>
              <td style="font-size: 0.90rem;">{{ $patient_rec->type_consult }}</td>
              <td style="font-size: 0.90rem;">{{ $patient_rec->date_consultation->format('F d, Y') }}</td>
              <td style="font-size: 0.90rem;">{{ date('h:i A', strtotime($patient_rec->time_consultation)) }}</td>
              <td><span class="badge bg-label-success">{{ $patient_rec->status }}</span></td>
              <td>
                <a href="{{ route('patient-record.view_consult', $patient_rec->id) }}" class="btn btn-primary btn-sm">View Consultation</a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center">No Patient Record!</td>
            </tr>
            @endforelse
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
          {{ $patient_record->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
