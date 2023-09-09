@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Book Appointment')

@section('vendor-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <style>


    </style>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
<div class="calendly-inline-widget" data-url="https://calendly.com/dayawtech/consultation" style="min-width:320px; height:700px;"></div>
    </div>
  </div>
</div>
@endsection

@section('vendor-script')

@endsection

@section('page-script')
<!-- Calendly inline widget begin -->
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script> 
@endsection



