@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Users List')

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
      <h5 class="card-header text-uppercase">Users List</h5>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Full Name</th>
              <th>Address</th>
              <th>E-Mail</th>
              <th>Phone Number</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr>
              <td style="font-size: 0.90rem;">Juan Dela Cruz</td>
              <td style="font-size: 0.90rem;">Brgy. 1, Gubat, Sorsogon</td>
              <td style="font-size: 0.90rem;">juancruz@email.cop</td>
              <td style="font-size: 0.90rem;">09123456789</td>
              <td>
                <button class="btn btn-primary btn-sm">View</button>
                <button class="btn btn-danger btn-sm">Deactivate</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection