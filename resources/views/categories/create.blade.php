@extends('layouts.master')
@section('content')
    <h1>create Category</h1>
    <form class="form-inline" method="post" action="{{route('categories.store')}}">
        @csrf
        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" name="category_name" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
            <label for="">Loại</label>
            <select name="parent_id">
                @foreach($parents as $parent)
                <option name="parent_id" value="{{$parent->id}}">{{$parent->category_name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" action="save">Confirm</button>
    </form>
@endsection