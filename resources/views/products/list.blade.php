@extends('layouts.master')
@section('content')
    <h1>List Product Category</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Brand Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td scope="row">{{$category->id}}</td>
                <td>{{$category->category_name}}</td>
                <td>{{$category->brand_name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection