@php
    /* Display elements */
    $contentNavbar = true;
    $containerNav = $containerNav ?? 'container-xxl';
    $isNavbar = $isNavbar ?? true;
    $isMenu = $isMenu ?? true;
    $isFlex = $isFlex ?? false;
    $isFooter = $isFooter ?? true;
    $customizerHidden = $customizerHidden ?? '';
    $pricingModal = $pricingModal ?? false;

    /* HTML Classes */
    $navbarDetached = 'navbar-detached';

    /* Content classes */
    $container = $container ?? 'container-xxl';

    $containerNav = $containerNav ?? 'container-fluid';
    $navbarDetached = $navbarDetached ?? '';

@endphp

@if (isset($navbarDetached) && $navbarDetached == 'navbar-detached')
    <nav class="layout-navbar {{ $containerNav }} navbar navbar-expand-xl {{ $navbarDetached }} align-items-center bg-navbar-theme"
        id="layout-navbar">
@endif
@if (isset($navbarDetached) && $navbarDetached == '')
    <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="{{ $containerNav }}">
@endif

<div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

    <ul class="navbar-nav flex-row align-items-center ms-auto">

        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar ">
                    @if (auth()->user()->gender == 'Male')
                        <img src="{{ asset('assets/img/undraw_male_avatar_g98d.svg') }}" alt
                            class="w-px-40 h-auto rounded-circle">
                    @else
                        <img src="{{ asset('assets/img/undraw_female_avatar_efig.svg') }}" alt
                            class="w-px-40 h-auto rounded-circle">
                    @endif
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="javascript:void(0);">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    @if (auth()->user()->gender == 'Male')
                                        <img src="{{ asset('assets/img/undraw_male_avatar_g98d.svg') }}" alt
                                            class="w-px-40 h-auto rounded-circle">
                                    @else
                                        <img src="{{ asset('assets/img/undraw_female_avatar_efig.svg') }}" alt
                                            class="w-px-40 h-auto rounded-circle">
                                    @endif
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">{{ auth()->user()->firstname }}</span>
                                @php
                                    $role = auth()
                                        ->user()
                                        ->roles()
                                        ->first();
                                @endphp
                                <small class="text-muted">{{ ucfirst($role->name) }}</small>

                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a href="{{ route('user-management.view', auth()->user()->id) }}" class="dropdown-item"
                        href="javascript:void(0);">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                    </a>
                </li>

                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('auth.logout') }}">
                        <i class='bx bx-power-off me-2'></i>
                        <span class="align-middle">Log Out</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>

@if (!isset($navbarDetached))
    </div>
@endif
</nav>
