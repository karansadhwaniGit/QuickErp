@extends('layouts.sidebar.sidebar')
@section('content')
<div class="m-2 px-4 py-2 border border-dark rounded">
<form action="{{route('suppliers.store')}}" method="post">
    @csrf

</form>
</div>
@endsection
