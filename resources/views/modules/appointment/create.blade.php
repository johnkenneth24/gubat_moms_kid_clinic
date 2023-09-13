@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Book Appointment')

@section('vendor-style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <style>

    </style>
@endsection

@section('content')
<div class="row">
  <!-- Basic Layout -->
  <div class="col-md-7">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Book An Appointment</h5>
      </div>
      <div class="card-body">
        <form>
          <div class="mb-3">
            <label class="form-label" for="">Select Category</label>
            <select name="" class="form-control" id="">
              <option value="">--Please Select--</option>
              <option value="">Consultation</option>
              <option value="">Vaccination & Baby Check-up</option>
            </select>
          </div>
          <div class="mb-3">
            <h5>Select Date</h5>
          </div>
          <div class="mb-3" style="border: solid 1px; padding: 5px">
            <div id="calendar" style=""></div>
          </div>
        </form>
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
          <form>
            <div class="col-md-12">
              <div class="mb-2">
                <label class="form-label">Morning Appointment</label>
              </div>
              <div class="form-check">
                <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio1">
                <label class="form-check-label" for="defaultRadio1">
                  09:00 AM
                </label>
              </div>
              <div class="form-check mt-3">
                <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio1">
                <label class="form-check-label" for="defaultRadio1">
                  10:00 AM
                </label>
              </div>
              <div class="form-check mt-3">
                <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio1">
                <label class="form-check-label" for="defaultRadio1">
                  11:00 AM
                </label>
              </div>
              <div class="mb-2 mt-3">
                <label class="form-label">Afternoon Appointment</label>
              </div>
              <div class="form-check">
                <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio1">
                <label class="form-check-label" for="defaultRadio1">
                  01:00 AM
                </label>
              </div>
              <div class="form-check mt-3">
                <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio1">
                <label class="form-check-label" for="defaultRadio1" >
                  02:00 AM
                </label>
              </div>
              <div class="form-check mt-3">
                <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio1">
                <label class="form-check-label" for="defaultRadio1">
                  03:00 AM
                </label>
              </div>
            </div>

          </form>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mb-5 p-0">
        <div class="card">
          <button class="btn btn-primary">Submit Appointment</button>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('vendor-script')

@endsection

@section('page-script')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          selectable: false,
          contentHeight: 400,
      });
      calendar.render();
  });
</script>
@endsection
