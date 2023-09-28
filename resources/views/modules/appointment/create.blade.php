@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Book Appointment')

@section('vendor-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <style>
        .unselectable-date {
            background-color: rgb(211, 211, 211);
            color: #eea0a0;
        }
    </style>
@endsection

@section('content')
    <form action="{{ route('appointment.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Select Date</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3" style="border: solid 1px; padding: 5px">
                            <div id="calendar" style=""></div>
                        </div>
                        <input type="hidden" name="date_appointment" class="form-control" id="selectedDate">
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">BOOK APPOINTMENT</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="">Select Category</label>
                                <select name="category" class="form-control" required>
                                    <option value="">--Please Select--</option>
                                    <option value="Consultation" @selected(old('category') == 'Consultation')>Consultation</option>
                                    <option value="Baby Check-up" @selected(old('category') == 'Baby Check-up')>Baby Check-up</option>
                                    <option value="Vaccination" @selected(old('category') == 'vaccination')>Vaccination</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-label">Morning Appointment</label>
                            </div>
                            <div class="form-check">
                                <input name="time_appointment" class="form-check-input" type="radio" value="09:00:00"
                                    id="defaultRadio1">
                                <label class="form-check-label" for="defaultRadio1">
                                    09:00 AM
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input name="time_appointment" class="form-check-input" type="radio" value="10:00:00"
                                    id="defaultRadio2">
                                <label class="form-check-label" for="defaultRadio2">
                                    10:00 AM
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input name="time_appointment" class="form-check-input" type="radio" value="11:00:00"
                                    id="defaultRadio3">
                                <label class="form-check-label" for="defaultRadio3">
                                    11:00 AM
                                </label>
                            </div>
                            <div class="mb-2 mt-3">
                                <label class="form-label">Afternoon Appointment</label>
                            </div>
                            <div class="form-check">
                                <input name="time_appointment" class="form-check-input" type="radio" value="13:00:00"
                                    id="defaultRadio4">
                                <label class="form-check-label" for="defaultRadio4">
                                    01:00 PM
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input name="time_appointment" class="form-check-input" type="radio" value="14:00:00"
                                    id="defaultRadio5">
                                <label class="form-check-label" for="defaultRadio5">
                                    02:00 PM
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input name="time_appointment" class="form-check-input" type="radio" value="15:00:00"
                                    id="defaultRadio6">
                                <label class="form-check-label" for="defaultRadio6">
                                    03:00 PM
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-5 p-0">
                    <div class="card">
                        <button type="submit" class="btn btn-primary">Submit Appointment</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('vendor-script')

@endsection
@push('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            const selectedDateInput = document.getElementById('selectedDate');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                select: function(info) {
                    selectedDateInput.value = info.startStr;
                    console.log('Date input changed');
                    $.ajax({
                        url: 'get-appointments',
                        method: "GET",
                        data: {
                            date: selectedDateInput.value
                        },
                        success: function(response) {
                            console.log('AJAX request successful');
                            const appointments = JSON.parse(response);
                            const appointmentIds = appointments.map(appointment => {
                                const inputDate = new Date(appointment
                                    .date_appointment);
                                inputDate.setDate(inputDate.getDate() + 1);
                                const formattedDate = inputDate.toISOString().slice(
                                    0, 10);
                                return {
                                    id: appointment.id,
                                    date_appointment: formattedDate,
                                    time_appointment: appointment.time_appointment
                                };
                            });

                            const morningAppointments = appointmentIds.filter(
                                appointment => {
                                    return appointment.time_appointment == '09:00:00' ||
                                        appointment.time_appointment == '10:00:00' ||
                                        appointment.time_appointment == '11:00:00'
                                });

                            const afternoonAppointments = appointmentIds.filter(
                                appointment => {
                                    return appointment.time_appointment == '13:00:00' ||
                                        appointment.time_appointment == '14:00:00' ||
                                        appointment.time_appointment == '15:00:00'
                                });

                            const morningRadioButtons = document.querySelectorAll(
                                'input[value="09:00:00"], input[value="10:00:00"], input[value="11:00:00"]'
                            );

                            const afternoonRadioButtons = document.querySelectorAll(
                                'input[value="13:00:00"], input[value="14:00:00"], input[value="15:00:00"]'
                            );

                            morningRadioButtons.forEach(radio => {
                                if (morningAppointments.some(appointment =>
                                        appointment
                                        .date_appointment == selectedDateInput
                                        .value &&
                                        appointment.time_appointment == radio.value
                                    )) {
                                    radio.disabled = true;
                                } else {
                                    radio.disabled = false;
                                }
                            });

                            afternoonRadioButtons.forEach(radio => {
                                if (afternoonAppointments.some(appointment =>
                                        appointment
                                        .date_appointment == selectedDateInput
                                        .value &&
                                        appointment.time_appointment == radio.value
                                    )) {
                                    radio.disabled = true;
                                } else {
                                    radio.disabled = false;
                                }
                            });





                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                },
                selectAllow: function(info) {
                    var today = new Date();
                    var yesterday = new Date(today);
                    yesterday.setDate(yesterday.getDate() - 1);
                    var day = info.start.getDay();
                    return day != 0 && info.start > yesterday;


                },
                selectMirror: false,
                unselectAuto: false,
                selectOverlap: false,
                contentHeight: 410,
                dayCellClassNames: function(arg) {
                    if (arg.isPast) {
                        return 'unselectable-date';
                    }
                },
                headerToolbar: {
                    start: 'prev',
                    center: 'title',
                    end: 'next'
                },
            });
            calendar.updateSize();
            calendar.render();

        });
    </script>
@endpush
