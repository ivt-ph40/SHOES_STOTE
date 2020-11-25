@extends('layouts/master')
@section('title', 'Sky - Contact Us')
@section('content')
    <h1>Contact Us</h1>
    <form action="{{ route('send-contact') }}" method="post">
        @csrf
        <label>Your Email</label>
        <input type="text" name="email">
        <label>Your Question</label>
        <input type="text" name="content">
        <button type="submit">Send</button>
    </form>
@endsection
