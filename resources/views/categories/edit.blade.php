@extends('layouts.master')
@section('content')
<h1>Edit User: {{$categories->category_name}}</h1>
<form action="{{ route('categories.update', $categories->id)}}" method="POST" role="form">
	@csrf
	@method('PUT')
	<div class="form-group">
		<label for="">Category Name</label>
		<input type="text" class="form-control" name="category_name" placeholder="Input field" value="{{$categories->category_name}}">
	</div>

	<div class="form-group">
		<label for="">Parent Id</label>
		<input type="text" class="form-control" name="parent_id" placeholder="Input field" value="{{$categories->parent_id}}">
	</div>

	<button type="submit" class="btn btn-primary" action="save">Update</button>
</form>
@endsection 