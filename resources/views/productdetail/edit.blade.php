@extends('layouts.master')
@section('content')
    <h1>create Produc Detail</h1>
    <form class="form-inline"  action="{{route('productdetail.update', $productDetail->id)}}" method="POST" role="form">
    @csrf
    @method('PUT')
        <div class="form-group">
            <input type="text" name="product_code" value="{{$product->product_code}}" class="form-control" placeholder="" aria-describedby="helpId" required>
            <label for="">Size</label>
            <input type="text" name="size" value="{{$productDetail->size}}" class="form-control" placeholder="" aria-describedby="helpId" required>
            <label for="">Color</label>
            <input type="text" name="color" value="{{$productDetail->color}}" class="form-control" placeholder="" aria-describedby="helpId" required>
            <label for="">Chất liệu</label>
            <input type="text" name="material" value="{{$productDetail->material}}" class="form-control" placeholder="" aria-describedby="helpId" required>
            <label for="">Thông số</label>
            <input type="text" name="specifications" value="{{$productDetail->specifications}}" class="form-control" placeholder="" aria-describedby="helpId" required>
            <label for="">Số lượng</label>
            <input type="text" name="quantity" value="{{$productDetail->quantity}}" class="form-control" placeholder="" aria-describedby="helpId" required>
        </div>
        <button type="submit" class="btn btn-primary" action="save">Confirm</button>
    </form>
@endsection