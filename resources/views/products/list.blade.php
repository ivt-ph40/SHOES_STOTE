@extends('layouts.master')
@section('content')
<h1>Select Category</h1>
<form class="form-inline" method="post" action="{{route('products.select')}}">
    @csrf
    <div class="form-group">
        <label for="">Category Name</label>
        <select name="category_name">
            @foreach($categories as $category)
            <option name="category_name" value="{{$category->category_name}}">{{$category->category_name}}</option>
            @endforeach
        </select>
        <label for="">Loại</label>
        <select name="parent_id">
            @foreach($parents as $parent)
            <option name="parent_id" value="{{$parent->id}}">{{$parent->category_name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary" action="save">Confirm</button>
</form>
<a href="{{route('products.sub-branch.brand')}}" class="btn btn-primary">Category</a>
<a href="{{route('products.sub-branch.category')}}" class="btn btn-primary">Brand</a>
<h1>List Product</h1>
<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Product_code</th>
            <th>Product_name</th>
            <th>Hãng</th>
            <th>Giới Tính</th>
            <th>Discount</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $index => $product)
        <tr>
            @if ($loop->iteration)
            <td scope="row">
                {{ $index }}
            </td>
            @endif
            <td>{{$product->product_code}}</td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->brand_name}}</td>
            <td>
                @if ($product->parent_id === 1)
                Men
                @else
                Women
                @endif</td>
            <td>{{$product->price}}</td>
            <td>{{$product->discount_percent}}</td>
        </tr>
        
        @endforeach
    </tbody>

</table>
@endsection