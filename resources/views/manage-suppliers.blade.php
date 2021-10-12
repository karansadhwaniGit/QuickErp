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
                    <label for="">show&nbsp;<select name="manage-supplier-table_length" aria-controls="manage-supplier-table" class="custom-select custom-select-sm form-control form-control-sm"><option value="5">5</option><option value="15">15</option><option value="25">25</option><option value="-1">All</option></select>&nbsp;entries</label></div>
                </form>
        </div>
        <div class="col-md-1">
        </div>
    </div>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">GST No.</th>
            <th scope="col">Company Name</th>
            <th scope="col">Phone No.</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
            <th scope="col">Added Since</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier )
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
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
