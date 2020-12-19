@extends('layouts.master')

@section('title', 'Register page')
@section('style', '
    body{
        width: 50%;
        margin: 0 auto;
    }

')

@section('content')
<h1>Register</h1>
<form action="{{ route('register') }}" method="POST" role="form">
	@csrf
	<div class="form-group">
		<label for="name">First name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('name') }}" placeholder="Input first name">
        {{-- @if($errors->has('name'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('name') }}
        </div>
        @endif --}}
    </div>
    <div class="form-group">
		<label for="name">Last name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('name') }}" placeholder="Input last name">
        {{-- @if($errors->has('name'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('name') }}
        </div>
        @endif --}}
	</div>
	<div class="form-group">
		<label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Input email address">
        @if($errors->has('email'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('email') }}
        </div>
        @endif
	</div>
	<div class="form-group">
		<label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Input password">
        @if($errors->has('password'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('password') }}
        </div>
        @endif
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
