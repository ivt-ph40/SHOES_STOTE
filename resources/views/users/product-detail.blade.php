@extends('layouts/master')
@section('title', 'Sky - Product Detail')
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
    #main-product-img{
        width: 100%;
        height: 600px;
    }
    #big-product-img{
        width: 100%;
        height: 320px;
    }
    #small-product-img{
        width: 60px;
        height: 70px;
    }
    #product-name{
        max-width: 200px;
    }
    #sale-percent{
        margin: 15px 0 !important;
        line-height: 30px;
    }
    #sale-percent h3{
        font-weight: bold;
        max-width: 150px;
    }
    .product-info{
        border-bottom: none !important;
        margin: 5px 0 !important;
    }
    #add-cart-btn{
        background: none;
        border: none;
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
    <div class="test">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 "></div>
            </div>
        </div>
    </div>
    <div class="ps-product--detail pt-60">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-10 col-md-12 col-lg-offset-1">
                    <div class="ps-product__thumbnail">
                        <div class="ps-product__preview">
                            <div class="ps-product__variants">
                                @foreach($product->images as $image)
                                    <div class="item">
                                        <img id="small-product-img" src="{{ asset('images/shoe/' .$image->image_name .'') }}">
                                    </div>
                                @endforeach
                            </div>
                            <a class="popup-youtube ps-product__video" href="https://www.youtube.com/watch?v=LBukoM3CLic">
                            <img name="image" src="{{ asset('images/shoe/' .$product->images[0]->image_name .'') }}"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="ps-product__image">
                            @foreach($product->images as $image)
                                <div class="item">
                                    <img id="main-product-img" class="zoom" src="{{ asset('images/shoe/' .$image->image_name .'') }}" data-zoom-image="{{ asset('images/shoe/' .$image->image_name .'') }}">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="ps-product__thumbnail--mobile">
                        <div class="ps-product__main-img"><img src="{{ asset('images/shoe/' .$product->images[0]->image_name .'') }}"></div>
                        <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
                            @foreach($product->images as $image)
                                <img src="{{ asset('images/shoe/' .$image->image_name .'') }}" sizes=60x60>
                            @endforeach
                        </div>
                    </div>

                    <div class="ps-product__info">
                        <form action={{ route('add-cart')}} method="POST">
                            @csrf
                            <div class="ps-product__rating">
                                <select class="ps-rating">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                </select>
                            </div>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <h1>{{ $product->product_name }}</h1>
                            <div id="sale-percent">
                                @if($product->discount_percent != 0)
                                    <del><h4>{{ number_format($product->price) }}đ</h4></del>
                                    <h3 class="ps-product__price">{{ number_format($product->price - (($product->discount_percent * $product->price)/100)) }}đ</h3>
                                @else
                                    <h3 class="ps-product__price">{{ number_format($product->price) }}đ</h3>
                                    <h3>{{''}}</h3>
                                @endif
                            </div>
                            <div class="ps-product__block ps-product__quickview">
                                <h4 class="product-info">BRAND: <span>{{ $product->brand->brand_name }}</span></h4>
                                <h4 class="product-info">CODE: <span>{{ $product->product_code }}</span></h4>
                                <h4 class="product-info">COLOR: <span>{{ $product->product_details[0]->color }}</span></h4>
                            </div>
                            <div class="ps-product__block ps-product__size">
                                <h4>CHOOSE SIZE</h4>
                                <select class="ps-select selectpicker" name="size">
                                    @foreach($product->product_details as $item)
                                        @if($item->product_status != 'out of stock')
                                            <option value="{{ $item->size }}">{{ $item->size }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <input data-id="{{ $product->id }}" id="quantity" name="quantity" class="form-control" type="number" value="1">
                                </div>
                            </div>
                            <div class="ps-product__shopping">
                                <button id="add-cart-btn" type="submit"><span class="ps-btn mb-10">Add to cart<i class="ps-icon-next"></i></span></button>
                                <div class="ps-product__actions"><a class="mr-10" href="{{ route('wishlist') }}"><i class="ps-icon-heart"></i></a><a href="compare.html"><i class="ps-icon-share"></i></a></div>
                            </div>
                        </form>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ps-product__content mt-50">
                        <ul class="tab-list" role="tablist">
                            <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Description</a></li>
                            <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Review</a></li>
                        </ul>
                    </div>

                    <div class="tab-content mb-60">
                        <div class="tab-pane active" role="tabpanel" id="tab_01">
                            <p>{{ $product->description }}</p>
                        </div>

                        <div class="tab-pane" role="tabpanel" id="tab_02">
                            @if($reviews != null)
                                <p class="mb-20"><strong>{{ $reviews[0]->product->product_name }}</strong></p>
                                @foreach($reviews as $review)
                                    <div class="ps-review">
                                        <div class="ps-review__content">
                                            <header>
                                                <select class="ps-rating">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="5">5</option>
                                                </select>
                                                <p>By {{ $review->user->last_name. ' ' . $review->user->first_name }}</p>
                                            </header>
                                            <p>{{ $review->content }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <span>{{ '' }}</span>
                            @endif
                            <form class="ps-product__review" action="{{ route('submit-review') }}" method="POST">
                                @csrf
                                <h4>ADD YOUR REVIEW</h4>
                                @if(\Auth::user() != null)
                                    <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                                @endif
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                        <div class="form-group">
                                            <label>Name<span>*</span></label>
                                            @if(\Auth::user() != null)
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
                                        <div class="form-group">
                                            <label>Email<span>*</span></label>
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
                                        <div class="form-group">
                                            <label>Your rating<span></span></label>
                                            <select name="rating" class="ps-rating">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                                        <div class="form-group">
                                            <label>Your Review:</label>
                                            <textarea name="content" value="{{ old('content') }}" class="form-control" rows="6"></textarea>
                                        </div>
                                            <div class="form-group">
                                            <button class="ps-btn ps-btn--sm">Submit<i class="ps-icon-next"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                        <h3 class="ps-section__title" data-mask="Related item">- YOU MIGHT ALSO LIKE</h3>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
                    </div>
                </div>
            </div>

            <div class="ps-section__content">
                <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
                    @foreach($relatedItems as $item)
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                @if($item->discount_percent != 0)
                                <div class="ps-badge ps-badge--sale">
                                    <span>-{{ $item->discount_percent }}%</span>
                                </div>
                                @else
                                <div>
                                    <span>{{''}}</span>
                                </div>
                                @endif
                                <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
                                <img id="big-product-img" src="{{ asset('images/shoe/' .$item->images[0]->image_name .'') }}">
                                <a class="ps-shoe__overlay" href="{{ route('product-detail', $item->id) }}"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal">
                                        @foreach($item->images as $image)
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
                                    <p id="product-name"><a class="ps-shoe__name" href="{{ route('product-detail', $item->id) }}">{{ $item->product_name }}</a></p>
                                    <p class="ps-shoe__categories"><span class="ps-shoe__price">{{ number_format($item->price) }}đ</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
<script>
    $(document).ready(function(){
        var size = null;
        $("select.ps-select").change(function(){
            console.log('ok');
            window.size = $(this).children("option:selected").val();
        });

        $('#quantity').on('change', function(e){
            e.preventDefault();
            var quantity = parseInt($(this).val());
            var productID = $(this).attr('data-id');
            console.log(quantity,productID,parseInt(window.size));

            if(quantity<0 || quantity>10 || isNaN(quantity)){
                alert('This field must between 0 and 10');
            }
            $.ajax({
                type: 'get',
                url: '/api/products/'+productID+'/check-quantity',
                data: {
                    'quantity' : quantity,
                    'size' : window.size,
                },
                success: function(res){
                    console.log('ok');
                },
                error: function(err){
                    console.log(err, err.responseJSON.message)
                    alert(err.responseJSON.message);
                    $('#quantity').val(1);
                }
            });
        });
    });

</script>
@endsection
