@extends('layouts.master')
@section('content')
    <h1>List User</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td scope="row">{{$category->id}}</td>
                <td>{{$category->category_name}}</td>
                <td>
                    @if ($category->parent_id === 1)
                        Men
                    @else
                        Women
                    @endif
                </td>
                <td><a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete1</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
            
    </table>
    <a href="{{route('categories.create')}}">Create</a>
@endsection