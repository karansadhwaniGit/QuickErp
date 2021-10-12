@extends('layouts.sidebar.sidebar')
@section('content')
<div class="m-2 px-4 py-2 border border-dark rounded">
<form action="{{route('products.store')}}" method="post">
    @csrf
    <h3 class="text-center text-dark">Add Product</h3>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="product_name">Product Name</label>
      <input type="text" class="form-control" name="product_name" id="product_name" placeholder="eg:IVL">
      @error('product_name')
        <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="last_name">Specification</label>
      <input type="text" class="form-control" id="specification" name="specification" placeholder="eg:Mobile">
      @error('specification')
        <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
      @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="hsn">HSN Code</label>
        <select name="hsn" id="hsn" class="form-control">
            <option value="1">123456</option>
            <option value="2">123456</option>
            <option value="3">123456</option>
            <option value="4">123456</option>
        </select>
        @error('hsn')
          <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
        @enderror
    </div>
    {{-- HSN --}}
    <div class="form-group col-md-6">
        <label for="hsn">Suppliers</label>
        <select name="suppliers" id="suppliers" class="form-control">
            @foreach ($suppliers as $supplier)
                <option name="{{$supplier->first_name." ".$supplier->last_name}}" id="{{$supplier->first_name." ".$supplier->last_name}}" value="{{$supplier->first_name." ".$supplier->last_name}}">{{$supplier->first_name." ".$supplier->last_name}}</option>
            @endforeach
        </select>
        @error('suppliers')
          <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
        @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="hsn">Category</label>
        <select name="category" id="category" class="form-control">
            @foreach ($categories as $category)
                <option name="{{$category->name}}" id="{{$category->name}}" value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category')
          <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="company_name">Selling Price</label>
        <input type="selling_price" class="form-control" name="selling_price" id="selling_price" placeholder="Enter Product Price">
        @error('selling_price')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
        @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="eoq"></label>
        <label for="company_name">EOQ Level</label>
        <input type="eoq" class="form-control" name="eoq" id="eoq" placeholder="0">
        @error('eoq')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="danger_level">Danger Level</label>
        <input type="danger_level" class="form-control" name="danger_level" id="danger_level" placeholder="0">
        @error('danger_level')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
        @enderror
    </div>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>
@endsection
