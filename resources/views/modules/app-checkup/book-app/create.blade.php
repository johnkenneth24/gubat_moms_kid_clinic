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
    <form action="{{ route('walkin-appointment.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card p-2">
                    <div class="card-header d-flex align-items-center justify-content-between ">
                        <div class="card-title p-0 mb-0 d-flex align-item-center">

                            <a href="{{ route('app-checkup.index') }}"class="btn p-0"><i class='bx bx-arrow-back'></i></a>
                            <h5 class="card-header ms-2 p-0 text-uppercase" style="line-height: 1.5;"><span
                                    class="text-primary">{{ $book_app->user->full_name }}</span> Personal Information
                            </h5>
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
                                    <input readonly type="text"
                                        class="form-control @error('firstname') is-invalid @enderror" placeholder=""
                                        name="firstname" value="{{ $book_app->user->firstname }}">
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
                                    <input readonly type="text"
                                        class="form-control @error('middlename') is-invalid @enderror"
                                        value="{{ $book_app->user->middlename }}" placeholder="" name="middlename">
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
                                    <input readonly type="text"
                                        class="form-control @error('lastname') is-invalid @enderror"
                                        value="{{ $book_app->user->lastname }}" placeholder="" name="lastname">
                                    @error('lastname')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Mother Name</label>
                                    <input readonly type="text"
                                        class="form-control @error('lastname') is-invalid @enderror"
                                        value="{{ $book_app->user->mother_name }}" placeholder="" name="lastname">
                                    @error('lastname')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Father Name</label>
                                    <input readonly type="text"
                                        class="form-control @error('lastname') is-invalid @enderror"
                                        value="{{ $book_app->user->father_name }}" placeholder="" name="lastname">
                                    @error('lastname')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label">Birthdate</label>
                                    <input readonly type="date" id="birthdate"
                                        class="form-control @error('birthdate') is-invalid @enderror"
                                        value="{{ $book_app->user->birthdate->format('Y-m-d') }}" placeholder=""
                                        name="birthdate">
                                    @error('birthdate')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label">Age</label>
                                    <input readonly type="number" id="age"
                                        class="form-control text-end @error('age') is-invalid @enderror"
                                        value="{{ $age }}" placeholder="0" name="age">
                                    @error('age')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Gender</label>
                                    <select disabled id=""
                                        class="form-select @error('gender') is-invalid @enderror" name="gender">
                                        <option disabled selected>--Please Select--</option>
                                        @foreach ($gender as $genders)
                                            <option value="{{ $genders }}" @selected($genders == $book_app->user->gender)>
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
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input readonly type="text" id=""
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ $book_app->user->address }}" placeholder="" name="address">
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
                                    <input type="text" class="form-control" value="{{ $book_app->category }}" readonly>
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
                                    <input readonly type="date" id=""
                                        class="form-control @error('date_consultation') is-invalid @enderror"
                                        placeholder="" value="{{ $book_app->date_appointment->format('Y-m-d') }}"
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
                                    <input readonly type="time" id=""
                                        class="form-control @error('time_consultation') is-invalid @enderror"
                                        placeholder="" value="{{ $book_app->time_appointment }}"
                                        name="time_consultation">
                                    @error('time_consultation')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- <div class="card-footer d-flex justify-content-end">
        <a href="{{ route('app-checkup.index') }}" class="btn btn-danger me-2 text-white">CANCEL</a>
        <button type="submit" class="btn btn-success">SUBMIT APPOINTMENT</button>
      </div> --}}
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('app-checkup.store-consult', [$book_app]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card p-2">
                    <div class="card-header d-flex align-items-center justify-content-between pb-3">
                        <div class="card-title p-0 mb-0 d-flex align-item-center">
                            <h5 class="card-header ms-2 p-0 text-uppercase" style="line-height: 1.5;"><span
                                    class="text-primary">{{ $book_app->user->full_name }}</span> CONSULTATION</h5>
                        </div>
                        <div class="card-tool">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Weight(kg)</label>
                                    <input readonly type="number" id="" step="0.01"
                                        class="form-control text-end @error('weight') is-invalid @enderror"
                                        value="{{ $book_app->bookAppConsult->weight }}" placeholder="" name="weight">
                                    @error('weight')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Height(cm)</label>
                                    <input readonly type="number" id="" step="0.01"
                                        class="form-control text-end @error('height') is-invalid @enderror"
                                        value="{{ $book_app->bookAppConsult->height }}" placeholder="" name="height">
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
                                    <input readonly type="text" id=""
                                        class="form-control text-end @error('height') is-invalid @enderror"
                                        value="{{ $book_app->bookAppConsult->blood_pressure }}" placeholder=""
                                        name="height">
                                    @error('height')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Intake Medication</label>
                                    <textarea class="form-control @error('medication_intake') is-invalid @enderror" id=""
                                        name="medication_intake" rows="3" placeholder="Type here..."></textarea>
                                    @error('medication_intake')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Medical History</label>
                                    <textarea class="form-control @error('medical_history') is-invalid @enderror" name="medical_history" id=""
                                        rows="3" placeholder="Type here..."></textarea>
                                    @error('firstname')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Vaccine Received</label>
                                    <textarea class="form-control @error('vaccine_received') is-invalid @enderror" name="vaccine_received"
                                        id="" rows="3" placeholder="Type here..."></textarea>
                                    @error('vaccine_received')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Diagnosis</label>
                                    <textarea class="form-control @error('diagnosis') is-invalid @enderror" name="diagnosis" id=""
                                        rows="3" placeholder="Type here..."></textarea>
                                    @error('diagnosis')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" style="color: #ffff;">DONE CONSULTATION</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            $("#birthdate").on("input", function() {
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
