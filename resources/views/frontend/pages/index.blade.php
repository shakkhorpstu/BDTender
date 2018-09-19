@extends('frontend.layouts.master')

@section('content')

  <div class="main-contents mt-2">
    <div class="sliders">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('public/images/sliders/slider1.jpg') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('public/images/sliders/slider2.jpg') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('public/images/sliders/slider3.jpg') }}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div> <!-- end .sliders -->
    <div class="latest-tenders">
      <h2>All Tenders:</h2>

      @foreach($tenders as $tender)
        <div class="single-tender pointer">
          <p class="text-info float-left">
            Published On : {{ $tender->created_at->toFormattedDateString() }}
          </p>
          <p class="float-right">
            <i class="fa fa-user"></i> Visitor: {{ $tender->visitor }}
          </p>
          <div class="clearfix"></div>
          <p class="mt-2"><a href="{{ route('singleTender', $tender->slug) }}"><h4>{{ $tender->title }}</h4></a></p>
          <div class="float-right">
            <a href="" class="btn btn-outline-secondary">Document Price: <span class="price">{{ $tender->document_price }} Taka</span></a>
            <a href="" class="ml-2 btn btn-outline-info">Security Amount: <span class="price">{{ $tender->security_amount }} Taka</span></a>
          </div>
          <div class="clearfix"></div>
          <div class="float-left">
            <p><i class="fa fa-location"></i> {{ $tender->user->city }}</p>
            <p><strong>Opening Date: </strong> {{ $tender->published_on }}</p>
            <p><strong>Submitting Date: </strong> {{ $tender->closed_on }}</p>
          </div>
          <div class="clearfix"></div>
        </div> <!-- end .single-tender -->
      @endforeach
      {{ $tenders->links() }}
    </div>
  </div> <!-- end .main-content -->


@endsection
