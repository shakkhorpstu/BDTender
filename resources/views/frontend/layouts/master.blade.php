<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Tender @yield('head-title')</title>

  <link rel="stylesheet" href="{{ asset('public/css/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/css/custom/main.css') }}">

  @section('stylesheets')
  @show
</head>

<body>
  @include('frontend.partials.navbar')
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        @include('frontend.partials.left_sidebar')
      </div>

      <div class="col-md-6">
        @section('content')
        @show
      </div> <!-- end .col-md-6 -->

      <div class="col-md-3">
        @include('frontend.partials.right_sidebar')
      </div>
    </div>
  </div>
  <!-- End Main Page Contents -->


  @include('frontend.partials.footer')


  <script type="text/javascript" src="{{ asset('public/js/jquery/jquery-3.3.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/js/jquery/jquery-easing.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/js/bootstrap/popper.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/js/bootstrap/bootstrap.min.js') }}"></script>
</body>
</html>
