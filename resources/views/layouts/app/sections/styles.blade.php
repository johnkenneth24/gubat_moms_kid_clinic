<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

{{-- <link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/boxicons.css') }}" /> --}}
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('css/core.css') }}" />
<link rel="stylesheet" href="{{ asset('css/theme-default.css') }}" />
<link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

<link rel="stylesheet" href="{{ asset('css/perfect-scrollbar.css') }}" />

<!-- Vendor Styles -->
@yield('vendor-style')
<!-- Page Styles -->
@yield('page-style')
