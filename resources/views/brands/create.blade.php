@extends('layouts.master')
@section('content')
    <h1>create Brand</h1>
    <form class="form-inline" method="post" action="{{route('brands.store')}}">
        @csrf
        <div class="form-group">
            <label for="">Brand Name</label>
            <input type="text" name="brand_name" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <button type="submit" class="btn btn-primary" action="save">Confirm</button>
    </form>
@endsection