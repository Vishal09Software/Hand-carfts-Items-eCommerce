{{-- @php
session_start();


    $logedIn = $_SESSION['loginId'];

@endphp --}}

<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/lukani/lukani/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Jul 2023 09:38:46 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Curious Playthings Co. </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.png') }}">

    <!-- CSS
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <!--slick min css-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <!--font awesome css-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font.awesome.css') }}">
    <!--animate css-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-ui.min.css') }}">
    <!--slinky menu css-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slinky.menu.css') }}">
    <!--plugins css-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">

    <!--modernizr min js here-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>
</head>

<body>

    <!--header area start-->

    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>


    <!--offcanvas menu area end-->
    <header>
        <div class="main_header">
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 col-3">
                            <div class="logo">
                                <a href="{{ '/' }}"><img
                                        src="{{ asset('frontend/assets/img/logo/logo.jpg') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="header_right_info">
                                <div class="main_menu menu_position">
                                    <nav>
                                        <ul>
                                            <li><a href="{{ '/' }}">Home</a>
                                            </li>
                                            <li class="mega_items"><a href="{{ '/shop' }}">Shop
                                            </li>
                                            <li><a href="{{ '/about' }}">About</a>
                                            <li><a href="{{ '/faq' }}">Faq</a>
                                            <li><a href="{{ '/contact' }}"> Contact Us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-3">
                            <div class="header_account_area">
                                <div class="header_account-list top_links">
                                    <a href="#"><i class="icon-users"></i></a>
                                    <ul class="dropdown_links">
                                        @if (session()->has('loginId'))
                                            <li><a href="{{ route('myaccount') }}">Hi, {{ $customer->name }}</a></li>
                                            <form action="{{ route('user.logout') }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                            </form>
                                        @else
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="cart.html">Shopping Cart</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="{{ route('userlogin') }}">Login</a></li>
                                            <li><a href="{{ '/register' }}">Register</a></li>
                                        @endif
                                    </ul>

                                </div>
                                <div class="header_account-list header_wishlist ">
                                    <a href="{{ route('wishlist.index') }}">
                                        <i class="icon-heart"></i>
                                        {{-- <span class="item_count">{{ $productsCount }}</span> --}}
                                    </a>
                                </div>
                                <div class="header_account-list  mini_cart_wrapper">
                                    <a href="javascript:void(0)"><i class="icon-shopping-bag"></i><span
                                            class="item_count">2</span></a>
                                    <!--mini cart-->
                                    <div class="mini_cart">
                                        <div class="cart_gallery">
                                            <div class="cart_close">
                                                <div class="cart_text">
                                                    <h3>cart</h3>
                                                </div>
                                                <div class="mini_cart_close">
                                                    <a href="javascript:void(0)"><i class="icon-x"></i></a>
                                                </div>
                                            </div>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img
                                                            src="{{ asset('frontend/assets/img/s-product/product.jpg') }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">Primis In Faucibus</a>
                                                    <p>1 x <span> $65.00 </span></p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="#"><i class="icon-x"></i></a>
                                                </div>
                                            </div>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img
                                                            src="{{ asset('frontend/assets/img/s-product/product2.jpg') }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">Letraset Sheets</a>
                                                    <p>1 x <span> $60.00 </span></p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="#"><i class="icon-x"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_table">
                                            <div class="cart_table_border">
                                                <div class="cart_total">
                                                    <span>Sub total:</span>
                                                    <span class="price">$125.00</span>
                                                </div>
                                                <div class="cart_total mt-10">
                                                    <span>total:</span>
                                                    <span class="price">$125.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_footer">
                                            <div class="cart_button">
                                                <a href="cart.html"><i class="fa fa-shopping-cart"></i> View
                                                    cart</a>
                                            </div>
                                            <div class="cart_button">
                                                <a class="active" href="checkout.html"><i class="fa fa-sign-in"></i>
                                                    Checkout</a>
                                            </div>

                                        </div>
                                    </div>
                                    <!--mini cart end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!--header area end-->
