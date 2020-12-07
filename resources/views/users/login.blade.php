@extends('layouts.master')

@section('title', 'Login page')
@section('style', '
    body{
        width: 50%;
        margin: 0 auto;
    }

')

@section('content')
<h1>Login</h1>
@if(session()->has('fail'))
	<div class="alert alert-warning" role="alert">
	  {{session()->get('fail')}}
	</div>
@endif
<form action="{{ route('login') }}" method="POST" role="form">
	@csrf
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Input email address">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}" placeholder="Input password">
	</div>
	<button type="submit" class="btn btn-primary">Sign in</button>
</form>
@endsection
