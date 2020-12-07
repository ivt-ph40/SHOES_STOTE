@extends('layouts.master')
@section('content')
<h1>Edit Product: {{$products->product_name}}</h1>
<form action="{{route('products.update', $products->id)}}" method="POST" role="form">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="">Product ID</label>
        <input type="text" class="form-control" name="product_id" placeholder="Input field"
            value="{{$products->id}}">
	</div>

    <div class="form-group">
        <label for="">Product Code</label>
        <input type="text" class="form-control" name="product_code" placeholder="Input field"
            value="{{$products->product_code}}">
	</div>
	
	<div class="form-group">
        <label for="">Product name</label>
        <input type="text" class="form-control" name="product_name" placeholder="Input field" value="{{$products->product_name}}">
	</div>

	<div class="form-group">
        <label for="">Price</label>
        <input type="text" class="form-control" name="price" placeholder="Input field"
            value="{{$products->price}}">
	</div>

	<div class="form-group">
        <label for="">Description</label>
        <input type="text" class="form-control" name="description" placeholder="Input field"
            value="{{$products->description}}">
	</div>
	
	<div class="form-group">
        <label for="">discount_percent</label>
        <input type="text" class="form-control" name="discount_percent" placeholder="Input field"
            value="{{$products->discount_percent}}">
    </div>
    <button type="submit" class="btn btn-primary" action="save">Update</button>
</form>
@endsection