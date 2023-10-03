@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Medical History')

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
  <div class="col-md-12">
    <div class="card p-2">
      <h5 class="card-header text-uppercase">MEDICAL HISTORY</h5>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Category</th>
              <th>Date Consulted</th>
              <th>Time Consulted</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @forelse ($book_apps as $book_app)
            <tr>
              <td style="font-size: 0.90rem;">{{ $book_app->category }}</td>
              <td style="font-size: 0.90rem;">{{ $book_app->date_appointment->format('F d, Y') }}</td>
              <td style="font-size: 0.90rem;">{{ date('h:i A', strtotime($book_app->time_appointment)) }}</td>
              <td>
                <a href="{{ route('med-history.view' , $book_app->id) }}" class="btn btn-primary btn-sm">View Consultation</a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="text-center">
                No Record of Medical History!
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
