@extends('layouts/master')
@section('title', 'Sky - Success')
@section('style', '
    .container{
        width: 100%;
        padding: 120px 0;
    }
    .content{
        position: relative;
        margin: 0 auto;
        width: 800px;
        height: 650px;
    }
    .button{
        position: absolute;
        top: 550px;
        left: 310px;
    }

')
@section('content')
    <div class="container">
        <div class="content">
            <img src="{{ asset('images/background/success.jpg') }}">
        </div>
        <div class="button">
            <a class="ps-btn" href="{{ route('home') }}">Back to home<i class="ps-icon-next"></i></a>
        </div>
    </div>
@endsection
