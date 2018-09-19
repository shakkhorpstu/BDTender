<!-- Top Nav   -->
<div class="top-nav">
  <div class="container">
    <ul class="float-right">
      @if(Auth::guard('web')->check())
        <li><a href="{{ route('user.logout') }}" class="btn btn-info btn-my-sm" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
          @csrf
        </form></li>
      @else
        <li><a href="{{ route('registerUserForm') }}" class="btn btn-info btn-my-sm">Sign Up Now</a></li>
        <li><a href="{{ route('user.login') }}" class="btn btn-info btn-my-sm">Login</a></li>
      @endif
    </ul>
    <div class="clearfix"></div>
  </div>
</div>


<!-- Site Title + Header -->
<div class="site-header">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <img src="{{ asset('public/images/logo.png') }}" class="img img-fluid">
      </div>
      <div class="col-md-9">
        <div class="social float-right">
          <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-youtube text-danger" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-google-plus-official" aria-hidden="true"></i></a>
        </div>
        <div class="clearfix"></div>
      </div>
    </div> <!-- end .row -->

  </div>
</div>
<!-- Site Title + Header -->


<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-light main-navbar">
  <div class="container">
    <a class="navbar-brand" href="#"><i class="fa fa-home"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('index') }}">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('allTender') }}">All Tenders</a>
        </li>
        @if(Auth::guard('web')->check())
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              My Tenders
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              @if(Auth::guard('web')->user()->account_role == 'tenderer')
                <a class="dropdown-item" href="{{ route('user.tender.index') }}">Tenders </a>
                <a class="dropdown-item" href="{{ route('user.tender.create') }}">Add Tender</a>
              @elseif(Auth::guard('web')->user()->account_role == 'contractor')
                <a class="dropdown-item" href="{{ route('user.tender.index') }}">Tenders </a>
              @endif
            </div>
          </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Tender Categoris
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Category 1</a>
            <a class="dropdown-item" href="#">Another category</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>

      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </li>
      </ul>

    </div>
  </div>
</nav>
<!-- End Main Navbar -->
