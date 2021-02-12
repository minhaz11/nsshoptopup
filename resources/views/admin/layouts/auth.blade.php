
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Game {{ $title??'' }}</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('public/assets/admin/img/brand/favicon.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('public/assets/admin') }}/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{ asset('public/assets/admin') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="{{ asset('public/assets/admin') }}/css/main.css" type="text/css">
  @stack('css-lib')
  @stack('css')
</head>

<body class="bg-default">

  <div class="main-content" id="panel">

    @yield('content')

  </div>



 <script src="{{ asset('public/assets/admin') }}/vendor/jquery/dist/jquery.min.js"></script>
 <script src="{{asset('public/assets/admin/js/sweetalert.js')}}"></script>
 <script src="{{ asset('public/assets/admin') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
 <script src="{{ asset('public/assets/admin') }}/vendor/js-cookie/js.cookie.js"></script>
 <script src="{{ asset('public/assets/admin') }}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
 <script src="{{ asset('public/assets/admin') }}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
 <!-- Optional JS -->
 <script src="{{ asset('public/assets/admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
 <script src="{{ asset('public/assets/admin') }}/vendor/chart.js/dist/Chart.extension.js"></script>
 <!-- Argon JS -->
 <script src="{{ asset('public/assets/admin') }}/js/argon.js?v=1.2.0"></script>

 @stack('js-lib')
 @stack('js')
 @include('alert.success')
 @include('alert.error')
 @include('alert.errors')
</body>

</html>
