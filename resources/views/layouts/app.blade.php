<!DOCTYPE html>
<html lang="en">
  <head>
    <head> 
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- Primary Meta Tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="title" content="">
  <meta name="author" content="Rifqi Rahmadhani Developer">

  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/') }}assets/img/logos.png">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/') }}assets/img/logos.png">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}assets/img/logos.png">
  <link rel="manifest" href="{{ asset('/') }}assets/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="{{ asset('/') }}assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  
  <!-- Sweet Alert -->
  <link type="text/css" href="{{ asset('/') }}vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
  
  <!-- Notyf -->
  <link type="text/css" href="{{ asset('/') }}vendor/notyf/notyf.min.css" rel="stylesheet">
  
  <!-- Volt CSS -->
  <link type="text/css" href="{{ asset('/') }}css/volt.css" rel="stylesheet">
  
  <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
  
    <title>@yield('title')</title>

    {{-- Style --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')

  </head>

  <body>
    <div class="super_container">
  
      {{-- Page Content --}}
      @yield('content')

    
  </div>

    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
  </body>
</html>
