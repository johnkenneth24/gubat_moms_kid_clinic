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
            <tr>
              <td style="font-size: 0.90rem;">Juan Dela Cruz</td>
              <td style="font-size: 0.90rem;">Consultation</td>
              <td style="font-size: 0.90rem;">August 1, 2023</td>
              <td style="font-size: 0.90rem;">01:00 PM</td>
              <td><span class="badge bg-label-primary">Completed</span></td>
              <td>
                <button class="btn btn-primary btn-sm">View Consultation</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
