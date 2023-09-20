@extends('layouts/app-auth/contentNavbarLayout')

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
                                        <button class="btn btn-danger btn-sm">Cancel Appointment</button>
                                    </td>
                                </tr>
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
