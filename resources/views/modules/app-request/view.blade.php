@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Appointment Request Info')

@section('vendor-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card p-2">
              <div class="card-header">
                <h5 class="text-uppercase mb-0"><a href="{{ route('app-request.index') }}" class=""><i class='bx bx-arrow-back'></i></a> Appointment Request INFORMATION</h5>
              </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="form-label">Category</label>
                                <input type="text" name="" id="" class="form-control"
                                    value="{{ $book_app->category }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="form-label">date appointment</label>
                                <input type="text" name="" id="" class="form-control"
                                    value="{{ $book_app->date_appointment->format('F d, Y') }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="form-label">time appointment</label>
                                <input type="text" name="" id="" class="form-control"
                                    value="{{ date('h:i A', strtotime($book_app->time_appointment)) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="form-label">status</label>
                                <input type="text" name="" id="" class="form-control text-uppercase"
                                    value="{{ $book_app->status }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card p-2">
                <h5 class="card-header text-uppercase">PATIENT INFORMATION</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">full name</label>
                                <input type="text" name="" id="" class="form-control"
                                    value="{{ $book_app->user->full_name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="form-label">gender</label>
                                <input type="text" name="" id="" class="form-control"
                                    value="{{ $book_app->user->gender }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="form-label">birthdate</label>
                                <input type="text" name="" id="" class="form-control"
                                    value="{{ $book_app->user->birthdate->format('F d, Y') }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="form-label">contact no.</label>
                                <input type="text" name="" id="" class="form-control"
                                    value="{{ $book_app->user->contact_number }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="form-label">email</label>
                                <input type="text" name="" id="" class="form-control"
                                    value="{{ $book_app->user->email }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">address</label>
                                <input type="text" name="" id="" class="form-control"
                                    value="{{ $book_app->user->address }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-script')

@endsection

@section('page-script')

@endsection
