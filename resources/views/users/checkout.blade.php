@extends('layouts/master')
@section('title', 'Sky - Checkout')
@section('style', '
    #nav-mega{
        width: 30%;
        text-align: left;
        padding-left: 20px;
        margin: 0 auto;
    }
    #nav-mega-wrap{
        width: 70%;
    }
    #product-image{
        width: 80px;
        height: 80px;
    }
    #total{
        text-transform: lowercase !important;
    }
    #footer-area{
        text-align: left;
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
                        @if (Route::has('form-login'))
                            <div class="top-right links">
                                @auth
                                    <span>
                                        Welcome {{ \Auth::user()->last_name. ' '.\Auth::user()->first_name }} !
                                    </span>
                                    @if (Route::has('login'))
                                        <a href="{{ route('show-profile', \Auth::user()->id) }}">Profile</a>
                                        <a href="{{ route('logout') }}">Logout</a>
                                    @endif
                                @else
                                    <a href="{{ route('form-login') }}">Login</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navigation">
        <div class="container-fluid">
            <div class="navigation__column left">
                <div class="header__logo"><a class="ps-logo" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}"></a></div>
            </div>

            <div class="navigation__column center">
                <ul class="main-menu menu">
                    <li class="menu-item menu-item-has-children dropdown"><a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="menu-item menu-item-has-children has-mega-menu"><a href="{{ route('all-men-shoes-list') }}">Men</a>
                        <div class="mega-menu">
                            <div class="mega-wrap" id="nav-mega-wrap">
                                <div class="mega-column" id="nav-mega">
                                    <ul class="mega-item mega-features">
                                        <li><a href="{{ route('new-releases-men') }}">NEW RELEASES</a></li>
                                        <li><a href="{{ route('sale-shoes-men') }}">TOP SALES</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column" id="nav-mega">
                                    <h4 class="mega-heading">Shoes</h4>
                                    <ul class="mega-item">
                                        <li><a href="{{ route('all-men-shoes-list') }}">All Shoes</a></li>
                                        <li><a href="{{ route('lifestyle-men-shoes-list') }}">Lifestyle</a></li>
                                        <li><a href="{{ route('running-men-shoes-list') }}">Running</a></li>
                                        <li><a href="{{ route('training-men-shoes-list') }}">Training</a></li>
                                        <li><a href="{{ route('football-men-shoes-list') }}">Football</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column" id="nav-mega">
                                    <h4 class="mega-heading">BRAND</h4>
                                    <ul class="mega-item">
                                        <li><a href="{{ route('Nike-men-shoes-list') }}">NIKE</a></li>
                                        <li><a href="{{ route('Adidas-men-shoes-list') }}">Adidas</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item"><a href="{{ route('all-women-shoes-list') }}">Women</a>
                        <div class="mega-menu">
                            <div class="mega-wrap" id="nav-mega-wrap">
                                <div class="mega-column" id="nav-mega">
                                    <ul class="mega-item mega-features">
                                        <li><a href="{{ route('new-releases-women') }}">NEW RELEASES</a></li>
                                        <li><a href="{{ route('sale-shoes-women') }}">TOP SALES</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column" id="nav-mega">
                                    <h4 class="mega-heading">Shoes</h4>
                                    <ul class="mega-item">
                                        <li><a href="{{ route('all-women-shoes-list') }}">All Shoes</a></li>
                                        <li><a href="{{ route('lifestyle-women-shoes-list') }}">Lifestyle</a></li>
                                        <li><a href="{{ route('running-women-shoes-list') }}">Running</a></li>
                                        <li><a href="{{ route('training-women-shoes-list') }}">Training</a></li>
                                        <li><a href="{{ route('football-women-shoes-list') }}">Football</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column" id="nav-mega">
                                    <h4 class="mega-heading">BRAND</h4>
                                    <ul class="mega-item">
                                        <li><a href="{{ route('Nike-women-shoes-list') }}">NIKE</a></li>
                                        <li><a href="{{ route('Adidas-women-shoes-list') }}">Adidas</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item menu-item-has-children dropdown"><a href="{{ route('contact-form') }}">Contact</a></li>
                </ul>
            </div>

            <div class="navigation__column right">
                <form class="ps-search--header" action="/search-product" method="GET">
                    <input name="input_search" value="{{ old('input_search') }}" class="form-control" type="text" placeholder="Search Product…">
                    <button type="submit"><i class="ps-icon-search"></i></button>
                </form>
                <div class="ps-cart">
                    @if($cartCount != null)
                        <a class="ps-cart__toggle" href="{{ route('show-cart') }}">
                            <span><i>{{ $cartCount }}</i></span><i class="ps-icon-shopping-cart"></i>
                        </a>
                        <div class="ps-cart__listing">
                            <div class="ps-cart__content">
                                @foreach($cart as $item)
                                <div class="ps-cart-item">
                                    <div class="ps-cart-item__thumbnail">
                                        <a href="{{ route('product-detail', $item->id) }}"></a>
                                        <img id="product-image" class="mr-15" src="{{ asset('images/shoe/' .$item->options->image.'') }}">
                                    </div>
                                    <div class="ps-cart-item__content">
                                        <a class="ps-cart-item__title" href="{{ route('product-detail', $item->id) }}">{{ $item->name }}</a>
                                        <p>
                                            <span>Quantity:<i>{{ $item->qty }}</i></span>
                                            <span>Subtotal:<i>{{ number_format($item->options->subTotal) }}đ</i></span>
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="ps-cart__total">
                                <p>Number of items:<span>{{ $cartCount }}</span></p>
                                <p>Total Amount:<span>{{ $totalAmount }}đ</span></p>
                            </div>
                            <div class="ps-cart__footer">
                                <a class="ps-btn" href="{{ route('show-cart') }}">View detail<i class="ps-icon-arrow-left"></i></a>
                            </div>
                        </div>
                    @else
                        <a class="ps-cart__toggle" href="{{ route('show-cart') }}">
                            <span><i>0</i></span><i class="ps-icon-shopping-cart"></i>
                        </a>
                    @endif
                </div>
                <div class="menu-toggle"><span></span></div>
            </div>
        </div>
    </nav>
