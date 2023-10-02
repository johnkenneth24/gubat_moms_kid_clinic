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
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Book an Appointment</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="">Select a Category first</label>
                            <select name="category" class="form-control" id="category" required>
                                <option value="">--Please Select--</option>
                                <option value="consultation" @selected(old('category') == 'consultation')>Consultation</option>
                                <option value="vaccination" @selected(old('category') == 'vaccination')>Vaccination & Baby Check-up
                                </option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="mb-0 text-center mb-2">Select Date</h5>
                                <div>
                                    <div class="mb-3" style="border: solid 1px; padding: 5px">
                                        <div id="calendar" style=""></div>
                                    </div>
                                    <input type="hidden" name="date_appointment" class="form-control" id="selectedDate">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="mb-2 text-center">Select Time</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2 mt-3">
                                            <label class="form-label text-center">Morning Appointment</label>
                                        </div>
                                        <div class="form-check">
                                            <input name="time_appointment" class="form-check-input" type="radio"
                                                value="09:00:00" id="defaultRadio1">
                                            <label class="form-check-label" for="defaultRadio1">
                                                09:00 AM
                                            </label>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input name="time_appointment" class="form-check-input" type="radio"
                                                value="10:00:00" id="defaultRadio2">
                                            <label class="form-check-label" for="defaultRadio2">
                                                10:00 AM
                                            </label>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input name="time_appointment" class="form-check-input" type="radio"
                                                value="11:00:00" id="defaultRadio3">
                                            <label class="form-check-label" for="defaultRadio3">
                                                11:00 AM
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2 mt-3">
                                            <label class="form-label text-center">Afternoon Appointment</label>
                                        </div>
                                        <div class="form-check">
                                            <input name="time_appointment" class="form-check-input" type="radio"
                                                value="13:00:00" id="defaultRadio4">
                                            <label class="form-check-label" for="defaultRadio4">
                                                01:00 PM <span class="remaining-slots"></span>
                                            </label>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input name="time_appointment" class="form-check-input" type="radio"
                                                value="14:00:00" id="defaultRadio5">
                                            <label class="form-check-label" for="defaultRadio5">
                                                02:00 PM <span class="remaining-slots"></span>
                                            </label>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input name="time_appointment" class="form-check-input" type="radio"
                                                value="15:00:00" id="defaultRadio6">
                                            <label class="form-check-label" for="defaultRadio6">
                                                03:00 PM <span class="remaining-slots"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-5 mt-5 p-2">
                                    <div class="card">
                                        <button type="submit" class="btn btn-primary">Submit Appointment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('vendor-script')

@endsection
@section('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            const selectedDateInput = document.getElementById('selectedDate');
            const categorySelect = document.getElementById('category');

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

                            const category = categorySelect.value;

                            if (category == 'vaccination') {
                                const selectedDate = new Date(selectedDateInput.value);
                                const day = selectedDate.getDay();
                                // only on day 3 will the afternoon appointments be available,
                                // disable both morning and afternoon appointments if not wednesday
                                if (day != 3) {
                                    morningRadioButtons.forEach(radio => {
                                        radio.disabled = true;
                                        radio.nextElementSibling.classList.add(
                                            'text-danger');
                                    });
                                    afternoonRadioButtons.forEach(radio => {
                                        radio.disabled = true;
                                        radio.nextElementSibling.classList.add(
                                            'text-danger');
                                    });
                                } else {
                                    morningRadioButtons.forEach(radio => {
                                        radio.disabled = true;
                                        radio.nextElementSibling.classList.add(
                                            'text-danger');
                                    });
                                    afternoonRadioButtons.forEach(radio => {
                                        radio.disabled = false;
                                        radio.nextElementSibling.classList.remove(
                                            'text-danger');
                                    });
                                }
                            } else if (category == 'consultation') {
                                // if monday and friday enable both morning and afternoon appointments, 
                                // else if wednesday enable only morning appointments, 
                                // else if tuesday, thursday, and saturday disable morning appointments
                                const selectedDate = new Date(selectedDateInput.value);
                                const day = selectedDate.getDay();
                                if (day == 1 || day == 5) {
                                    morningRadioButtons.forEach(radio => {
                                        radio.disabled = false;
                                        radio.nextElementSibling.classList.remove(
                                            'text-danger');
                                    });
                                    afternoonRadioButtons.forEach(radio => {
                                        radio.disabled = false;
                                        radio.nextElementSibling.classList.remove(
                                            'text-danger');
                                    });
                                } else if (day == 3) {
                                    morningRadioButtons.forEach(radio => {
                                        radio.disabled = false;
                                        radio.nextElementSibling.classList.remove(
                                            'text-danger');
                                    });
                                    afternoonRadioButtons.forEach(radio => {
                                        radio.disabled = true;
                                        radio.nextElementSibling.classList.add(
                                            'text-danger');
                                    });
                                } else {
                                    morningRadioButtons.forEach(radio => {
                                        radio.disabled = true;
                                        radio.nextElementSibling.classList.add(
                                            'text-danger');
                                    });
                                    afternoonRadioButtons.forEach(radio => {
                                        radio.disabled = false;
                                        radio.nextElementSibling.classList.remove(
                                            'text-danger');
                                    });
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                },
                selectOverlap: false,
                selectAllow: function(info) {
                    var today = new Date();
                    var yesterday = new Date(today);
                    yesterday.setDate(yesterday.getDate() - 1);
                    var day = info.start.getDay();
                    return day != 0 && info.start > yesterday;
                },
                selectMirror: false,
                unselectAuto: false,
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
            calendar.render();
        });
    </script>
@endsection
