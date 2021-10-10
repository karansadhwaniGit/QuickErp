@extends('layouts.sidebar.sidebar')
@section('content')
<div class="m-2 px-4 py-2 border border-dark rounded">
<form>
    <h3 class="text-center text-dark">Add Supplier</h3>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="first_name">First Name</label>
      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="eg:john">
    </div>
    <div class="form-group col-md-6">
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="eg:doe">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="gst_no">GST No.</label>
        <input type="text" class="form-control" id="gst_no" name="gst_no" placeholder="eg:27BAADE1112A2Z5">
      </div>
        <div class="form-group col-md-6">
            <label for="company_name">Company Name</label>
            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="eg:IBM">
      </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="phone_no">Phone No:</label>
      <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="eg:111111111">
    </div>
    <div class="form-group col-md-4">
        <label for="company_name">Gmail</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="eg:john@doe.com">
    </div>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary">Success</button>
  </div>
</form>
</div>
@endsection
