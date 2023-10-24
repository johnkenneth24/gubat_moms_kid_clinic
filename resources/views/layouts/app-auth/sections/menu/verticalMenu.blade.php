@section('page-style')
    <style>
        .bg-menu-theme .menu-inner>.menu-item.active:before {
            background: #ffff !important;
        }

        .bg-menu-theme .menu-inner>.menu-item.active>.menu-link {
            background-color: rgb(255 255 255 / 20%) !important;
        }

        .bg-menu-theme .menu-inner .menu-text-sidebar, .menu-icon{
            color: #ffff;
        }
    </style>
@endsection


<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="background-color: #696cff !important">
    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo mt-5">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <h4 class=" text-white ml-2 fw-bold text-uppercase ">Gubat Mom's & Kids Clinic</h4>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-autod-block d-xl-none" >
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 mt-5">
        <li class="menu-item {{ !request()->routeIs('dashboard') ?: 'active' }}">
            <a href="{{ route('dashboard') }}" class="{{-- isset($menu->submenu)?'menu-linkmenu-toggle':'menu-link' --}} menu-link">
                <i class="menu-icon tf-icons bx bx-heart{{-- $menu->icon --}}"></i>
                <div class="menu-text-sidebar">{{-- isset($menu->name)?__($menu->name):'' --}}Dashboard</div>
            </a>
        </li>
        {{-- @role('user') --}}
        @role('patient')
            <li class="menu-item {{ !request()->routeIs('appointment.*') ?: 'active' }}">
                <a href="{{ route('appointment.create') }}" class="{{-- isset($menu->submenu)?'menu-linkmenu-toggle':'menu-link' --}} menu-link">
                    <i class="menu-icon tf-icons bx bx-book-bookmark {{-- $menu->icon --}}"></i>
                    <div class="menu-text-sidebar">{{-- isset($menu->name)?__($menu->name):'' --}}Book Appointment</div>
                </a>
            </li>

            <li class="menu-item {{ !request()->routeIs('app-stat.*') ?: 'active' }}">
                <a href="{{ route('app-stat.index') }}" class="{{-- isset($menu->submenu)?'menu-linkmenu-toggle':'menu-link' --}} menu-link">
                    <i class="menu-icon tf-icons bx bx-bookmarks{{-- $menu->icon --}}"></i>
                    <i class='bx bx-objects-horizontal-left'></i>
                    <div class="menu-text-sidebar">{{-- isset($menu->name)?__($menu->name):'' --}}Appointment Status</div>
                </a>
            </li>

            <li class="menu-item {{ !request()->routeIs('med-history.*') ?: 'active' }}">
                <a href="{{ route('med-history.index') }}" class="{{-- isset($menu->submenu)?'menu-linkmenu-toggle':'menu-link' --}} menu-link">
                    <i class="menu-icon tf-icons bx bx-book-content "></i>
                    <div class="menu-text-sidebar">{{-- isset($menu->name)?__($menu->name):'' --}}Medical History</div>
                </a>
            </li>
        @endrole

        @role('staff')
            <li class="menu-item {{ !request()->routeIs('app-request.*') ?: 'active' }}">
                <a href="{{ route('app-request.index') }}" class="{{-- isset($menu->submenu)?'menu-linkmenu-toggle':'menu-link' --}} menu-link">
                    <i class="menu-icon tf-icons bx bx-notepad "></i>
                    <div class="menu-text-sidebar">{{-- isset($menu->name)?__($menu->name):'' --}}Appointment Request</div>
                </a>
            </li>
        @endrole

        @unlessrole('patient')
            <li class="menu-item {{ !request()->routeIs('app-checkup.*', 'walkin-appointment.*') ?: 'active' }}">
                <a href="{{ route('app-checkup.index') }}" class="{{-- isset($menu->submenu)?'menu-linkmenu-toggle':'menu-link' --}} menu-link">
                    <i class="menu-icon tf-icons bx bx-calendar "></i>
                    <div class="menu-text-sidebar">{{-- isset($menu->name)?__($menu->name):'' --}}Appointment Checkup</div>
                </a>
            </li>
        @endunlessrole

        @role('pediatrician')
            <li class="menu-item {{ !request()->routeIs('patient-record.*') ?: 'active' }}">
                <a href="{{ route('patient-record.index') }}" class="{{-- isset($menu->submenu)?'menu-linkmenu-toggle':'menu-link' --}} menu-link">
                    <i class="menu-icon tf-icons bx bx-id-card "></i>
                    <div class="menu-text-sidebar">{{-- isset($menu->name)?__($menu->name):'' --}}Patient Record History</div>
                </a>
            </li>
        @endrole


        @role('staff')
            <li class="menu-item {{ !request()->routeIs('user-list.*') ?: 'active' }}">
                <a href="{{ route('user-list.index') }}" class="{{-- isset($menu->submenu)?'menu-linkmenu-toggle':'menu-link' --}} menu-link">
                    <i class="menu-icon tf-icons bx bx-group "></i>
                    <div class="menu-text-sidebar">{{-- isset($menu->name)?__($menu->name):'' --}}Users List</div>
                </a>
            </li>
        @endrole

    </ul>

</aside>
