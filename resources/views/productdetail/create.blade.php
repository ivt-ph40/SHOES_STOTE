@extends('layouts.master')
@section('content')
    <h1>create Produc Detail</h1>
    <form class="form-inline" method="post" action="{{route('productdetail.store')}}">
        @csrf
        <div class="form-group">
            <label for="">Product ID</label>
            <input type="text" name="product_id" value="{{$product->id}}" class="form-control" placeholder="" aria-describedby="helpId" required>
            <input type="text" name="product_code" value="{{$product->product_code}}" class="form-control" placeholder="" aria-describedby="helpId" required>
            <label for="">Size</label>
            <input type="text" name="size" class="form-control" placeholder="" aria-describedby="helpId" required>
            <label for="">Color</label>
            <input type="text" name="color" class="form-control" placeholder="" aria-describedby="helpId" required>
            <label for="">Chất liệu</label>
            <input type="text" name="material" class="form-control" placeholder="" aria-describedby="helpId" required>
            <label for="">Thông số</label>
            <input type="text" name="specifications" value="0" class="form-control" placeholder="" aria-describedby="helpId" required>
            <label for="">Số lượng</label>
            <input type="text" name="quantity" class="form-control" placeholder="" aria-describedby="helpId" required>
            <input type="text" name="product_status" value="0" class="form-control" placeholder="" aria-describedby="helpId" required>
        </div>
        <button type="submit" class="btn btn-primary" action="save">Confirm</button>
    </form>
@endsection