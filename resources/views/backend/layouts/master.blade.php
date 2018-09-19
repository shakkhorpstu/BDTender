<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Tender | Admin</title>
  <meta name="description" content="Tender | Admin">

  <!-- Bootstrap CSS -->
  <link href="{{ asset('public/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- Font Awesome CSS -->
  <link href="{{ asset('public/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="{{ asset('public/css/admin/datatable/datatable.min.css') }}">

  <!-- Custom CSS -->
  <link href="{{ asset('public/css/admin/style.css') }}" rel="stylesheet" type="text/css" />

  @yield('stylesheets')

</head>

<body class="adminbody">

  <div id="main">
    @include('backend.partials.nav')

    @include('backend.partials.sidebar')

    <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          @section('content')
          @show
        </div>
      </div>
    </div>
    @include('backend.partials.footer')
  </div>


  <script src="{{ asset('public/js/jquery/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('public/js/admin/popper.min.js') }}"></script>
  <script src="{{ asset('public/js/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('public/js/admin/pikeadmin.js') }}"></script>
  <script src="{{ asset('public/js/admin/datatable/jquery-datatable.min.js') }}"></script>
  <script src="{{ asset('public/js/admin/datatable/bootstrap-datatable.min.js') }}"></script>
  <script>
  $(document).ready(function() {
    $('#admin-data-table').DataTable();
  } );
  </script>

  @yield('scripts')

</body>
</html>
