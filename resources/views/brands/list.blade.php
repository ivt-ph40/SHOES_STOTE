@extends('layouts.master')
@section('content')
    <h1>List Brand</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>brand_name</th>
                <th>Edit</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
            <tr>
                <td scope="row">{{$brand->id}}</td>
                <td>{{$brand->brand_name}}</td>
                <td><a href="{{route('brands.edit', $brand->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{route('brands.destroy', $brand->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete1</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
            
    </table>
    <a href="{{route('brands.create')}}">Create</a>
@endsection