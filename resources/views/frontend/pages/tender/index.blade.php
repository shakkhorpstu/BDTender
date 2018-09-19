@extends('frontend.layouts.master')

@section('content')

  <div class="main-contents mt-2">
    <div class="latest-tenders">
      @include('frontend.partials.message')
      <h2>My Tenders:</h2>

      @foreach ($tenders as $tender)
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
          <a class="btn btn-sm btn-danger float-right mt-3 ml-1" data-toggle="modal" data-target="#deleteModal{{ $tender->id }}"><i class="fa fa-fw fa-edit"></i>Delete This</a>
          <a class="btn btn-sm btn-success float-right mt-3" data-toggle="modal" data-target="#editModal{{ $tender->id }}"><i class="fa fa-fw fa-edit"></i>Edit This</a>
          <a href="{{ asset('public/images/tenders/'.$tender->image) }}" target="_blank" class="btn btn-sm btn-primary float-right mt-3 mr-1"><i class="fa fa-fw fa-eye"></i>View Image</a>
          <a href="{{ route('user.tender.tenderApply', $tender->slug) }}" class="btn btn-sm btn-success float-right mt-3 mr-1">Apply <span class="badge badge-success">{{ \App\Models\TenderRequest::where('tender_id', $tender->id)->count() }}</span></a>
          <div class="clearfix"></div>
        </div> <!-- end .single-tender -->
        {{-- Edit Modal --}}
        <div class="modal fade" id="editModal{{ $tender->id }}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Tender</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" action="{{ route('user.tender.update', $tender->slug) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @include('frontend.partials.message')
                  <div class="form-group">
                    <label for="title">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Tender Tilte" value="{{ $tender->title }}" required>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <label for="category_id">Category <span class="text-danger">*</span></label>
                      <select class="form-control" name="category_id" id="category_id" required>
                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}" {{ ($category->id == $tender->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="image">Image <span class="text-danger">*</span></label>
                      <input type="file" class="form-control" name="image" id="image">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <label for="published_on">Published On <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="published_on" id="published_on" value="{{ $tender->published_on }}" required>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="closed_on">Closed On <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="closed_on" id="closed_on" value="{{ $tender->closed_on }}" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <label for="document_price">Document Price <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="document_price" id="document_price" value="{{ $tender->document_price }}" required>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="security_amount">Security Amount <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="security_amount" id="security_amount" value="{{ $tender->security_amount }}" required>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Tender</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Delete Modal-->
        <div class="modal fade" id="deleteModal{{ $tender->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this tender ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Please confirm if you want to delete</div>
              <div class="modal-footer">
                <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                <form class="" action="{{ route('user.tender.delete', $tender->id) }}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Confirm</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div> <!-- end .main-content -->

@endsection
