<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard &mdash; My Rooms</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('modules/fontawesome/css/all.min.css') }}">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('modules/weathericons/css/weather-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('modules/weathericons/css/weather-icons-wind.min.css') }}">
  <link rel="stylesheet" href="{{ asset('modules/summernote/dist/summernote-bs4.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  {{-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> --}}
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('layouts.navbar')

      @include('layouts.sidebar')
      <!-- Main Content -->
      @yield('section')
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div> Design By <a href="https://www.instagram.com/dindafris_/">Dinda Friska Oktaviana</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script type="text/javascript" src="{{ asset('modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->

  <script src="{{ asset('modules/simpleweather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('modules/chart.min.js') }}"></script>
  <script src="{{ asset('modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('modules/summernote/dist/summernote-bs4.js') }}"></script>
  <script src="{{ asset('modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  {{-- <script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> --}}
  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/index-0.js') }}"></script>
</body>
</html>
