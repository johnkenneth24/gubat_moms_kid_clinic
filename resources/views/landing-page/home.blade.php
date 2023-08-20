@extends('layouts/blankLayout')

@section('title', 'Gubat Mom\'s & Kids Clinic')

@section('page-style')
    <style>
        .navbar-collapse {
            flex-grow: 0 !important;
        }

        nav {
            background-color: #F5F5F9;
            transition: box-shadow 0.3s ease;
        }

        .navbar-shadow {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        ul li a {
            color: #373737 !important;
            font-size: 1.1rem;
            font-weight: bold;
            margin-left: 10px;
            transition: color 1.5s cubic-bezier(0.215, 0.61, 0.355, 1);
        }

        ul li a:hover {
            color: #b60404 !important;
        }

        #home {
            height: 90vh;
        }

        #schedule,
        #about {
            height: 85vh;
        }

        #particles-js {
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 1800px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 50% 50%;
        }
    </style>
@endsection

@section('content')
    <div id="particles-js"></div>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark" id="navigation">
        <div class="container-fluid ms-5 me-5">
            <a class="navbar-brand" href="#home">
                <h1 class="mb-0" style="color: #b60404; font-weight: bolder; font-size: 1.7rem;"><img
                        src="{{ asset('assets/img/logo.png') }}" alt="" height="50px">Gubat Mom's & Kid's Clinic</h1>
            </a>
            <button class="navbar-toggler text-warning" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#schedule">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Log In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <section id="home">
            <div class="container mt-2 align-middle">
                <div class="row" style="height: 500px;">
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="banner-text">
                            <h3 style="font-size: 3rem; color:#0451b6; font-weight: 700;">Welcome to Gubat Mom's & Kid's
                                Clinic!</h3>
                            <p style="color: #000000; font-size: 15px; text-align: justify;">Lorem ipsum,
                                dolor sit amet consectetur adipisicing
                                elit. Eius ut mollitia fugiat omnis, voluptatibus, doloribus provident soluta et similique
                                voluptate, autem aliquid esse voluptas dolorem repellat sit temporibus. Sapiente,
                                architecto.</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-center ">
                        <div class="banner-image text-center">
                            <img class="mb-3" src="{{ asset('assets/img/ped1.png') }}" alt="" height="250">
                            <h3 class="text-uppercase mb-2" style="color:#373737 ;">Dr. Geraldine Gay E. Frilles</h3>
                            <p style="font-size: 30px; color:#0451b6; font-weight: 500;">Pediatrician</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="schedule">
            <div class="container">
                <div class="row">
                    <h4 style="color: #0451b6">Appointment Schedule</h4>
                </div>
                <div class="row pt-5">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title text-center" style="color: #373737">CLINIC SCHEDULE</h5>
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/sched-img.svg') }}" alt="" height="130">
                                </div>
                                <p class="card-text mt-3 mb-1" style="color: #373737; font-weight: 700;">
                                    Monday/Wednesday/Friday</p>
                                <p class="card-text">9:00 AM - 12:00 NN</p>
                                <p class="card-text mt-3 mb-1" style="color: #373737; font-weight: 700;">
                                    Tuesday/Thursday/Saturday</p>
                                <p class="card-text">1:00 PM - 4:00 PM</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase text-center" style="color: #373737">Vaccination & Baby
                                    Check-up
                                </h5>
                                {{-- <h6 class="card-subtitle text-muted">Check up</h6> --}}
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/preg-img.svg') }}" alt="" height="130">
                                </div>
                                <p class="card-text mt-3 mb-1" style="color: #373737; font-weight: 700;">Wednesday</p>
                                <p class="card-text">9:00 AM - 12:00 NN</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase text-center" style="color: #373737">Consultation</h5>
                                {{-- <h6 class="card-subtitle text-muted">Check up</h6> --}}
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/cons-img.svg') }}" alt="" height="130">
                                </div>
                                <p class="card-text mt-3 mb-1" style="color: #373737; font-weight: 700;">Monday/Friday</p>
                                <p class="card-text">9:00 AM - 4:00 PM</p>
                                <p class="card-text mt-3 mb-1" style="color: #373737; font-weight: 700;">
                                    Tuesday/Thursday/Saturday</p>
                                <p class="card-text">1:00 PM - 4:00 PM</p>
                                <p class="card-text mt-3 mb-1" style="color: #373737; font-weight: 700;">Wednesday</p>
                                <p class="card-text">9:00 AM - 12:00 NN</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="about">
            <div class="container">
                <div class="row">
                    <h4 class="mb-3" style="color: #0451b6">About Us</h4>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="about-text">
                            <p style="text-align: justify; text-indent: 50px;">Welcome to Gubat Mom's and Kid's Clinic! We
                                are a family
                                owned and
                                operated clinic that provides comprehensive care for children and their families. We offer a
                                range of services, including vaccinations, well-baby check-ups, and consultations. Our
                                knowledgeable and experienced staff strive to provide the highest quality of care in a
                                comfortable and
                                welcoming environment. Our goal is to ensure your children receive the best possible care to
                                keep them healthy and happy. We look forward to seeing you at Gubat Mom's and Kid's Clinic.
                            </p>
                            <p style="color: #0451b6"><i class="bi bi-telephone-fill"></i> 09123456789</p>
                            <p style="color: #0451b6"><i class="bi bi-envelope-at-fill"></i>
                                gubat_momkidsclinic@mail.com</p>
                            <p style="color: #0451b6"><i class="bi bi-pin-map-fill"></i> Manook St. Gubat Sorsogon</p>
                        </div>
                        <div class="about-map mb-5" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7777.672029723866!2d124.11865916583128!3d12.91825909572856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a0ebf501da93b7%3A0xf7ac94d2b82eb16a!2sManook%20St.%20Brgy%20Manook%2C%20Gubat%20Sorsogon!5e0!3m2!1sen!2sph!4v1692373146978!5m2!1sen!2sph&hl=en&output=embed&z=18"
                                width="531" height="300" style="border:0;" allowfullscreen=""
                                loading="lazy"></iframe>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <div class="about-img">
                            <img class="ms-5" src="{{ asset('assets/img/about1.png') }}" alt=""
                                height="400">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/particles.js-master/particles.js') }}"></script>
    <script src="{{ asset('assets/js/particles.js') }}"></script>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navigation');
            if (window.scrollY > 0) {
                navbar.classList.add('navbar-shadow');
            } else {
                navbar.classList.remove('navbar-shadow');
            }
        });
    </script>

@endsection
