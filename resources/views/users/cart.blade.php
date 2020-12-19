@extends('layouts/master')
@section('title', 'Sky - Cart')
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
                    <a class="ps-cart__toggle" href="{{ route('show-cart') }}">
                        @if($cartCount != null)
                            <span><i>{{ $cartCount }}</i></span><i class="ps-icon-shopping-cart"></i>
                        @else
                        <span><i>0</i></span><i class="ps-icon-shopping-cart"></i>
                        @endif
                    </a>
                </div>
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
    <div class="ps-content pt-80 pb-80">
        @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
            {{session()->get('message')}}
            </div>
        @endif
        <div class="ps-container">
            <div class="ps-cart-listing">
                    <table class="table ps-cart__table">
                        <thead>
                            <tr>
                                <th>All Products</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($cart as $item)
                                <tr>
                                    <td>
                                        <a class="ps-product__preview" href="{{ route('product-detail', $item->id) }}">
                                            <img id="product-image" class="mr-15" src="{{ asset('images/shoe/' .$item->options->image.'') }}">
                                            {{ $item->name }}
                                        </a>
                                    </td>
                                    <td><span id="size">{{ $item->options->size }}</span></td>
                                    <td>{{ $item->options->color }}</td>
                                    <td><span name="price">{{ number_format($item->price) }}đ</span></td>
                                    <td>
                                        <div class="form-group--number">
                                            <button class="minus" type="button" onclick="updateQuantity(this)" data-action="minus" data-row-id="{{$item->rowId}}" data-qty="{{$item->qty}}">
                                                <span > - </span>
                                            </button>
                                            <input id="quantity" data-id="{{ $item->id }}" name="qty-{{$item->rowId}}" class="form-control" type="text" value="{{ $item->qty }}" readonly>
                                            <button class="plus" type="button" onclick="updateQuantity(this)" data-action="plus" data-row-id="{{$item->rowId}}" data-qty="{{$item->qty}}">
                                                <span> + </span>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <span id="subTotal-{{ $item->rowId }}">
                                            {{ number_format($item->options->subTotal) }}đ
                                        </span>
                                    </td>
                                    <td>
                                        <div><a class="ps-remove" href='{{ url("cart?product_id=$item->id&remove=1") }}'></a></div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>

                    <div class="ps-cart__actions">
                        <div class="ps-cart__promotion">
                            <div class="form-group">
                                <a href='{{ route('home') }}'><button class="ps-btn ps-btn--gray" onclick="checkQuantity(this)">Continue Shopping</button></a>
                            </div>
                        </div>

                        <div class="ps-cart__total">
                            <h3>Total Amount: <span id="total">{{ $totalAmount }}đ</span></h3>
                            <a class="ps-btn" id="buttonCheckOut" href="{{ route('checkout') }}">Process to checkout<i class="ps-icon-next"></i></a>
                        </div>
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
    function updateQuantity(event)
    {
        // get params
        var rowId = $(event).data('row-id');
        var qty =   $('input[name=qty-' + rowId + ']').val();
        var action = $(event).data('action');

        //validation
        if(qty <=1 && action === 'minus')
        {
            return false;
        }

        // make params
        var formData = {
            '_token'   : '{{ csrf_token() }}',
            'row_id'   :  rowId,
            'qty'      :  Number(qty),

            'action'   :  action
        };

        // process the form
        $.ajax({
            type        : 'POST',
            url         : '{{route("cart.update.quantity")}}',
            data        : formData,
            dataType    : 'json',
            encode          : true
        })
        .done(function(data) {
            if(data.status) {
                $('input[name=qty-' + rowId + ']').val(data.qty);
                $("#subTotal-" + rowId).text(data.subTotal + 'đ') ;
                $("#total").text(data.total + 'đ');

            } else {
                alert(data.message);
            }
        });
    }

    $(document).ready(function () {
        $('#buttonCheckOut').click(function (e) {
            e.preventDefault();
            var productID = $('#quantity').attr('data-id');
            var quantity = parseInt($('#quantity').val());
            var size = parseInt($('#size').html());
            console.log(quantity,productID,size);

            if(quantity<0 || quantity>10 || isNaN(quantity)){
                alert('This field must between 0 and 10');
                return false;
            }
            $.ajax({
                type: 'get',
                url: '/api/products/'+productID+'/check-quantity',
                data: {
                    'quantity' : quantity,
                    'size': size,
                },
                success: function(res){
                    console.log('ok');
                    window.location.href = "http://skytheme.com/checkout";
                },
                error: function(err){
                    console.log(err, err.responseJSON.message)
                    alert(err.responseJSON.message);
                }
            });
        });
    });
</script>
@endsection

