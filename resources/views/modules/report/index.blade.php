@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Book Appointment')

@section('vendor-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <style>

    </style>
@endsection
@livewireStyles()

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
      <div class="card-header d-flex justify-content-between align-items-center ">
        <div class="card-title mb-0">
          <h5 class="text-uppercase mb-0">
            Summary of Records
          </h5>
        </div>
        <form action="{{ route('report.index') }}" >
          @csrf
        <div class="card-tools d-flex">
            <div>
              <input type="month" name="selected_month" class="form-control" id="">
            </div>
            <div>
              <select name="" class="form-control  mx-2" id="">
                <option value="">Select Category</option>
              </select>
            </div>
            <div>
              <button type="submit" class="btn btn-info ms-3">Filter</button>
            </div>
          </form>
        </div>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Patient Name</th>
              <th>Date Appointment</th>
              <th>Time Appointment</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">


            @forelse ($combinedAppointments as $appointment)
    <tr>
        <td style="font-size: 0.90rem;">
            {{ $appointment->firstname . ' ' . $appointment->lastname}}
        </td>
        <td style="font-size: 0.90rem;">{{ $appointment->date }}</td>
        <td style="font-size: 0.90rem;">{{ date('h:iA', strtotime($appointment->time)) }}</td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center">No record found!</td>
    </tr>
@endforelse



          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@livewireScripts()

@section('vendor-script')

@endsection

@section('page-script')

@endsection



