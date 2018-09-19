@extends('frontend.layouts.master')

@section('content')

  <div class="main-contents mt-2">
    <div class="latest-tenders">

      <div class="single-tender-full pointer">
        <div class="card">
          <div class="card-title bg-primary pt-2 pl-2 pb-2 text-white">
            Tender Details
          </div>
          <div class="card-body">
            <p><strong><h4>{{ $tender->title }}</h4></strong></p>
            <p><strong>Document Price: </strong> {{ $tender->document_price }} Taka</p>
            <p><strong>Security Amount: </strong> {{ $tender->security_amount }} Taka</p>
            <p><strong>Published On: </strong> {{ $tender->published_on }} </p>
            <p><strong>Closed On: </strong> {{ $tender->closed_on }} </p>
            <p><strong>Total View: </strong> {{ $tender->visitor }} </p>

            <br>
            <a href="{{ asset('public/images/tenders/'.$tender->image) }}" target="_blank" class="btn btn-primary btn-lg"><i class="fa fa-eye"></i> Show Original Tender Image</a>

            <form class="" action="{{ route('applyForTender', $tender->slug) }}" method="post">
              @csrf
              <div class="form-group mt-3">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control" rows="4" cols="80">
                  Any comments here
                </textarea>
              </div>

              <button type="submit" name="button" class="btn btn-success">Apply For This</button>
            </form>
          </div>
        </div>
      </div> <!-- end .single-tender -->

    </div>
  </div> <!-- end .main-content -->

@endsection
