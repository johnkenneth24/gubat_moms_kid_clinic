<!-- BEGIN: Vendor JS-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> --}}
{{-- <script src="{{ asset('js/popper.js') }}"></script> --}}
{{-- <script src="{{ asset('js/jquery.js') }}"></script> --}}
{{-- <script src="{{ asset('js/popper.js') }}"></script> --}}
{{-- <script src="{{ asset('js/sweetalert2/sweetalert2.js')) }}"></script> --}}
{{-- <script src="{{ asset('js/bootstrap.js') }}"></script> --}}
{{-- <script src="{{ asset('js/perfect-scrollbar.js') }}"></script> --}}
{{-- <script src="{{ asset('js/menu.js') }}"></script> --}}
{{-- <script>
    function toggleMenu() {
        var menu = document.getElementById("layout-menu");
        menu.classList.toggle("menu-hidden");
    }
</script> --}}
{{-- <script src="{{ asset('vendor/js/menu.js')) }}"></script> --}}

@yield('vendor-script')
@stack('page-script')
<!-- END: Page JS-->
