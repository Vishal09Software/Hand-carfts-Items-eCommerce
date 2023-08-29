@extends('frontend.layouts.main')
@section('main-container')
    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3"></div>
                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        @if ($errors->any())
                        @endif
                        @if (session('status'))
                            <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <h2>Register</h2>
                        <form action="{{ '/register' }}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <p>
                                <label>Name<span>*</span></label>
                                <input type="text" name="name">
                            </p>
                            <div style="color: red">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <p>
                                <label>Mobile No.<span>*</span></label>
                                <input type="tel" name="mobile">
                            </p>
                            <div style="color: red">
                                @error('mobile')
                                    {{ $message }}
                                @enderror
                            </div>
                            <p>
                                <label>Email address <span>*</span></label>
                                <input type="email" name="email">
                            </p>
                            <div style="color: red">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                            <p>
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="password">
                            </p>
                            <div style="color: red">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="login_submit">
                                {{-- <input type="Submit" value="Register"> --}}
                                <button type="submit">Register</button>

                            </div>
                          <a href="{{'/login'}}">Already Register !! Login Here</a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3"></div>

                <!--register area end-->
            </div>
        </div>
    </div>
    <!-- customer login end -->

    <!--brand area start-->
    <div class="brand_area brand__three">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand1.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand3.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand4.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand5.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand6.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->
@endsection
