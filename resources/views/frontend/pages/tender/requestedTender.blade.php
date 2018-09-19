@extends('frontend.layouts.master')

@section('content')

  <div class="main-contents mt-2">
    <div class="latest-tenders">
      @include('frontend.partials.message')
      <h2>My Tenders:</h2>

      @foreach ($tenders as $tender)
        <div class="single-tender pointer">
          <p class="text-info float-left">
            Published On : {{ $tender->tender->created_at->toFormattedDateString() }}
          </p>
          <p class="float-right">
            <i class="fa fa-user"></i> Visitor: {{ $tender->tender->visitor }}
          </p>
          <div class="clearfix"></div>
          <p class="mt-2"><a href="{{ route('singleTender', $tender->tender->slug) }}"><h4>{{ $tender->tender->title }}</h4></a></p>
          <div class="float-right">
            <a href="" class="btn btn-outline-secondary">Document Price: <span class="price">{{ $tender->tender->document_price }} Taka</span></a>
            <a href="" class="ml-2 btn btn-outline-info">Security Amount: <span class="price">{{ $tender->tender->security_amount }} Taka</span></a>
          </div>
          <div class="clearfix"></div>
          <div class="float-left">
            <p><i class="fa fa-location"></i> {{ $tender->tender->user->city }}</p>
            <p><strong>Opening Date: </strong> {{ $tender->tender->published_on }}</p>
            <p><strong>Submitting Date: </strong> {{ $tender->tender->closed_on }}</p>
          </div>
          @if($tender->tender->status == 0)
            <a class="btn btn-sm btn-primary float-right mt-3" href="{{ route('compeletdTender', $tender->tender->slug) }}"><i class="fa fa-fw fa-edit"></i>Complete This</a>
          @else
            <a class="btn btn-sm btn-success float-right mt-3">Completed</a>
          @endif
          <a href="{{ asset('public/images/tenders/'.$tender->tender->image) }}" target="_blank" class="btn btn-sm btn-primary float-right mt-3 mr-1"><i class="fa fa-fw fa-eye"></i>View Image</a>
          @if($tender->approved == 1)
            <a class="btn btn-sm btn-success float-right mt-3 mr-1">Confirmed By Tenderer</a>
          @else
            <a href="btn btn-sm btn-primary float-right mt-3 mr-1">Pending</a>
          @endif
          <div class="clearfix"></div>
        </div> <!-- end .single-tender -->
      @endforeach

    </div>
  </div> <!-- end .main-content -->

@endsection
