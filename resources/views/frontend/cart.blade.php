@extends('frontend.layouts.main')
@section('main-container')

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Cart</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shopping cart area start -->
    <div class="shopping_cart_area mt-100">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                @if ($cartItems->isEmpty())
                                    <p>Your cart is empty.</p>
                                @else
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product_remove">Delete</th>
                                                <th class="product_thumb">Image</th>
                                                <th class="product_name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product_quantity">Quantity</th>
                                                <th class="product_total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartItems as $item)
                                                <tr>
                                                    <td>

                                                        <a href="{{ route('remove-from-cart', ['id' => $item->id]) }}">X</a>

                                                </td>
                                                    <td class="product_thumb"><img
                                                            src="{{ asset('backend/images/' . $item->mainimg) }}"
                                                            alt=""></td>
                                                    <td class="product_name">{{ $item->pname }}</td>
                                                    <td class="product-price">£{{ $item->dprice }}</td>
                                                    {{-- <td class="product_quantity">
                                                        <label>Quantity</label>
                                                        <input id="quantity-input-{{ $item->id }}" min="1"
                                                            max="100" value="1" type="number">
                                                    </td>
                                                    <td class="product_total">£{{ $item->dprice }}</td> --}}

                                                    <td class="product_quantity">
                                                        <label>Quantity</label>
                                                        <input id="quantity-input-{{ $item->id }}" min="1" max="100" value="1" type="number"
                                                            data-product-id="{{ $item->id }}" data-product-price="{{ $item->price }}">
                                                    </td>
                                                    <td class="product_total" id="total-price-{{ $item->id }}">£{{ $item->dprice }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                            </div>
                            {{-- <div class="cart_submit">
                                <a href="{{ route('cart.add', ['product_id' => $item->id, 'quantity' => 1]) }}"
                                    onclick="event.preventDefault(); addToCart('{{ $item->id }}');">
                                   Update Cart
                                </a>
                            </div> --}}

                        </div>
                    </div>
                </div>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">
                                    <p>Enter your coupon code if you have one.</p>
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal">
                                        <p>Subtotal</p>
                                        <p class="cart_amount">£215.00</p>
                                    </div>
                                    <div class="cart_subtotal ">
                                        <p>Shipping</p>
                                        <p class="cart_amount"><span>Flat Rate:</span> £255.00</p>
                                    </div>
                                    <a href="#">Calculate shipping</a>

                                    <div class="cart_subtotal">
                                        <p>Total</p>
                                        <p class="cart_amount">£215.00</p>
                                    </div>
                                    <div class="checkout_btn">
                                        <a href="#">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
        </div>
    </div>
    <!--shopping cart area end -->

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
    @endif
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('input[id^="quantity-input"]').on('change', function() {
            var productId = $(this).data('product-id');
            var productPrice = $(this).data('product-price');
            var newQuantity = $(this).val();

            var totalPriceElement = $('#total-price-' + productId);

            // Make AJAX request to update quantity and calculate total price
            $.ajax({
                url: '/update-cart/' + productId + '/' + newQuantity,
                type: 'GET',
                success: function(response) {
                    totalPriceElement.text('£' + (productPrice * newQuantity).toFixed(2));
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection
