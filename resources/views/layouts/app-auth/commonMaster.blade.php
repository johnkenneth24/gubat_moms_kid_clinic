<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>
    <meta name="description"
        content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
    <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.svg') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-default.css') }}">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

        :root {
            --header-height: 3rem;
            --nav-width: 75px;
            --first-color: #696cff;
            --first-color-light: #AFA5D9;
            --white-color: #F7F6FB;
            --body-font: 'Nunito', sans-serif;
            --normal-font-size: 1rem;
            --z-fixed: 100
        }

        *,
        ::before,
        ::after {
            box-sizing: border-box
        }

        body {
            position: relative;
            margin: var(--header-height) 0 0 0;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s
        }

        a {
            text-decoration: none
        }

        .header {
            width: 100%;
            height: var(--header-height);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: var(--white-color);
            z-index: var(--z-fixed);
            transition: .5s
        }

        .header_toggle {
            color: var(--first-color);
            font-size: 1.5rem;
            cursor: pointer
        }

        .header_img {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden
        }

        .header_img img {
            width: 40px
        }

        .l-navbar {
            position: fixed;
            top: 0;
            left: -30%;
            width: var(--nav-width);
            height: 100vh;
            background-color: var(--first-color);
            padding: .5rem 1rem 0 0;
            transition: .5s;
            z-index: var(--z-fixed);
            margin: 0;
        }

        .l-navbar:not(.show) .nav_name {
            display: none;
        }

        .nav {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden
        }

        .nav_logo,
        .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            padding: .5rem 0 .5rem 1.5rem
        }

        .nav_logo {
            margin-bottom: 2rem;
            padding: 8px 7px 7px 9px;
        }

        .nav_logo-icon {
            font-size: 1.25rem;
            color: var(--white-color)
        }

        .nav_logo-name {
            color: var(--white-color);
            font-weight: 700
        }

        .nav_link {
            position: relative;
            color: #fbfafd;
            margin: 1px 4px 1px 4px;
            transition: .3s;
        }

        .nav_link:hover {
            color: var(--white-color);
            background-color: var(--first-color-light);
            border-radius: 4px;
        }

        .active {
            color: var(--white-color);
            background-color: #d2d0e0;
            margin: 1px 4px 1px 4px;
            border-radius: 4px;
        }

        .nav_icon {
            font-size: 1.25rem;
            margin-right: 1rem;
        }

        .show {
            left: 0
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 1rem)
        }

        .active::before {
            content: '';
            position: absolute;
            left: 0;
            width: 2px;
            height: 32px;
            background-color: var(--white-color)
        }

        .height-100 {
            height: 100vh
        }

        @media screen and (min-width: 768px) {
            body {
                margin: calc(var(--header-height) + 1rem) 0 0 0;
                padding-left: calc(var(--nav-width) + 2rem)
            }

            .header {
                height: calc(var(--header-height) + 1rem);
                padding: 0 0 0 calc(var(--nav-width) + 0.5rem);
            }

            .header_img {
                width: 40px;
                height: 40px
            }

            .header_img img {
                width: 45px
            }

            .l-navbar {
                left: 0;
                padding: 1rem 0 0 0
            }

            .show {
                width: calc(var(--nav-width) + 156px)
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px)
            }
        }

        body::-webkit-scrollbar {
            display: none;
        }

        .unselectable-date {
            background-color: rgb(211, 211, 211);
            color: #eea0a0;
        }

        .remaining-slots {
            font-style: italic;
            font-weight: normal;
        }

        .form-check-label {
            font-weight: bold;
        }

        @media (min-width: 992px) {
            .modal-lg {
                max-width: 80%;
                margin: 1.75rem auto;
            }
        }

        .modal-backdrop {
            width: 100%;
        }
    </style>

    @yield('vendor-style')
    @yield('page-style')
</head>

<body id="body-pd">
    <header class="header" id="header">
        @include('layouts.app-auth.sections.navbar.navbar')
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="{{ route('dashboard') }}" class="nav_logo">
                    <img src="{{ asset('assets/img/logo.svg') }}" alt="" class="nav_icon"
                        style="padding-left: 0;" height="50">
                    <span class="nav_logo-name text-center">Gubat Mom's <br> & Kids
                        Clinic</span> </a>
                <div class="nav_list">
                    <a href="{{ route('dashboard') }}"
                        class="nav_link {{ !request()->routeIs('dashboard') ?: 'active' }}">
                        <i class='bx bx-heart nav_icon' title="Dashboard"></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    @role('patient')
                        <a href="{{ route('appointment.create') }}"
                            class="nav_link {{ !request()->routeIs('appointment.*') ?: 'active' }}">
                            <i class='bx bx-book-bookmark nav_icon' title="Book Appintment"></i>
                            <span class="nav_name">Book Appointment</span>
                        </a>
                        <a href="{{ route('app-stat.index') }}"
                            class="nav_link {{ !request()->routeIs('app-stat.*') ?: 'active' }}">
                            <i class='bx bx-bookmarks nav_icon' title="Appointment Status"></i>
                            <span class="nav_name">Appointment Status</span>
                        </a>
                        <a href="{{ route('med-history.index') }}"
                            class="nav_link {{ !request()->routeIs('med-history.*') ?: 'active' }}">
                            <i class='bx bx-book-content nav_icon' title="Medical History"></i>
                            <span class="nav_name">Medical History</span>
                        </a>
                    @endrole
                    @role('staff')
                        <a href="{{ route('app-request.index') }}"
                            class="nav_link {{ !request()->routeIs('app-request.*') ?: 'active' }}">
                            <i class='bx  bx-notepad nav_icon' title="Appointment Request"></i>
                            <span class="nav_name">Appointment Request</span>
                        </a>
                    @endrole
                    @unlessrole('patient')
                        <a href="{{ route('app-checkup.index') }}"
                            class="nav_link {{ !request()->routeIs('app-checkup.*', 'walkin-appointment.*') ?: 'active' }}">
                            <i class='bx  bx-calendar nav_icon' title="Appointment Checkup"></i>
                            <span class="nav_name">Appointment Checkup</span>
                        </a>
                    @endunlessrole
                    @role('pediatrician')
                        <a href="{{ route('patient-record.index') }}"
                            class="nav_link {{ !request()->routeIs('patient-record.*') ?: 'active' }}">
                            <i class='bx  bx-id-card nav_icon' title="Patient Record"></i>
                            <span class="nav_name">Patient Record History</span>
                        </a>
                        <a href="{{ route('report.index') }}"
                            class="nav_link {{ !request()->routeIs('report.*') ?: 'active' }}">
                            <i class='bx  bx-id-card nav_icon' title="Summary of Records"></i>
                            <span class="nav_name">Summary of Records</span>
                        </a>
                    @endrole
                    @role('staff')
                        <a href="{{ route('user-list.index') }}"
                            class="nav_link {{ !request()->routeIs('user-list.*') ?: 'active' }}">
                            <i class='bx  bx-group nav_icon' title="Users List"></i>
                            <span class="nav_name">Users List</span>
                        </a>
                    @endrole

                </div>
            </div>
        </nav>
    </div>

    <div class="content-wrapper">
        <div class="flex-grow-1 p-0 container-p-y">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    @yield('vendor-script')
    @stack('page-script')

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        nav.classList.toggle('show')
                        toggle.classList.toggle('bx-x')
                        bodypd.classList.toggle('body-pd')
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }

            linkColor.forEach(l => l.addEventListener('click', colorLink))

        });
    </script>
</body>

</html>
