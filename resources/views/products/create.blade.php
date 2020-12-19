@extends('layouts.master')
@section('content')
<h1>create Product</h1>
<form class="form-inline" method="post" action="{{route('products.store')}}">
    @csrf
    <div class="form-group">
        <label for="">Loại giày</label>
        <select name="category_name">
            @foreach($categories as $category)
            @if ($category->parent_id != NULL )
            <option name="category_name" value="{{$category->category_name}}">{{$category->category_name}}</option>
            @endif
            
            @endforeach
        </select>

        <label for="">Giới tính</label>
        <select name="parent_id">
            @foreach($parents as $parent)
            <option name="parent_id" value="{{$parent->id}}">{{$parent->id}}</option>
            @endforeach
        </select>

        <label for="">Hãng</label>
        <select name="brand_id">
            @foreach($brands as $brand)
            <option name="brand_id" value="{{$brand->id}}">{{$brand->brand_name}}</option>
            @endforeach
        </select>

        <label for="">Product_code</label>
        <input type="text" name="product_code" class="form-control" placeholder="" aria-describedby="helpId">

        <input type="text" name="category_id" value="0" class="form-control" placeholder="" aria-describedby="helpId">

        <label for="">Product_name</label>
        <input type="text" name="product_name" class="form-control" placeholder="" aria-describedby="helpId">

        <label for="">price</label>
        <input type="text" name="price" class="form-control" placeholder="" aria-describedby="helpId">

        <label for="">description</label>
        <input type="text" name="description" class="form-control" placeholder="" aria-describedby="helpId">

    </div>
    <button type="submit" class="btn btn-primary" action="save">Confirm</button>
</form>
@endsection