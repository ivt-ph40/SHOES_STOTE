@extends('layouts/master')
@section('title', 'Sky - Cart')
@section('content')
<div class="header--sidebar"></div>
<header class="header">
    <div class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                    <p>460 West 34th Street, 15th floor, New York  -  Hotline: 804-377-3580 - 804-399-3580</p>
                </div>

                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="header__actions"><a href="#">Login & Regiser</a>
                        <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USD<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><img src="{{ asset('images/flag/usa.svg') }}"> USD</a></li>
                                <li><a href="#"><img src="{{ asset('images/flag/singapore.svg') }}"> SGD</a></li>
                                <li><a href="#"><img src="{{ asset('images/flag/japan.svg') }}"> JPN</a></li>
                            </ul>
                        </div>
                        <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">Japanese</a></li>
                                <li><a href="#">Chinese</a></li>
                            </ul>
                        </div>
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
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="{{ route('home') }}">Homepage</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-has-children has-mega-menu"><a href="#">Men</a>
                        <div class="mega-menu">
                            <div class="mega-wrap">
                                <div class="mega-column">
                                    <ul class="mega-item mega-features">
                                        <li><a href="product-listing.html">NEW RELEASES</a></li>
                                        <li><a href="product-listing.html">FEATURES SHOES</a></li>
                                        <li><a href="product-listing.html">BEST SELLERS</a></li>
                                        <li><a href="product-listing.html">NOW TRENDING</a></li>
                                        <li><a href="product-listing.html">SUMMER ESSENTIALS</a></li>
                                        <li><a href="product-listing.html">MOTHER'S DAY COLLECTION</a></li>
                                        <li><a href="product-listing.html">FAN GEAR</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column">
                                    <h4 class="mega-heading">Shoes</h4>
                                    <ul class="mega-item">
                                        <li><a href="product-listing.html">All Shoes</a></li>
                                        <li><a href="product-listing.html">Running</a></li>
                                        <li><a href="product-listing.html">Training & Gym</a></li>
                                        <li><a href="product-listing.html">Basketball</a></li>
                                        <li><a href="product-listing.html">Football</a></li>
                                        <li><a href="product-listing.html">Soccer</a></li>
                                        <li><a href="product-listing.html">Baseball</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column">
                                    <h4 class="mega-heading">CLOTHING</h4>
                                    <ul class="mega-item">
                                        <li><a href="product-listing.html">Compression & Nike Pro</a></li>
                                        <li><a href="product-listing.html">Tops & T-Shirts</a></li>
                                        <li><a href="product-listing.html">Polos</a></li>
                                        <li><a href="product-listing.html">Hoodies & Sweatshirts</a></li>
                                        <li><a href="product-listing.html">Jackets & Vests</a></li>
                                        <li><a href="product-listing.html">Pants & Tights</a></li>
                                        <li><a href="product-listing.html">Shorts</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column">
                                    <h4 class="mega-heading">Accessories</h4>
                                    <ul class="mega-item">
                                        <li><a href="product-listing.html">Compression & Nike Pro</a></li>
                                        <li><a href="product-listing.html">Tops & T-Shirts</a></li>
                                        <li><a href="product-listing.html">Polos</a></li>
                                        <li><a href="product-listing.html">Hoodies & Sweatshirts</a></li>
                                        <li><a href="product-listing.html">Jackets & Vests</a></li>
                                        <li><a href="product-listing.html">Pants & Tights</a></li>
                                        <li><a href="product-listing.html">Shorts</a></li>
                                    </ul>
                                </div>
                                <div class="mega-column">
                                    <h4 class="mega-heading">BRAND</h4>
                                    <ul class="mega-item">
                                        <li><a href="product-listing.html">NIKE</a></li>
                                        <li><a href="product-listing.html">Adidas</a></li>
                                        <li><a href="product-listing.html">Dior</a></li>
                                        <li><a href="product-listing.html">B&G</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item"><a href="#">Women</a></li>
                    <li class="menu-item"><a href="#">Kids</a></li>

                    <li class="menu-item menu-item-has-children dropdown"><a href="#">News</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-has-children dropdown"><a href="blog-grid.html">Blog-grid</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="blog-grid.html">Blog Grid 1</a></li>
                                    <li class="menu-item"><a href="blog-grid-2.html">Blog Grid 2</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="blog-list.html">Blog List</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-has-children dropdown"><a href="{{ route('company-info') }}">About US</a></li>
                </ul>
            </div>

            <div class="navigation__column right">
                <form class="ps-search--header" action="do_action" method="post">
                    <input class="form-control" type="text" placeholder="Search Product…">
                    <button><i class="ps-icon-search"></i></button>
                </form>

                <div class="ps-cart">
                    <a class="ps-cart__toggle" href="#"><span><i>20</i></span><i class="ps-icon-shopping-cart"></i></a>
                    <div class="ps-cart__listing">
                        <div class="ps-cart__content">
                            <div class="ps-cart-item">
                                <a class="ps-cart-item__close" href="#"></a>
                                <div class="ps-cart-item__thumbnail">
                                    <a href="product-detail.html"></a><img src="{{ asset('images/cart-preview/1.jpg') }}">
                                </div>
                                <div class="ps-cart-item__content">
                                    <a class="ps-cart-item__title" href="product-detail.html">Amazin’ Glazin’</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                </div>
                            </div>

                            <div class="ps-cart-item"><
                                <a class="ps-cart-item__close" href="#"></a>
                                <div class="ps-cart-item__thumbnail">
                                    <a href="product-detail.html"></a><img src="{{ asset('images/cart-preview/2.jpg') }}">
                                </div>
                                <div class="ps-cart-item__content">
                                    <a class="ps-cart-item__title" href="product-detail.html">The Crusty Croissant</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                </div>
                            </div>

                            <div class="ps-cart-item">
                                <a class="ps-cart-item__close" href="#"></a>
                                <div class="ps-cart-item__thumbnail">
                                    <a href="product-detail.html"></a><img src="{{ asset('images/cart-preview/3.jpg') }}">
                                </div>
                                <div class="ps-cart-item__content">
                                    <a class="ps-cart-item__title" href="product-detail.html">The Rolling Pin</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                </div>
                            </div>
                        </div>

                        <div class="ps-cart__total">
                            <p>Number of items:<span>36</span></p>
                            <p>Item Total:<span>£528.00</span></p>
                        </div>

                        <div class="ps-cart__footer">
                            <a class="ps-btn" href="cart.html">Check out<i class="ps-icon-arrow-left"></i></a>
                        </div>
                    </div>
                </div>

                <div class="menu-toggle"><span></span></div>
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
    <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-cart-listing">
                <table class="table ps-cart__table">
                    <thead>
                        <tr>
                            <th>All Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15" src="{{ asset('images/product/cart-preview/1.jpg') }}"> air jordan One mid</a></td>
                            <td>$150</td>
                            <td>
                                <div class="form-group--number">
                                    <button class="minus"><span>-</span></button>
                                    <input class="form-control" type="text" value="2">
                                    <button class="plus"><span>+</span></button>
                                </div>
                            </td>
                            <td>$300</td>
                            <td>
                                <div class="ps-remove"></div>
                            </td>
                        </tr>
                        <tr>
                            <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15" src="{{ asset('images/product/cart-preview/2.jpg') }}"> The Crusty Croissant</a></td>
                            <td>$150</td>
                            <td>
                                <div class="form-group--number">
                                    <button class="minus"><span>-</span></button>
                                    <input class="form-control" type="text" value="2">
                                    <button class="plus"><span>+</span></button>
                                </div>
                            </td>
                            <td>$300</td>
                            <td>
                                <div class="ps-remove"></div>
                            </td>
                        </tr>
                        <tr>
                            <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15" src="{{ asset('images/product/cart-preview/3.jpg') }}">The Rolling Pin</a></td>
                            <td>$150</td>
                            <td>
                                <div class="form-group--number">
                                    <button class="minus"><span>-</span></button>
                                    <input class="form-control" type="text" value="2">
                                    <button class="plus"><span>+</span></button>
                                </div>
                            </td>
                            <td>$300</td>
                            <td>
                                <div class="ps-remove"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="ps-cart__actions">
                    <div class="ps-cart__promotion">
                        <div class="form-group">
                            <div class="ps-form--icon">
                                <i class="fa fa-angle-right"></i>
                                <input class="form-control" type="text" placeholder="Promo Code">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="ps-btn ps-btn--gray">Continue Shopping</button>
                        </div>
                    </div>

                    <div class="ps-cart__total">
                        <h3>Total Price: <span> 2599.00 $</span></h3><a class="ps-btn" href="checkout.html">Process to checkout<i class="ps-icon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ps-subscribe">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                    <h3><i class="fa fa-envelope"></i>Sign up to Newsletter</h3>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                    <form class="ps-subscribe__form" action="do_action" method="post">
                        <input class="form-control" type="text" placeholder="">
                        <button>Sign up now</button>
                    </form>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                    <p>...and receive  <span>$20</span>  coupon for first shopping.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="ps-footer bg--cover" data-background="{{ asset('images/background/parallax.jpg') }}">
        <div class="ps-footer__content">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--info">
                            <header>
                                <a class="ps-logo" href="{{ route('home') }}"><img src="{{ asset('images/logo-white.png') }}"></a>
                                <h3 class="ps-widget__title">Address Office 1</h3>
                            </header>
                            <footer>
                                <p><strong>460 West 34th Street, 15th floor, New York</strong></p>
                                <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                                <p>Phone: +323 32434 5334</p>
                                <p>Fax: ++323 32434 5333</p>
                            </footer>
                        </aside>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--info second">
                            <header>
                                <h3 class="ps-widget__title">Address Office 2</h3>
                            </header>
                            <footer>
                                <p><strong>PO Box 16122 Collins  Victoria 3000 Australia</strong></p>
                                <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                                <p>Phone: +323 32434 5334</p>
                                <p>Fax: ++323 32434 5333</p>
                            </footer>
                        </aside>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--link">
                            <header>
                                <h3 class="ps-widget__title">Find Our store</h3>
                            </header>
                            <footer>
                                <ul class="ps-list--link">
                                    <li><a href="#">Coupon Code</a></li>
                                    <li><a href="#">SignUp For Email</a></li>
                                    <li><a href="#">Site Feedback</a></li>
                                    <li><a href="#">Careers</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--link">
                            <header>
                                <h3 class="ps-widget__title">Get Help</h3>
                            </header>
                            <footer>
                                <ul class="ps-list--line">
                                    <li><a href="#">Order Status</a></li>
                                    <li><a href="#">Shipping and Delivery</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Payment Options</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--link">
                            <header>
                                <h3 class="ps-widget__title">Products</h3>
                            </header>
                            <footer>
                                <ul class="ps-list--line">
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Accessries</a></li>
                                    <li><a href="#">Football Boots</a></li>
                                </ul>
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
                        <p>&copy; <a href="#">SKYTHEMES</a>, Inc. All rights Resevered. Design by <a href="#"> Alena Studio</a></p>
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
