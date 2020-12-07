@extends('layouts.master')
@section('content')
    <h1>create Product</h1>
    <form class="form-inline" method="post" action="{{route('products.store')}}">
        @csrf
        <div class="form-group">
            <label for="">Category ID</label>
            <input type="text" name="category_id" value="{{$categories->id}}" class="form-control" placeholder="" aria-describedby="helpId">
            
            <label for="">Brand </label>
            <select name="brand_id">
                @foreach($brands as $brand)
                <option name="brand_id" value="{{$brand->id}}">{{$brand->brand_name}}</option>
                @endforeach
            </select>

            <label for="">Product_code</label>
            <input type="text" name="product_code"  class="form-control" placeholder="" aria-describedby="helpId">

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