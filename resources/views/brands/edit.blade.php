@extends('layouts.master')
@section('content')
<h1>Edit User: {{$brands->category_name}}</h1>
<form action="{{ route('brands.update', $brands->id)}}" method="POST" role="form">
	@csrf
	@method('PUT')
	<div class="form-group">
		<label for="">Parent Name</label>
		<input type="text" class="form-control" name="brand_name" placeholder="Input field" value="{{$brands->brand_name}}">
	</div>

	<button type="submit" class="btn btn-primary" action="save">Update</button>
</form>
@endsection 