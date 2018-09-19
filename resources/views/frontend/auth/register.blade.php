@extends('frontend.layouts.master')

@section('content')

  <div class="container">
    <div class="col-md-12 mt-5">
      <div class="card">
        <div class="card-body">

          @include('frontend.partials.message')

          <form class="" action="{{ route('registerUser') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h4 class="text-center mb-4">Register Yourself</h4>
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="name">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" placeholder="eg. Moshiur Rahman" value="" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="account_role">Account Role <span class="text-danger">*</span></label>
                <select class="form-control" name="account_role" id="account_role" required>
                  <option value="">Select Account Role</option>
                  <option value="contractor">Contructor</option>
                  <option value="tenderer">Tenderer</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" class="form-control" placeholder="eg. example@gmail.com" value="" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="phone">Phone <span class="text-danger">*</span></label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="eg. 01756553048" value="" required>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="designation">Designation <span class="text-danger">*</span></label>
                <input type="text" name="designation" id="designation" class="form-control" placeholder="eg. Account Officer" value="" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="organization">Organization <span class="text-danger">*</span></label>
                <input type="text" name="organization" id="organization" class="form-control" placeholder="eg. BDREN" value="" required>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="city">City <span class="text-danger">*</span></label>
                <input type="text" name="city" id="city" class="form-control" placeholder="eg. Dhaka" value="" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="address">Address <span class="text-danger">*</span></label>
                <input type="text" name="address" id="address" class="form-control" placeholder="eg. Mirpur" value="" required>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="password">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" value="" required>
              </div>
            </div>

            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="image" id="image" value="">
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
