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
            <!-- Basic Layout -->
            <div class="col-md-7">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Book An Appointment</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="">Select Category</label>
                            <select name="category" class="form-control" required>
                                <option value="">--Please Select--</option>
                                <option value="consultation" @selected(old('category') == 'consultation')>Consultation</option>
                                <option value="vaccination" @selected(old('category') == 'vaccination')>Vaccination & Baby Check-up
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <h5>Select Date</h5>
                        </div>
                        <div class="mb-3" style="border: solid 1px; padding: 5px">
                            <div id="calendar" style=""></div>
                        </div>
                        <input type="hidden" name="date_appointment" class="form-control" id="selectedDate">
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Select Time</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <label class="form-label">Morning Appointment</label>
                                </div>

                                <?php
                                $times = [
                                    '09:00:00' => '09:00 AM',
                                    '10:00:00' => '10:00 AM',
                                    '11:00:00' => '11:00 AM',
                                ];
                                
                                foreach ($times as $time => $label) {
                                    echo '<div class="form-check mt-3">';
                                    echo '<input name="time_appointment" class="form-check-input" type="radio" value="' . $time . '" id="defaultRadio' . $time . '">';
                                    echo '<label class="form-check-label" for="defaultRadio' . $time . '">' . $label . '</label>';
                                    echo '</div>';
                                }
                                ?>

                                <div class="mb-2 mt-3">
                                    <label class="form-label">Afternoon Appointment</label>
                                </div>

                                <?php
                                $times = [
                                    '13:00:00' => '01:00 PM',
                                    '14:00:00' => '02:00 PM',
                                    '15:00:00' => '03:00 PM',
                                ];
                                
                                foreach ($times as $time => $label) {
                                    echo '<div class="form-check mt-3">';
                                    echo '<input name="time_appointment" class="form-check-input" type="radio" value="' . $time . '" id="defaultRadio' . $time . '">';
                                    echo '<label class="form-check-label" for="defaultRadio' . $time . '">' . $label . '</label>';
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 mb-5 p-0">
                        <div class="card">
                            <button type="submit" class="btn btn-primary">Submit Appointment</button>
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
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var selectedDateInput = document.getElementById('selectedDate');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                select: function(info) {
                    selectedDateInput.value = info.startStr;
                },
                selectAllow: function(info) {
                    var today = new Date();
                    var yesterday = new Date(today);
                    yesterday.setDate(yesterday.getDate() - 1);
                    var day = info.start.getDay();
                    return day != 0 && info.start > yesterday;
                },
                selectMirror: false,
                selectOverlap: false,
                contentHeight: 400,
                dayCellClassNames: function(arg) {
                    if (arg.isPast) {
                        return 'unselectable-date';
                    }
                },
                headerToolbar: {
                    start: '',
                    center: 'title',
                    end: 'prev,next'
                },
                            });
            calendar.render();
        });
    </script>
@endsection
