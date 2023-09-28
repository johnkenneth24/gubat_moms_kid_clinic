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
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title mb-0 ">
          <h5 class="mb-0 text-uppercase">Patient Record</h5>
        </div>
        <div class="card-tool">
          <form action="{{ route('patient-record.index') }}" method="get" class="d-flex">
            @csrf
            <div class="form-group">
                <input class="form-control form-control-sm d-sm-none d-md-block me-2" type="search"
                    placeholder="Search..." name="search" style="width: 300px;">
            </div>
          <button type="submit" class="btn btn-sm btn-primary">SEARCH</button>
        </form>
        </div>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Patient Name</th>
              <th>Address</th>
              <th>Birthdate</th>
              <th>Gender</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @forelse ($patient_record as $patient_rec)
            <tr>
              <td style="font-size: 0.90rem;">{{ $patient_rec->full_name }}</td>
              <td style="font-size: 0.90rem;">{{ $patient_rec->address }}</td>
              <td style="font-size: 0.90rem;">{{ $patient_rec->birthdate->format('F d, Y') }}</td>
              <td style="font-size: 0.90rem;">{{ $patient_rec->gender }}</td>
              <td>
                <a href="{{ route('patient-record.view_consult', $patient_rec->id) }}" class="btn btn-primary btn-sm">View Medical History</a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center">No Patient Record!</td>
            </tr>
            @endforelse
          </tbody>
        </table>
        {{-- <div class="d-flex justify-content-center">
          {{ $patient_record->links() }}
        </div> --}}
      </div>
    </div>
  </div>
</div>
@endsection
