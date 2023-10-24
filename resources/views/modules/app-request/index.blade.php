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
            @forelse ($book_appointments as $book_app)
            <tr>
              <td style="font-size: 0.90rem;">{{ $book_app->user->fullname }}</td>
              <td style="font-size: 0.90rem;">{{ $book_app->category }}</td>
              <td style="font-size: 0.90rem;">{{ $book_app->date_appointment->format('F d, Y') }}</td>
              <td style="font-size: 0.90rem;">{{ date('h:i A', strtotime($book_app->time_appointment))}}</td>
              <td style="font-size: 0.90rem;"><span class="badge bg-label-warning">{{ $book_app->status }}</span></td>
              <td class="d-flex flex-nowrap justify-content-center align-items-center">
                <a href="{{ route('app-request.view', $book_app->id) }}" class="btn btn-success btn-sm text-nowrap ">VIEW USER INFO</a>
                @if($book_app->status != 'Approved')
                <form action="{{ route('app-request.approved', [$book_app->id]) }}" method="POST" class="mb-0 me-1 ms-1">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="btn btn-info btn-sm">APRROVE</button>
                </form>
                <a href="{{ route('app-request.cancel', $book_app->id) }}" class="btn btn-sm btn-danger">CANCEL</a>

                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center">No book appointment request!</td>
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



