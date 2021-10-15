@extends('layouts.sidebar.sidebar')
@section('content')
<div class="card text-center mx-3 my-3 p-2 shadow">
    <div class="row">
        <div class="col-md-12">
            <form method="GET" action="{{route('CategoriesSearch')}}">
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
                            <a class="btn btn-secondary" href="{{ URL::to('/categories/pdf') }}"> PDF</a>
                          </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="option3" autocomplete="off"> Excel
                        </label>
                      </div>
                      &nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-md-1">
        </div>
    </div>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">@sortablelink('name')</th>
            <th>Actions</th>
            <th scope="col">Added Since</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category )
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$category->name}}</td>
                    <td>
                        <div class="btn btn-danger color-white"><i class="fa fa-trash"></i></div>
                        <div class="btn btn-success color-white"><i class="fa fa-pen"></i></div>
                    </td>
                    <td>{{$category->created_at!=null?$category->created_at->diffForhumans():""}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <div class="col-4"></div>
      <div class="text-center col-4">
          {!! $categories->links("pagination::bootstrap-4") !!}
      </div>
      <div class="col-4"></div>
      </div>
</div>
@endsection
