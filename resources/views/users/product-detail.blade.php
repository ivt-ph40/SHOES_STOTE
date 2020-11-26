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
    #product-name{
        max-width: 200px;
    }
    #product-code, #product-color{
        border-bottom: none !important;
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
                    <div class="header__actions"><a href="#">Login & Regiser</a></div>
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
                                        <li><a href="product-listing.html">All Shoes</a></li>
                                        <li><a href="product-listing.html">Lifestyle</a></li>
                                        <li><a href="product-listing.html">Running</a></li>
                                        <li><a href="product-listing.html">Training</a></li>
                                        <li><a href="product-listing.html">Football</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column" id="nav-mega">
                                    <h4 class="mega-heading">BRAND</h4>
                                    <ul class="mega-item">
                                        <li><a href="product-listing.html">NIKE</a></li>
                                        <li><a href="product-listing.html">Adidas</a></li>
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
                                        <li><a href="product-listing.html">All Shoes</a></li>
                                        <li><a href="product-listing.html">Lifestyle</a></li>
                                        <li><a href="product-listing.html">Running</a></li>
                                        <li><a href="product-listing.html">Training</a></li>
                                        <li><a href="product-listing.html">Football</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column" id="nav-mega">
                                    <h4 class="mega-heading">BRAND</h4>
                                    <ul class="mega-item">
                                        <li><a href="product-listing.html">NIKE</a></li>
                                        <li><a href="product-listing.html">Adidas</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item menu-item-has-children dropdown"><a href="{{ route('contact-form') }}">Contact Us</a></li>
                </ul>
            </div>

            <div class="navigation__column right">
                <form class="ps-search--header" action="do_action" method="post">
                    <input class="form-control" type="text" placeholder="Search Product…">
                    <button><i class="ps-icon-search"></i></button>
                </form>

                <div class="ps-cart"><a class="ps-cart__toggle" href="{{ route('show-cart') }}"><span><i>20</i></span><i class="ps-icon-shopping-cart"></i></a></div>
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

                    {{-- <form action="{{ route('add-cart') }}" method="post">
                        @csrf
                        @if(session()->has('success-msg'))
                            <div class="alert alert-success" role="alert">
                                {{session()->get('success-msg')}}
                            </div>
                        @endif --}}
                    <div class="ps-product__thumbnail">
                        <div class="ps-product__preview">
                            <div class="ps-product__variants">
                                @foreach($product->images as $image)
                                    <div class="item">
                                        <img id="small-product-img" src="{{ asset('images/shoe/' .$image->image_name .'') }}">
                                    </div>
                                @endforeach
                            </div>
                            <a class="popup-youtube ps-product__video" href="http://www.youtube.com/watch?v=0O2aH4XLbto">
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
                        <div class="ps-product__rating">
                            <select class="ps-rating">
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                                <option value="1">4</option>
                                <option value="2">5</option>
                            </select>
                        </div>
                        <h1 name="product_name">{{ $product->product_name }}</h1>
                        {{-- <input type="hidden" name="productID" value="{{ $product->id }}"> --}}
                        <h3 class="ps-product__price" name="price">{{ number_format($product->price) }} đ</h3>
                        <div class="ps-product__block ps-product__quickview">
                            <h4 id="product-code" name="code">CODE: <span>{{ $product->product_code }}</span></h4>
                            <h4 id="product-color" name="color">COLOR: <span>{{ $product->product_details[0]->color }}</span></h4>
                        </div>
                        <div class="ps-product__block ps-product__size">
                            <h4>CHOOSE SIZE</h4>
                            <select class="ps-select selectpicker">
                                @foreach($product->product_details as $item)
                                    <option value="{{ $item->size }}" name="size">{{ $item->size }}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <input data-id="{{ $product->id }}" id="quantity" name="quantity" class="form-control" type="number" value="1">
                            </div>
                        </div>
                        <div class="ps-product__shopping"><a class="ps-btn mb-10" href="{{ route('add-cart', $product->id) }}">Add to cart<i class="ps-icon-next"></i></a>
                            <div class="ps-product__actions"><a class="mr-10" href="{{ route('wishlist') }}"><i class="ps-icon-heart"></i></a><a href="compare.html"><i class="ps-icon-share"></i></a></div>
                        </div>
                    </div>
                    {{-- </form> --}}

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
                            <p class="mb-20">1 review for <strong>Shoes Air Jordan</strong></p>
                            <div class="ps-review">
                                <div class="ps-review__thumbnail"><img src="images/user/1.jpg" alt=""></div>
                                <div class="ps-review__content">
                                    <header>
                                        <select class="ps-rating">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="5">5</option>
                                        </select>
                                        <p>By Alena Studio</p>
                                    </header>
                                    <p>Soufflé danish gummi bears tart. Pie wafer icing. Gummies jelly beans powder. Chocolate bar pudding macaroon candy canes chocolate apple pie chocolate cake. Sweet caramels sesame snaps halvah bear claw wafer. Sweet roll soufflé muffin topping muffin brownie. Tart bear claw cake tiramisu chocolate bar gummies dragée lemon drops brownie.</p>
                                </div>
                            </div>
                            <form class="ps-product__review" action="_action" method="post">
                                <h4>ADD YOUR REVIEW</h4>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                        <div class="form-group">
                                            <label>Name:<span>*</span></label>
                                            <input class="form-control" type="text" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Email:<span>*</span></label>
                                            <input class="form-control" type="email" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Your rating<span></span></label>
                                            <select class="ps-rating">
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
                                            <textarea class="form-control" rows="6"></textarea>
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
                                <div class="ps-badge"><span>New</span></div>
                                <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div>
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
                                    <p class="ps-shoe__categories"><span class="ps-shoe__price">{{ number_format($item->price) }} đ</span>
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
                        <p>&copy; <a href="#">SKYTHEMES</a>, Inc. All rights Resevered. Design by <a href="#"> DongTQ</a></p>
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
<script>
    $(document).ready(function(){
        $('#quantity').on('change', function(){
            var quantity =parseInt(this.value);
            var productID = $(this).attr('data-id');
            if(quantity<0 || quantity>10 || isNaN(quantity)){
                alert('This field must between 0 and 10');
            }
            $.ajax({
                type: 'get',
                url: '/api/products/'+productID+'/check-quantity',
                data: {
                    'quantity' : quantity,
                },
                success: function(res){
                    console.log('ok');
                },
                error: function(err){
                    console.log(err, err.responseJSON.message)
                    alert(err.responseJSON.message);
                    $('#quantity').value(1);
                }
            })
        });
    });

</script>
@endsection
