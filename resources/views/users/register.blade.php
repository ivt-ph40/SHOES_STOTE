@extends('layouts.master')
@section('title', 'Register page')
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
                    <h2 class="ps-section__title" data-mask="Register">- Register</h2>
                    <form class="ps-contact__form" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">First name<span>*</span></label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('name') }}" placeholder="Input first name">
                        </div>
                        <div class="form-group">
                            <label for="name">Last name<span>*</span></label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('name') }}" placeholder="Input last name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email<span>*</span></label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Input email address">
                        </div>
                        <div class="form-group">
                            <label for="password">Password<span>*</span></label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Input password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="ps-btn">Submit<i class="ps-icon-next"></i></button>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div id="contact-map" data-address="New York, NY" data-title="Skytheme Store!" data-zoom="17"></div>
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
