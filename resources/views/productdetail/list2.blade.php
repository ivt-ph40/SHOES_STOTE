@extends('layouts.master')
@section('content')
    <h1>List Product Detail</h1>
    <h2>Mã Sản Phẩm : {{$product->product_code}}</h2>
    <h2>Tên Sản Phẩm : {{$product->product_name}}</h2>
    <h2>Tên Sản Phẩm : {{$product->id}}</h2>
    <a href="{{route('productdetail.create', $product->id)}}">Create</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Size</th>
                <th>Color</th>
                <th>Quantity</th>
                <th>Product_status</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productsDetail as $product)
            <tr>
                <td scope="row">{{$product->product_id}}</td>
                <td>{{$product->size}}</td>
                <td>{{$product->color}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->product_status}}</td>
                <td><a href="{{route('productdetail.edit',[$product->id,$product->product_id])}}" class="btn btn-primary">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
            
    </table>
    
@endsection