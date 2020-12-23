@extends('layouts.master')
@section('title', 'Login page')
@section('style', '
    .ps-contact{
        width: 40%;
        margin: 0 auto;
    }
')
@section('content')
<div class="header--sidebar"></div>
<header class="header">
    <div class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                    <p>92 Quang Trung Street, Da Nang City  -  Hotline: 804-377-3580 - 804-399-3580</p>
                </div>

                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                    <div class="header__actions">
                        <a href="{{ route('home') }}">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="ps-main">
    <div class="ps-contact ps-contact--2 ps-section pt-80 pb-80">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="ps-section__header pt-50">
                    <h2 class="ps-section__title" data-mask="Login">- Login</h2>
                    @if(session()->has('fail'))
                        <div class="alert alert-warning" role="alert">
                        {{session()->get('fail')}}
                        </div>
                    @endif
                    <form class="ps-contact__form" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Email<span>*</span></label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Input email">
                            @if($errors->has('email'))
                                <p style="color: red;">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group mb-25">
                            <label>Password<span>*</span></label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Input password">
                            @if($errors->has('password'))
                                <p style="color: red;">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="ps-btn">Sign in<i class="ps-icon-next"></i></button>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div id="contact-map" data-address="New York, NY" data-title="Skythemse Store!" data-zoom="17"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="ps-footer bg--cover" data-background="{{ asset('images/background/parallax.jpg') }}">
        <div class="ps-footer__content">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 " id="footer-area">
                        <aside class="ps-widget--footer ps-widget--info">
                            <header>
                                <a class="ps-logo" href="{{ route('home') }}"><img src="{{ asset('images/logo-white.png') }}"></a>
                                <h3 class="ps-widget__title">Address Office 1</h3>
                            </header>
                            <footer>
                                <p><strong>92 Quang Trung Street, Da Nang City</strong></p>
                                <p>Email: <a href='mailto:support@store.com'>support1@store.com</a></p>
                                <p>Phone: +323 32434 5334</p>
                                <p>Fax: ++323 32434 5333</p>
                            </footer>
                        </aside>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 " id="footer-area">
                        <aside class="ps-widget--footer ps-widget--info second">
                            <header>
                                <h3 class="ps-widget__title">Address Office 2</h3>
                            </header>
                            <footer>
                                <p><strong>345 Phan Chau Trinh Street, Da Nang City</strong></p>
                                <p>Email: <a href='mailto:support@store.com'>support2@store.com</a></p>
                                <p>Phone: +323 32434 5334</p>
                                <p>Fax: ++323 32434 5333</p>
                            </footer>
                        </aside>
                    </div>
                </div>
            </div>
        </div>

        <div class="ps-footer__copyright">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                        <p>&copy; <a href="{{ route('home') }}">SKYTHEMES</a>, Inc. All rights Resevered. Design by DongTQ</a></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                        <ul class="ps-social">
                            <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://myaccount.google.com/"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="https://twitter.com/?lang=en"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
