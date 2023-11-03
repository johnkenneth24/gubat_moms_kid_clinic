<!-- BEGIN: Vendor JS-->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/cjs/popper.js"
    integrity="sha512-InknX/JMP6YrSsTxkV6/iy8p0OIdDH1cF3P9KuKlLkke7ENUd4dbt93N7Q7Yn58msIz6akmh1egFCoLheMEkEg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src="{{ asset('js/jquery.js') }}"></script> --}}
{{-- <script src="{{ asset('js/popper.js') }}"></script> --}}
{{-- <script src="{{ asset('js/sweetalert2/sweetalert2.js')) }}"></script> --}}
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('js/menu.js') }}"></script>
{{-- <script src="{{ asset('vendor/js/menu.js')) }}"></script> --}}

@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset('js/main.js') }}"></script>
<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@stack('page-script')
<!-- END: Page JS-->
