@extends('frontend.layouts.master')

@section('content')

  <div class="main-contents mt-2">
    <div class="latest-tenders">
      @include('frontend.partials.message')
      <h2> Tenders:</h2>

      @foreach ($tenderRequests as $tenderRequest)
        <div class="single-tender pointer">
          <div class="card">
            <div class="card-body">
              <h4 class="float-left">{{ $tenderRequest->user->name }}</h4>
              <h4 class="float-right btn btn-primary btn-sm" data-toggle="collapse" data-target="#tender{{ $tenderRequest->id }}"><i class="fa fa-fw fa-chevron-down"></i>Details</h4>
              @if($tenderRequest->approved == 1)
                <a class="float-right btn btn-success btn-sm mr-1">Confirmed</a>
              @else
                <a href="{{ route('user.confirm.tenderRequest', $tenderRequest->id) }}" class="float-right btn btn-success btn-sm mr-1">Confirm This</a>
              @endif
              <div class="clearfix"></div>
              <div class="collapse multi-collapse"  id="tender{{ $tenderRequest->id }}">
                <h4><strong>Designation: </strong> {{ $tenderRequest->user->designation }}</h4>
                <h4><strong>Organization: </strong>{{ $tenderRequest->user->organization }}</h4>
                <h4><strong>Location: </strong>{{ $tenderRequest->user->city }}</h4>
                <h4><strong>Contact Number: </strong>{{ $tenderRequest->user->phone }}</h4>
                <h4><strong>Message: </strong> <br>
                  {{ $tenderRequest->message}}</h4>
              </div>
            </div>
          </div>
        </div> <!-- end .single-tender -->
      @endforeach

    </div>
  </div> <!-- end .main-content -->

@endsection
