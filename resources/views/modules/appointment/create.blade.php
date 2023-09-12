@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Book Appointment')

@section('vendor-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <style>
.calendly-badge-widget {
left: 50% !important;
margin-left: -100px!important;
}


    </style>
@endsection

@section('content')
<div class="row">
  <div class="col-xxl-12">

<!-- Calendly inline widget begin -->
<div class="calendly-inline-widget" data-url="https://calendly.com/gubatmomsandkidsclinic/gubat-mom-s-kids-clinic?hide_gdpr_banner=1" style="min-width:500px;height:700px; "></div>
<!-- Calendly inline widget end -->


  </div>
</div>
@endsection

@section('vendor-script')

@endsection

@section('page-script')
<!-- Calendly inline widget begin -->
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>

@endsection



