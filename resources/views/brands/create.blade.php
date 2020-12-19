@extends('layouts.master')
@section('content')
<h1>create Brand</h1>
<form class="form-inline" method="post" action="{{route('brands.store',$name)}}">
    @csrf
    <div class="form-group">
        <label for="">Brand Name</label>
        <input type="text" name="brand_name" id="" class="form-control" placeholder="" aria-describedby="helpId">
        @if ($errors->any())
        <section class="error">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-6">
                        <div class="notification is-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
    </div>
    <button type="submit" class="btn btn-primary" action="save">Confirm</button>
</form>
@endsection