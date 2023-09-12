@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Book Appointment')

@section('vendor-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <style>

    </style>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card p-2">
      <h5 class="card-header text-uppercase">Appointment Request</h5>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Patient Name</th>
              <th>Category</th>
              <th>Date Appointment</th>
              <th>Time Appointment</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr>
              <td style="font-size: 0.90rem;">Juan Dela Cruz</td>
              <td style="font-size: 0.90rem;">Consultation</td>
              <td style="font-size: 0.90rem;">August 1, 2023</td>
              <td style="font-size: 0.90rem;">01:00 PM</td>
              <td><span class="badge bg-label-primary">Pending</span></td>
              <td>
                {{-- //modal to view user information --}}
                <button class="btn btn-success btn-sm">View User Info</button>
                <button class="btn btn-info btn-sm">Approve</button>
                <button class="btn btn-danger btn-sm">Cancel</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('vendor-script')

@endsection

@section('page-script')

@endsection



