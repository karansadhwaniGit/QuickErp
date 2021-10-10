@extends('layouts.sidebar.sidebar')
@section('content')
<div class="px-4">
    <form method="post" action="{{route('categories.store')}}">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Add Category</label>
          <input type="text" class="form-control {{$errors->any()?'border border-danger':''}}" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Category" value="{{old('name')}}">
          @error('name')
            <small id="emailHelp" class="form-text  text-danger">{{$message}}</small>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
