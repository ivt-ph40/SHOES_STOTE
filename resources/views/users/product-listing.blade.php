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
                    @if($input_search != null)
                        <input name="input_search" value="{{ implode($input_search) }}" class="form-control" type="text" placeholder="Search Product…">
                    @else
                        <input name="input_search" value="{{ old('input_search') }}" class="form-control" type="text" placeholder="Search Product…">
                    @endif
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
    <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
            @if(count($products))
            <div class="ps-product-action">
                <div class="pagination">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            </div>
            @endif

            <div class="ps-product__columns">
                @if(session()->has('message'))
                    <div class="alert alert-warning" role="alert">
                        {{session()->get('message')}}
                    </div>
                @endif
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
                            @if(str_contains(Request::fullUrl(), 'search-product'))
                                @if($input_search != null)
                                    <a href="{{ URL::current()."?sort=name&input_search=".implode($input_search)}}">Name</a>
                                @else
                                    <a href="{{ URL::current()."?sort=name&input_search=".old('input_search') }}">Name</a>
                                @endif
                            @else
                                <a href="{{ URL::current()."?sort=name" }}">Name</a>
                            @endif
                        </li>
                        <li
                            @if(str_contains(Request::fullUrl(), 'sort=price_asc'))
                                class="current"
                            @endif
                        >
                            @if(str_contains(Request::fullUrl(), 'search-product'))
                                @if($input_search != null)
                                    <a href="{{ URL::current()."?sort=price_asc&input_search=".implode($input_search)}}">Price (Low to High)</a>
                                @else
                                    <a href="{{ URL::current()."?sort=price_asc&input_search=".old('input_search') }}">Price (Low to High)</a>
                                @endif
                            @else
                                <a href="{{ URL::current()."?sort=price_asc" }}">Price (Low to High)</a>
                            @endif
                        </li>
                        <li
                            @if(str_contains(Request::fullUrl(), 'sort=price_desc'))
                                class="current"
                            @endif
                        >
                            @if(str_contains(Request::fullUrl(), 'search-product'))
                                @if($input_search != null)
                                    <a href="{{ URL::current()."?sort=price_desc&input_search=".implode($input_search)}}">Price (High to Low)</a>
                                @else
                                    <a href="{{ URL::current()."?sort=price_desc&input_search=".old('input_search') }}">Price (High to Low)</a>
                                @endif
                            @else
                                <a href="{{ URL::current()."?sort=price_desc" }}">Price (High to Low)</a>
                            @endif
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
                            @if(str_contains(Request::fullUrl(), 'search-product'))
                                @if($input_search != null)
                                    <a href="{{ URL::current()."?sort=category_lifestyle&input_search=".implode($input_search)}}">Lifestyle</a>
                                @else
                                    <a href="{{ URL::current()."?sort=category_lifestyle&input_search=".old('input_search') }}">Lifestyle</a>
                                @endif
                            @else
                                <a href="{{ URL::current()."?sort=category_lifestyle" }}">Lifestyle</a>
                            @endif
                        </li>
                        <li
                            @if(str_contains(Request::fullUrl(), 'sort=category_running'))
                                class="current"
                            @endif
                        >
                            @if(str_contains(Request::fullUrl(), 'search-product'))
                                @if($input_search != null)
                                    <a href="{{ URL::current()."?sort=category_running&input_search=".implode($input_search)}}">Running</a>
                                @else
                                    <a href="{{ URL::current()."?sort=category_running&input_search=".old('input_search') }}">Running</a>
                                @endif
                            @else
                                <a href="{{ URL::current()."?sort=category_running" }}">Running</a>
                            @endif
                        </li>
                        <li
                            @if(str_contains(Request::fullUrl(), 'sort=category_football'))
                                class="current"
                            @endif
                        >
                            @if(str_contains(Request::fullUrl(), 'search-product'))
                                @if($input_search != null)
                                    <a href="{{ URL::current()."?sort=category_football&input_search=".implode($input_search)}}">Football</a>
                                @else
                                    <a href="{{ URL::current()."?sort=category_football&input_search=".old('input_search') }}">Football</a>
                                @endif
                            @else
                                <a href="{{ URL::current()."?sort=category_football" }}">Football</a>
                            @endif
                        </li>
                        <li
                            @if(str_contains(Request::fullUrl(), 'sort=category_training'))
                                class="current"
                            @endif
                        >
                            @if(str_contains(Request::fullUrl(), 'search-product'))
                                @if($input_search != null)
                                    <a href="{{ URL::current()."?sort=category_training&input_search=".implode($input_search)}}">Training</a>
                                @else
                                    <a href="{{ URL::current()."?sort=category_training&input_search=".old('input_search') }}">Training</a>
                                @endif
                            @else
                                <a href="{{ URL::current()."?sort=category_training" }}">Training</a>
                            @endif
                        </li>
                    </ul>
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
