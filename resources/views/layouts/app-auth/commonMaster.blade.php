<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{url('/')}}" data-framework="laravel" data-template="vertical-menu-laravel-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('title') | Sneat - HTML Laravel Free Admin Template </title>
  <meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
  <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Canonical SEO -->
  <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- Include Styles -->
  @include('layouts/app-auth/sections/styles')

  <!-- Include Scripts for customizer, helper, analytics, config -->
  @include('layouts/app-auth/sections/scriptsIncludes')
</head>

<body>

  <!-- Layout Content -->
  @yield('layoutContent')
  <!--/ Layout Content -->


  <!-- Include Scripts -->
  @include('layouts/app-auth/sections/scripts')

</body>

</html>