@extends('frontend.layouts.main')
@section('main-container')
    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3"></div>
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        @if ($errors->any())
                        @endif
                        @if (session('status'))
                            <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <form action="{{route('userlogin')}}" method="post">
                            @csrf
                            <p>
                                <label>Email <span>*</span></label>
                                <input type="text" name="email">
                            </p>
                            <div style="color: red">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>

                            <p>
                                <label>Password<span>*</span></label>
                                <input type="password" name="password">
                            </p>
                            <div style="color: red">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="login_submit">
                                <a href="#">Lost your password?</a>
                                <label for="remember">
                                    <input id="remember" type="checkbox" value="Ischeckd">
                                    Remember me
                                </label>
                                <button type="submit">Login</button>

                            </div>
                            <a href="{{'/register'}}" class="mt-3">New User !! Register Here</a>
                        </form>
                        <div class="col-lg-3 col-md-3"></div>

                    </div>
                </div>
                <!--login area start-->

            </div>
        </div>
    </div>
    <!-- customer login end -->
@endsection