</header>

<div class="header-services">
    <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Skytheme Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Skytheme Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Skytheme Store</p>
    </div>
</div>

<main class="ps-main">
    <div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
            <form class="ps-checkout__form" action="{{ route('submit-order') }}" method="POST">
                @csrf
                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                    {{session()->get('error')}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__billing">
                            <h3>Billing Detail</h3>
                            @if(\Auth::user() != null)
                                <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                            @endif
                            <div class="form-group form-group--inline">
                                <label>Customer Name<span>*</span></label>
                                @if(\Auth::user()!= null)
                                    <input name="username" value="{{ \Auth::user()->last_name. ' '.\Auth::user()->first_name }}" class="form-control" type="text" placeholder="">
                                @else
                                    <input name="username" value="{{ old('username') }}" class="form-control" type="text" placeholder="">
                                @endif

                                @if($errors->has('username'))
                                <p style="color: red;">
                                    {{ $errors->first('username') }}
                                </p>
                                @endif
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Email Address<span>*</span></label>
                                @if(\Auth::user() != null)
                                    <input name="email" value="{{ \Auth::user()->email }}" class="form-control" type="text" placeholder="">
                                @else
                                    <input name="email" value="{{ old('email') }}" class="form-control" type="text" placeholder="">
                                @endif

                                @if($errors->has('email'))
                                    <p style="color: red;">
                                        {{ $errors->first('email') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Phone<span>*</span></label>
                                @if(\Auth::user() != null)
                                    <input name="phone" value="{{ \Auth::user()->addresses[0]->phone }}" class="form-control" type="text" placeholder="">
                                @else
                                    <input name="phone" class="form-control" type="text" value="{{ old('phone') }}">
                                @endif

                                @if($errors->has('phone'))
                                    <p style="color: red;">
                                        {{ $errors->first('phone') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Street<span>*</span></label>
                                @if(\Auth::user() != null)
                                    <input name="street" value="{{ \Auth::user()->addresses[0]->street }}" class="form-control" type="text" placeholder="">
                                @else
                                    <input name="street" class="form-control" type="text" value="{{ old('street') }}">
                                @endif

                                @if($errors->has('street'))
                                    <p style="color: red;">
                                        {{ $errors->first('street') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Ward<span>*</span></label>
                                @if(\Auth::user() != null)
                                    <input name="ward" value="{{ \Auth::user()->addresses[0]->ward }}" class="form-control" type="text" placeholder="">
                                @else
                                    <input name="ward" class="form-control" type="text" value="{{ old('ward') }}">
                                @endif

                                @if($errors->has('ward'))
                                    <p style="color: red;">
                                        {{ $errors->first('ward') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group form-group--inline">
                                <label>District<span>*</span></label>
                                @if(\Auth::user() != null)
                                    <input name="district" value="{{ \Auth::user()->addresses[0]->district }}" class="form-control" type="text" placeholder="">
                                @else
                                    <input name="district" class="form-control" type="text" value="{{ old('district') }}">
                                @endif

                                @if($errors->has('district'))
                                    <p style="color: red;">
                                        {{ $errors->first('district') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group form-group--inline">
                                <label>City<span>*</span></label>
                                @if(\Auth::user() != null)
                                    <input name="city" value="{{ \Auth::user()->addresses[0]->city }}" class="form-control" type="text" placeholder="">
                                @else
                                    <input name="city" class="form-control" type="text" value="{{ old('city') }}">
                                @endif

                                @if($errors->has('city'))
                                    <p style="color: red;">
                                        {{ $errors->first('city') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Zipcode</label>
                                @if(\Auth::user() != null)
                                    <input name="zip_code" value="{{ \Auth::user()->addresses[0]->zip_code }}" class="form-control" type="text" placeholder="">
                                @else
                                    <input name="zip_code" class="form-control" type="text" value="{{ old('zip_code') }}">
                                @endif

                                @if($errors->has('zip_code'))
                                    <p style="color: red;">
                                        {{ $errors->first('zip_code') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__order">
                            <header>
                                <h3>Your Order</h3>
                            </header>
                            <div class="content">
                                <table class="table ps-checkout__products">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase">Product</th>
                                        <th class="text-uppercase"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cart as $item)
                                        <tr>
                                            <td>{{ $item->name .' X '. $item->qty.' PCS' }}</td>
                                            <td>{{ number_format($item->options->subTotal) }}đ</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-uppercase"><strong>Order Total</strong></td>
                                            <td><strong>{{ $totalAmount }}đ</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <footer>
                                <h3>Payment Method</h3>
                                <div class="form-group paypal">
                                    <div class="ps-radio">
                                        <input class="form-control" type="radio" id="rdo01" name="payment_method_id" value="1" checked>
                                        <label for="rdo01">Cash</label>
                                    </div>
                                </div>
                                <div class="form-group paypal">
                                    <div class="ps-radio ps-radio--inline">
                                        <input class="form-control" type="radio" name="payment_method_id" value="2" id="rdo02">
                                        <label for="rdo02">Visa</label>
                                    </div>
                                    <div class="ps-payment-method">
                                        <img src="{{ asset('images/payment/1.png') }}">
                                    </div>
                                </div>
                                <div class="form-group paypal">
                                    <div class="ps-radio ps-radio--inline">
                                        <input class="form-control" type="radio" name="payment_method_id" value="3" id="rdo03">
                                        <label for="rdo03">Master card</label>
                                    </div>
                                    <div class="ps-payment-method">
                                        <img src="{{ asset('images/payment/2.png') }}">
                                    </div>
                                    <button class="ps-btn ps-btn--fullwidth" type="submit">Place Order<i class="ps-icon-next"></i></button>
                                </div>
                            </footer>
                        </div>
                        <div class="ps-shipping">
                            <h3>FREE SHIPPING</h3>
                            <p>YOUR ORDER QUALIFIES FOR FREE SHIPPING.</p>
                        </div>
                    </div>
                </div>
            </form>
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
