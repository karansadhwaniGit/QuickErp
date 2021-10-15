@extends('layouts.sidebar.sidebar')
@section('content')
<div class="card text-center mx-3 my-3 p-2 shadow">
    <div class="row">
        <div class="col-md-12">
            <form method="GET" action="{{route('SupplierSearch')}}">
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
                          <a class="btn btn-secondary" href="{{ URL::to('/suppliers/pdf') }}"> PDF</a>
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
    <table class="table table-hover ">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">@sortablelink('first_name')</th>
            <th scope="col">@sortablelink('gst_no')</th>
            <th scope="col">@sortablelink('Company Name')</th>
            <th scope="col">@sortablelink('phone_no')</th>
            <th scope="col">@sortablelink('email')</th>
            <th scope="col">Actions</th>
            <th scope="col">Added Since</th>
            <th scope="col">Country</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($suppliers  as $supplier )
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$supplier->first_name." ".$supplier->last_name}}</td>
                    <td>{{$supplier->gst_no}}</td>
                    <td>{{$supplier->company_name}}</td>
                    <td>{{$supplier->phone_no}}</td>
                    <td>{{$supplier->email}}</td>
                    <td>
                        <div class="btn btn-danger color-white"><i class="fa fa-trash"></i></div>
                        <div class="btn btn-success color-white"><i class="fa fa-pen"></i></div>
                    </td>
                    <td>{{$supplier->created_at!=null?$supplier->created_at->diffForhumans():""}}</td>
                    <td>{{$supplier->address->first()!=null?$supplier->address->first()['country']:""}}</td>
            @endforeach
        </tr>
        </tbody>
      </table>
      <div class="col-4"></div>
      <div class="text-center col-4">
          {!! $suppliers->links("pagination::bootstrap-4") !!}
      </div>
      <div class="col-4"></div>

</div>
@endsection
