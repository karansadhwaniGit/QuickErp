@extends('layouts.sidebar.sidebar')
@section('content')
<div class="card text-center mx-3 my-3 p-2 shadow">
    <div class="row">
        <div class="col-md-12">
            <form method="GET" action="{{route('ProductsSearch')}}">
                @csrf
                <div class="form-row form-inline">
                    <label for="" class="text-primary">Search</label>
                    <div class="p-3">
                      <input type="text" value="{{app('request')->input('query')}}" class="form-control" id="query" name="query" placeholder="Search.....">
                      <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                 </form>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="options" id="option1" autocomplete="off" checked> CSV
                        </label>
                        <label class="btn btn-secondary">
                            <a class="btn btn-secondary" href="{{ URL::to('/products/pdf') }}"> PDF</a>
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="option3" autocomplete="off"> Excel
                        </label>
                      </div>
                      &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <div class="col-md-1">
        </div>
    </div>
    <table class="table table-hover table-responsive" >
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">@sortablelink('product_name')</th>
            <th scope="col">@sortablelink('specification')</th>
            <th scope="col">@sortablelink('quantity')</th>
            <th scope="col">@sortablelink('selling_rate')</th>
            <th scope="col">WEF</th>
            <th scope="col">@sortablelink('danger_level')</th>
            <th scope="col">Category</th>
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
                    <td>{{$product->eoq}}</td>
                    <td>{{$product->selling_price}}</td>
                    <td>{{$product->getCategory->name}}</td>
                    <td>{{$product->danger_level}}</td>
                    <td>{{$product->getCategory->name}}</td>
                    <td>{{$product->suppliers->first_name." ".$product->suppliers->last_name}}</td>
                    <td>
                        <div class="btn btn-danger color-white"><i class="fa fa-trash"></i></div>
                        <div class="btn btn-success color-white"><i class="fa fa-pen"></i></div>
                    </td>
                    {{-- <td>{{$product->created_at->diffForhumans()}}</td> --}}
                </tr>
            @endforeach
        </tbody>
      </table>
      <div class="col-4"></div>
        <div class="text-center col-4">
            {!! $products->links("pagination::bootstrap-4") !!}
        </div>
        <div class="col-4"></div>
</div>
@endsection
