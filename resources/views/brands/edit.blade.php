@extends('layouts.master')
@section('content')
<h1>Edit User: {{$brands->category_name}}</h1>
<form action="{{ route('brands.update', [$brands->id,$name])}}" method="POST" role="form">
	@csrf
	@method('PUT')
	<div class="form-group">
		<label for="">Parent Name</label>
		<input type="text" class="form-control" name="brand_name" placeholder="Input field" value="{{$brands->brand_name}}">
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

	<button type="submit" class="btn btn-primary" action="save">Update</button>
</form>
@endsection 