<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo mt-5">
    <a href="{{route('dashboard')}}" class="app-brand-link">
      <img src="{{ asset('assets/img/logo.svg') }}" height="50" alt="">
      <span class=" text-primary ml-2 fw-bold">Gubta Mom's & Kids <br> Clinic</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-autod-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1 mt-5">
    <li class="menu-item active">
      <a href="{{ route('dashboard') }}{{-- isset($menu->url)?url($menu->url):'javascript:void(0);' --}}" class="{{-- isset($menu->submenu)?'menu-linkmenu-toggle':'menu-link' --}} menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle{{-- $menu->icon --}}"></i>
        <div>{{-- isset($menu->name)?__($menu->name):'' --}}Dashboard</div>
      </a>
    </li>

    <li class="menu-item ">
      <a href="{{ route('dashboard') }}{{-- isset($menu->url)?url($menu->url):'javascript:void(0);' --}}" class="{{-- isset($menu->submenu)?'menu-linkmenu-toggle':'menu-link' --}} menu-link">
        <i class="menu-icon tf-icons bx bx-book-bookmark {{-- $menu->icon --}}"></i>
        <div>{{-- isset($menu->name)?__($menu->name):'' --}}Book Appointment</div>
      </a>
    </li>

    <li class="menu-item ">
      <a href="{{ route('dashboard') }}{{-- isset($menu->url)?url($menu->url):'javascript:void(0);' --}}" class="{{-- isset($menu->submenu)?'menu-linkmenu-toggle':'menu-link' --}} menu-link">
        <i class="menu-icon tf-icons bx bx-bookmarks{{-- $menu->icon --}}"></i>
        <i class='bx bx-objects-horizontal-left'></i>
        <div>{{-- isset($menu->name)?__($menu->name):'' --}}Appointment Status</div>
      </a>
    </li>

    <li class="menu-item ">
      <a href="{{ route('dashboard') }}{{-- isset($menu->url)?url($menu->url):'javascript:void(0);' --}}" class="{{-- isset($menu->submenu)?'menu-linkmenu-toggle':'menu-link' --}} menu-link">
        <i class="menu-icon tf-icons bx bx-book-content "></i>
        <div>{{-- isset($menu->name)?__($menu->name):'' --}}Medical History</div>
      </a>
    </li>


  </ul>

</aside>


