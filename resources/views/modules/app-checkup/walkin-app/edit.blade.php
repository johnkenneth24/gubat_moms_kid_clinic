@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Appointment Checkup')

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
    <form action="{{ route('walkin-appointment.update', [$walkin]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-2">
                    <div class="card-header d-flex align-items-center justify-content-between ">
                        <div class="card-title p-0 mb-0 d-flex align-item-center">
                            <h5 class="card-header ms-2 p-0 text-uppercase">Personal Information</h5>
                        </div>
                        <div class="card-tool">
                            {{-- <a href="" class="btn btn-primary" style="color: #ffff;">ADD WALK-IN APPOINTMENT</a> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                        placeholder="" name="firstname" value="{{ $walkin->walkInPatient->firstname }}">
                                    @error('firstname')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Middle Name</label>
                                    <input type="text" class="form-control @error('middlename') is-invalid @enderror"
                                        value="{{ $walkin->walkInPatient->middlename }}" placeholder="" name="middlename">
                                    @error('middlename')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                        value="{{ $walkin->walkInPatient->lastname }}" placeholder="" name="lastname">
                                    @error('lastname')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Birthdate</label>
                                    <input type="date" id="birthdate"
                                        class="form-control @error('birthdate') is-invalid @enderror"
                                        value="{{ $walkin->walkInPatient->birthdate->format('Y-m-d') }}" placeholder=""
                                        name="birthdate">
                                    @error('birthdate')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Age</label>
                                    <input type="number" id="age"
                                        class="form-control text-end @error('age') is-invalid @enderror"
                                        value="{{ $walkin->walkInPatient->age }}" placeholder="0" name="age">
                                    @error('age')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Gender</label>
                                    <select id="" class="form-select @error('gender') is-invalid @enderror"
                                        name="gender">
                                        <option value="">--Please Select--</option>
                                        @foreach ($gender as $genders)
                                            <option value="{{ $genders }}" @selected($walkin->walkInPatient->gender == $genders)>
                                                {{ $genders }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="form-group">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" class="form-control @error('contact_number') is-invalid @enderror"
                                        value="{{ $walkin->walkInPatient->contact_number }}" placeholder=""
                                        name="contact_number">
                                    @error('contact_number')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" id=""
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ $walkin->walkInPatient->address }}" placeholder="" name="address">
                                    @error('address')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Type of Consultation</label>
                                    <select id="" class="form-select @error('type_consult') is-invalid @enderror"
                                        name="type_consult">
                                        <option value="">--Please Select--</option>
                                        @if (date('Wed') == 'Wed')
                                            @foreach ($consult as $consults)
                                                <option value="{{ $consults }}" @selected($walkin->type_consult == $consults)>
                                                    {{ $consults }}</option>
                                            @endforeach
                                        @else
                                            @foreach ($checkup as $checkups)
                                                <option value="{{ $checkups }}" @selected($walkin->type_consult == $checkups)>
                                                    {{ $checkups }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Date of Consultation</label>
                                    <input type="date" id=""
                                        class="form-control @error('date_consultation') is-invalid @enderror"
                                        placeholder="" value="{{ $walkin->date_consultation->format('Y-m-d') }}"
                                        name="date_consultation">
                                    @error('date_consultation')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Time of Consultation</label>
                                    <input type="time" id=""
                                        class="form-control @error('time_consultation') is-invalid @enderror"
                                        placeholder="" value="{{ $walkin->time_consultation }}"
                                        name="time_consultation">
                                    @error('time_consultation')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Weight</label>
                                        <input type="number" id="" step="0.01"
                                            class="form-control text-end @error('weight') is-invalid @enderror"
                                            value="{{ $walkin->walkInConsult->weight }}" placeholder="" name="weight">
                                        @error('weight')
                                            <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Height</label>
                                        <input type="number" id="" step="0.01"
                                            class="form-control text-end @error('height') is-invalid @enderror"
                                            value="{{ $walkin->walkInConsult->height }}" placeholder="" name="height">
                                        @error('height')
                                            <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Blood Pressure</label>
                                        <input type="text" id=""
                                            class="form-control text-end @error('blood_pressure') is-invalid @enderror"
                                            value="{{ $walkin->walkInConsult->blood_pressure }}" placeholder=""
                                            name="blood_pressure">
                                        @error('blood_pressure')
                                            <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('app-checkup.index') }}" class="btn btn-danger me-2 text-white">CANCEL</a>
                        <button type="submit" class="btn btn-success">SUBMIT APPOINTMENT</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            $("#birthdate").on("change", function() {
                const birthdate = new Date($(this).val());
                const currentDate = new Date();
                const age = currentDate.getFullYear() - birthdate.getFullYear();

                // Check if the birthday hasn't occurred this year yet
                if (
                    currentDate.getMonth() < birthdate.getMonth() ||
                    (currentDate.getMonth() === birthdate.getMonth() &&
                        currentDate.getDate() < birthdate.getDate())
                ) {
                    age--;
                }

                $("#age").val(age);
            });
        });
    </script>
@endsection
