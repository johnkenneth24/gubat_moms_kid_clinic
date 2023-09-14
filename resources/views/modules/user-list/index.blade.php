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
            @forelse ($users as $user)
            <tr>
              <td style="font-size: 0.90rem;">{{ $user->lastname .'. '.$user->firstname. ' '. $user->middlename. ',' }}</td>
              <td style="font-size: 0.90rem;">{{ $user->address }}</td>
              <td style="font-size: 0.90rem;">{{ $user->email }}</td>
              <td style="font-size: 0.90rem;">{{ $user->contact_number }}</td>
              <td>
                <a href="{{ route('user-list.view' , $user->id) }}" class="text-white btn btn-primary btn-sm">View</a>
              </td>
            </tr>
            @empty

            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
