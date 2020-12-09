@extends('layouts/master')
@section('title', 'Sky - Product Listing')
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
    #big-product-img{
        width: 100%;
        height: 320px;
    }
    #small-product-img{
        width: 70px;
        height: 60px;
    }
    #product-name{
        max-width: 150px;
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

                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="header__actions">
                        @if (Route::has('form-login'))
                            <div class="top-right links">
                                @auth
                                    <span>
                                        Welcome {{ \Auth::user()->last_name. ' '.\Auth::user()->first_name }} !
                                    </span>
                                    @if (Route::has('login'))
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
                <div class="header__logo"><a class="ps-logo" href="index.html"><img src="{{ asset('images/logo.png') }}"></a></div>
            </div>

            <div class="navigation__column center">
                <ul class="main-menu menu">
                    <li class="menu-item menu-item-has-children dropdown"><a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="menu-item menu-item-has-children has-mega-menu"><a href="#">Men</a>
                        <div class="mega-menu">
                            <div class="mega-wrap" id="nav-mega-wrap">
                                <div class="mega-column" id="nav-mega">
                                    <ul class="mega-item mega-features">
                                        <li><a href="product-listing.html">NEW RELEASES</a></li>
                                        <li><a href="product-listing.html">FEATURES SHOES</a></li>
                                        <li><a href="product-listing.html">TOP SALES</a></li>
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
                    <li class="menu-item"><a href="#">Women</a>
                        <div class="mega-menu">
                            <div class="mega-wrap" id="nav-mega-wrap">
                                <div class="mega-column" id="nav-mega">
                                    <ul class="mega-item mega-features">
                                        <li><a href="product-listing.html">NEW RELEASES</a></li>
                                        <li><a href="product-listing.html">FEATURES SHOES</a></li>
                                        <li><a href="product-listing.html">TOP SALES</a></li>
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
                    <li class="menu-item menu-item-has-children dropdown"><a href="{{ route('contact-form') }}">Contact Us</a></li>
                </ul>
            </div>

            <div class="navigation__column right">
                <form class="ps-search--header" action="{{ route('search-product') }}" method="POST">
                    @csrf
                    <input name="input-search" value="{{ old('input-search') }}" class="form-control" type="text" placeholder="Search Product…">
                    <button><i class="ps-icon-search"></i></button>
                </form>

                <div class="ps-cart">
                    <a class="ps-cart__toggle" href="{{ route('show-cart') }}">
                        @if($cartCount != null)
                            <span><i>{{ $cartCount }}</i></span><i class="ps-icon-shopping-cart"></i>
                        @else
                        <span><i>0</i></span><i class="ps-icon-shopping-cart"></i>
                        @endif
                    </a>
                </div>
                @if(session()->has('message'))
                    <p style="color:red;">{{session()->get('message')}}</p>
                @endif
            </div>
        </div>
    </nav>
</header>

<div class="header-services">
    <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
    </div>
</div>

