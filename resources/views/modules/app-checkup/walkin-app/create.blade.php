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
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-2">
                    <div class="card-header d-flex align-items-center justify-content-between ">
                        <div class="card-title p-0 mb-0 d-flex align-item-center">
                            <h5 class="card-header p-0 text-uppercase">Personal Information</h5>
                        </div>
                        <div class="card-tool">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Patient Type</label>
                                    <select name="patientType" id="patientType" class="form-control">
                                        <option value="New Patient" selected>New Patient</option>
                                        <option value="Existing Patient">Existing Patient</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2" id="patientName">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">PATIENT NAME</label>
                                    <select name="patientName" id="" class="form-control">
                                        <option value="">--Please Select--</option>
                                        @foreach ($patientName as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3" id="patient_info">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                        placeholder="" name="firstname" value="{{ old('firstname') }}">
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
                                        value="{{ old('middlename') }}" placeholder="" name="middlename">
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
                                        value="{{ old('lastname') }}" placeholder="" name="lastname">
                                    @error('lastname')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label class="form-label">father Name</label>
                                    <input type="text" class="form-control @error('father_name') is-invalid @enderror"
                                        value="{{ old('father_name') }}" placeholder="" name="father_name">
                                    @error('father_name')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label class="form-label">mother Name</label>
                                    <input type="text" class="form-control @error('mother_name') is-invalid @enderror"
                                        value="{{ old('mother_name') }}" placeholder="" name="mother_name">
                                    @error('mother_name')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2 mt-2">
                                <div class="form-group">
                                    <label class="form-label">Birthdate</label>
                                    <input type="date" id="birthdate"
                                        class="birthdate form-control @error('birthdate') is-invalid @enderror"
                                        value="{{ old('birthdate') }}" placeholder="" name="birthdate"
                                        onchange="calculateAge()">
                                    @error('birthdate')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2 mt-2">
                                <div class="form-group">
                                    <label class="form-label">Age</label>
                                    <input type="text" id="age"
                                        class="age form-control text-end @error('age') is-invalid @enderror"
                                        value="{{ old('age') }}" placeholder="0" name="age" readonly>
                                    @error('age')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Gender</label>
                                    <select id="" class="form-select @error('gender') is-invalid @enderror"
                                        name="gender">
                                        <option>--Please Select--</option>
                                        @foreach ($gender as $genders)
                                            <option value="{{ $genders }}" @selected(old('gender') == $genders)>
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
                            <div class="col-md-5 mt-2">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" id=""
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address') }}" placeholder="" name="address">
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
                                        <option disabled selected>--Please Select--</option>
                                        @if (date('Wed') == 'Wed')
                                            @foreach ($consult as $consults)
                                                <option value="{{ $consults }}" @selected(old('type_consult') == $consults)>
                                                    {{ $consults }}</option>
                                            @endforeach
                                        @else
                                            @foreach ($checkup as $checkups)
                                                <option value="{{ $checkups }}" @selected(old('type_consult') == $checkups)>
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
                                        placeholder="" value="{{ date('Y-m-d') }}" name="date_consultation">
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
                                        placeholder="" value="{{ date('H:i') }}" name="time_consultation">
                                    @error('time_consultation')
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
                                    <label class="form-label">Weight</label>
                                    <input type="number" id=""
                                        class="form-control text-end @error('weight') is-invalid @enderror"
                                        value="{{ old('weight') }}" placeholder="" name="weight">
                                    @error('weight')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Height</label>
                                    <input type="number" id=""
                                        class="form-control text-end @error('height') is-invalid @enderror"
                                        value="{{ old('height') }}" placeholder="" name="height">
                                    @error('height')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
    </form>
@endsection

@push('page-script')
    <script>
        var patientTypeSelect = document.getElementById('patientType');
        var patientInfo = document.getElementById('patient_info');
        var patientName = document.getElementById('patientName');

        // Function to handle changes in patientType select
        function handlePatientTypeChange() {
            // Check if the selected value is "New Patient"
            if (patientTypeSelect.value === 'New Patient') {
                // Hide the patient_info element and patientName
                patientInfo.style.visibility = 'show';
                patientInfo.style.display = 'flex';
                patientName.style.display = 'none';
            } else {
                // Show the patient_info element and patientName for "Existing Patient"
                // patientInfo.style.visibility = 'hidden';
                patientInfo.style.display = 'none';
                patientName.style.display = 'block';

            }
        }

        // Add event listener to the patientType select
        patientTypeSelect.addEventListener('change', handlePatientTypeChange);

        // Initial call to set the display based on the default selection
        handlePatientTypeChange();
    </script>
    <script>
        function calculateAge() {
            var bdateValue = document.querySelector('.birthdate').value;
            var bdate = new Date(bdateValue);
            var today = new Date();
            var age = today.getFullYear() - bdate.getFullYear();
            var monthDiff = today.getMonth() - bdate.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < bdate.getDate())) {
                age--;
            }

            document.querySelector('.age').value = age;
        }
    </script>
@endpush
