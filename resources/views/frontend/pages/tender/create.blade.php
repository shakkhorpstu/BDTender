@extends('frontend.layouts.master')

@section('content')

  <div class="main-contents mt-2">
    <h3 class="text-center mt-4">Tender Information</h3>
    <form class="" action="{{ route('user.tender.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      @include('frontend.partials.message')
      <div class="form-group">
        <label for="title">Title <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Tender Tilte" value="" required>
      </div>
      <div class="form-row">
        <div class="col-md-6 form-group">
          <label for="category_id">Category <span class="text-danger">*</span></label>
          <select class="form-control" name="category_id" id="category_id" required>
            <option value="">Select Category</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6 form-group">
          <label for="image">Image <span class="text-danger">*</span></label>
          <input type="file" class="form-control" name="image" id="image" required>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-6 form-group">
          <label for="published_on">Published On <span class="text-danger">*</span></label>
          <input type="date" class="form-control" name="published_on" id="published_on" value="" required>
        </div>
        <div class="col-md-6 form-group">
          <label for="closed_on">Closed On <span class="text-danger">*</span></label>
          <input type="date" class="form-control" name="closed_on" id="closed_on" value="" required>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-6 form-group">
          <label for="document_price">Document Price <span class="text-danger">*</span></label>
          <input type="number" class="form-control" name="document_price" id="document_price" value="" required>
        </div>
        <div class="col-md-6 form-group">
          <label for="security_amount">Security Amount <span class="text-danger">*</span></label>
          <input type="number" class="form-control" name="security_amount" id="security_amount" value="" required>
        </div>
      </div>

      <button type="submit" name="button" class="btn btn-success">Submit This</button>
    </form>
  </div>

@endsection