<main class="ps-main">
    <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
            {{-- <div class="ps-product-action"> --}}
                {{-- <div class="ps-pagination">
                    <ul class="pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div> --}}
            {{-- </div> --}}
            <div class="ps-product__columns">
                @foreach ($products as $product)
                <div class="ps-product__column">
                    <div class="ps-shoe mb-30">
                        <div class="ps-shoe__thumbnail">
                            @if($product->discount_percent != 0)
                            <div class="ps-badge ps-badge--sale">
                                <span>-{{ number_format($product->discount_percent) }}%</span>
                            </div>
                            @else
                            <div>
                                <span>{{''}}</span>
                            </div>
                            @endif
                            <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
                            <img id="big-product-img" src="{{ asset('images/shoe/' .$product->images[0]->image_name .'') }}">
                            <a class="ps-shoe__overlay" href="{{ route('product-detail', $product->id) }}"></a>
                         </div>
                         <div class="ps-shoe__content">
                             <div class="ps-shoe__variants">
                                 <div class="ps-shoe__variant normal">
                                     @foreach($product->images as $image)
                                     <img id="small-product-img" src="{{ asset('images/shoe/' .$image->image_name .'') }}">
                                     @endforeach
                                 </div>
                                 <select class="ps-rating ps-shoe__rating">
                                     <option value="1">1</option>
                                     <option value="1">2</option>
                                     <option value="1">3</option>
                                     <option value="1">4</option>
                                     <option value="2">5</option>
                                 </select>
                             </div>

                             <div class="ps-shoe__detail">
                                 <p id="product-name"><a class="ps-shoe__name" href="#">{{ $product->product_name }}</a></p>
                                 <p class="ps-shoe__categories"><span class="ps-shoe__price">{{ number_format($product->price) }} đ</span></p>
                             </div>
                         </div>
                     </div>
                </div>
                @endforeach
            </div>

            {{-- <div class="ps-product-action">
                <div class="ps-pagination">
                    <ul class="pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div> --}}
        </div>

        <div class="ps-sidebar" data-mh="product-listing">
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Sort By</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">
                        <li
                            @if(str_contains(Request::fullUrl(), 'sort=name'))
                                class="current"
                            @endif
                        >
                            <a href="{{ URL::current()."?sort=name" }}">Name</a>
                        </li>
                        <li
                            @if(str_contains(Request::fullUrl(), 'sort=price_asc'))
                                class="current"
                            @endif
                        >
                            <a href="{{ URL::current()."?sort=price_asc" }}">Price (Low to High)</a>
                        </li>
                        <li
                            @if(str_contains(Request::fullUrl(), 'sort=price_desc'))
                                class="current"
                            @endif
                        >
                            <a href="{{ URL::current()."?sort=price_desc" }}">Price (High to Low)</a>
                        </li>
                    </ul>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Category</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">
                        <li
                            @if(str_contains(Request::fullUrl(), 'sort=category_lifestyle'))
                                class="current"
                            @endif
                        >
                            <a href="{{ URL::current()."?sort=category_lifestyle" }}">Lifestyle</a>
                        </li>
                        <li
                            @if(str_contains(Request::fullUrl(), 'sort=category_running'))
                                class="current"
                            @endif
                        >
                            <a href="{{ URL::current()."?sort=category_running" }}">Running</a>
                        </li>
                        <li
                            @if(str_contains(Request::fullUrl(), 'sort=category_football'))
                                class="current"
                            @endif
                        >
                            <a href="{{ URL::current()."?sort=category_football" }}">Football</a>
                        </li>
                        <li
                            @if(str_contains(Request::fullUrl(), 'sort=category_training'))
                                class="current"
                            @endif
                        >
                            <a href="{{ URL::current()."?sort=category_training" }}">Training</a>
                        </li>
                    </ul>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--filter">
                <div class="ps-widget__header">
                    <h3>Category</h3>
                </div>
                <div class="ps-widget__content">
                    <div class="ac-slider" data-default-min="300" data-default-max="2000" data-max="3450" data-step="50" data-unit="$"></div>
                    <p class="ac-slider__meta">Price:<span class="ac-slider__value ac-slider__min"></span>-<span class="ac-slider__value ac-slider__max"></span></p><a class="ac-slider__filter ps-btn" href="#">Filter</a>
                </div>
            </aside>
        </div>
    </div>

    <div class="ps-footer bg--cover" data-background="{{ asset('images/background/parallax.jpg') }}">
        <div class="ps-footer__content">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 " id="footer-area">
                        <aside class="ps-widget--footer ps-widget--info">
                            <header>
                                <a class="ps-logo" href="index.html"><img src="{{ asset('images/logo-white.png') }}"></a>
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
                        <p>&copy; <a href="#">SKYTHEMES</a>, Inc. All rights Resevered. Design by DongTQ</a></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                        <ul class="ps-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
