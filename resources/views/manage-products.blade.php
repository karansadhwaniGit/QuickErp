@extends('layouts.sidebar.sidebar')
@section('content')
<div class="card text-center mx-3 my-3 p-2 shadow">
    <div class="row">
        <div class="col-md-12">
            <form>
                <div class="form-row form-inline">
                    <label for="" class="text-primary">Search</label>
                    <div class="p-3">
                      <input type="text" class="form-control" placeholder="Search.....">
                    </div>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="options" id="option1" autocomplete="off" checked> CSV
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="option2" autocomplete="off"> PDF
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="option3" autocomplete="off"> Excel
                        </label>
                      </div>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="">show&nbsp;<select name="manage-product-table_length" aria-controls="manage-product-table" class="custom-select custom-select-sm form-control form-control-sm"><option value="5">5</option><option value="15">15</option><option value="25">25</option><option value="-1">All</option></select>&nbsp;entries</label></div>
                </form>
        </div>
        <div class="col-md-1">
        </div>
    </div>
    <table class="table table-hover table-responsive" >
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Specification</th>
            <th scope="col">Quantity</th>
            <th scope="col">Selling Rate</th>
            <th scope="col">WEF</th>
            <th scope="col">Category</th>
            <th scope="col">EOQ</th>
            <th scope="col">Danger Level</th>
            <th scope="col">Supplier Names</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($products as $product )
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->specification}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->selling_rate}}</td>
                    <td>{{$product->selling_rate}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->eoq}}</td>
                    <td>{{$product->danger_level}}</td>
                    <td>{{$product->actions}}</td>
                    <td>
                        <div class="btn btn-danger color-white"><i class="fa fa-trash"></i></div>
                        <div class="btn btn-success color-white"><i class="fa fa-pen"></i></div>
                    </td>
                    {{-- <td>{{$product->created_at->diffForhumans()}}</td> --}}
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
