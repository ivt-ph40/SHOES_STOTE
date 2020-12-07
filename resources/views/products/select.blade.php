@extends('layouts.master')
@section('content')
    <h1>List Product</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category_Id</th>
                <th>Brand</th>
                <th>Parent</th>
                <th>Product_code</th>
                <th>Product_name</th>
                <th>price</th>
                <th>description</th>
                <td>discount_percent</td>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td scope="row">{{$product->id}}</td>
                <td>{{$product->brand_name}}</td>
                <td>
                    @if ($product->parent_id === 1)
                        Men
                    @else
                        Women
                    @endif</td>
                <td>{{$product->product_code}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->discount_percent}}</td>
                <td><a href="{{route('products.edit', [$product->id,$product->category_id])}}" class="btn btn-primary">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
            
    </table>
    <a href="{{route('products.create', $id_category)}}" class="btn btn-primary">Create</a>
@endsection