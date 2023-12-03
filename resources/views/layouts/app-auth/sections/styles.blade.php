<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> --}}

<!-- Core CSS -->
{{-- <link rel="stylesheet" href="{{ asset('css/core.css') }}" /> --}}
{{-- <link rel="stylesheet" href="{{ asset('css/theme-default.css') }}" /> --}}
{{-- <link rel="stylesheet" href="{{ asset('css/demo.css') }}" /> --}}
{{-- <link rel="stylesheet" href="{{ asset('css/perfect-scrollbar.css') }}" /> --}}

<style>
    .form-control:disabled,
    .form-control[readonly] {
        background-color: #ffffff;
        opacity: 1;
    }

    .modal.show {

        width: 100%;

    }

    .modal {

        width: 100%;

    }
</style>

<!-- Vendor Styles -->
@yield('vendor-style')
<!-- Page Styles -->
@yield('page-style')
