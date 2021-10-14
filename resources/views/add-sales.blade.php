@extends('layouts.sidebar.sidebar')
@section('content')
<div class="m-2 px-4 py-2 border border-dark rounded">
    <div class="card-heading">
        <h3 class="text-primary">+ Add Sales</h3>
    </div>
    <hr>
    <form class="form-inline">
        <label for="" class="text-primary"><h6><i class="fa fa-user"></i> Customer Email &nbsp;</h6></label>
        <label class="sr-only" for="inlineFormInputName2">Name</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">
        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
        <div class="input-group mb-2 mr-sm-2">
          <div class="input-group-prepend">
            <div class="input-group-text">@</div>
          </div>
          <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
      </form>
      <hr>
      <div class="">
        <form class="form-inline w-100">
            <select name="" id="categories" onchange="myFunction()" class="form-control mx-2" style="font-size:18px">
                @foreach ($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
            </select>
            <select name="" id="products" class="form-control mx-2" style="font-size:18px">
                <option value="">Product</option>
                <option value="">Abcd</option>
                <option value="">Abcd</option>
                <option value="">Abcd</option>
                <option value="">Abcd</option>
            </select>
            <input type="text" name="selling_price" class="form-control mr-1" id="selling_price" placeholder="Selling Price">
            <input type="text" name="quantity" class="form-control mr-1" id="quantity" placeholder="Quantity">
            <input type="text" name="discount" class="form-control mr-1" id="discount" placeholder="discount">
            <input type="text" name="total" class="form-control " id="total" placeholder="Total" readonly>
            <button type="submit" class="btn btn-danger ml-1 "><i class="fa fa-trash"></i></button>
          </form>
      </div>
    </div>
    <script>
        function myFunction(){
            alert((document.getElementById('categories')).value);
            
        }
    </script>
@endsection
