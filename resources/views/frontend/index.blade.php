@extends('frontend.layouts.main')
@section('main-container')
    <!--slider area start-->
    <section class="slider_section">
        <div class="slider_area owl-carousel">
            @foreach ($slider as $cover)
                <div class="single_slider d-flex align-items-center "
                    style="background-image: url({{ asset('backend/images/' . $cover->image) }})">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider_content">
                                    <h1>{{ $cover->heading }}</h1>
                                    <p style="width: 50%; line-break: loose; font-size: 12px;">{{ strip_tags($cover->desc) }}
                                    </p>
                                    <a class="button" href="{{ '/shop' }}">Shop Now </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <!--slider area end-->

    <!--shipping area start-->
    <div class="shipping_area">
        <div class="container">
            <h2 class="mb-5"> Are You</h2>
            <div class="row">
                @php
                    $ForArray = ['teacher', 'parent', 'gift'];
                @endphp

                @foreach ($ForArray as $product)
                    <div class="col-lg-4 col-md-6">
                        <figure class="single_banner">
                            <div class="banner_thumb">
                                <a href="{{ route('peopleproducts', ['areyou' => $product]) }}">
                                    <img src="{{ asset('frontend/assets/img/bg/banner1.jpg') }}" alt="">
                                    <div class="banner_content">
                                        <h3>A {{ $product }}</h3>
                                        <p>Free shipping around the world for all <br> orders over $120</p>
                                    </div>
                                </a>
                            </div>
                        </figure>
                    </div>
                @endforeach

            </div>
        </div>
        <!--shipping area end-->

        <!--banner area start-->
        <div class="banner_area">
            <div class="container">
                <h2 class="mb-3">Main Products Categories</h2>
                <div class="row">
                    @foreach ($category as $cat)
                        <div class="col-lg-4 col-md-4 col-6">
                            <figure class="single_banner">
                                <div class="banner_thumb">
                                    <img src="{{ asset('backend/images/' . $cat->image) }}" alt="">
                                    <div class="banner_content">
                                        <h3>{{ $cat->name }}</h3>

                                        <a href="{{ route('get-products.show', $cat) }}">Shop Now</a>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        <!--banner area end-->

        {{-- product slider start --}}
        {{-- product slider end --}}

        <!--product area start-->
        <div class="product_area  mb-95">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="section_title">
                                <h2>Our Products</h2>
                            </div>
                            <div class="product_tab_btn">
                                <ul class="nav" role="tablist" id="nav-tab">
                                    <li>
                                        <a class="active" data-bs-toggle="tab" href="#newArrivalProducts" role="tab"
                                            aria-controls="plant1" aria-selected="true">
                                            New Arrival Products
                                        </a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tab" href="#bestSellerProducts" role="tab"
                                            aria-controls="plant2" aria-selected="false">
                                            Best Seller Products
                                        </a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tab" href="#trendingProducts" role="tab"
                                            aria-controls="plant3" aria-selected="false">
                                            Trending Now
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="newArrivalProducts" role="tabpanel">
                        <div class="row">
                            <div class="product_carousel product_column4 owl-carousel">
                                @foreach ($newArrivalProducts as $product)
                                    <div class="col-lg-3">
                                        <div class="product_items">
                                            <article class="single_product">
                                                <figure>
                                                    <div class="product_thumb">
                                                        <a class="primary_img"
                                                            href="{{ '/get-product_details/' . $product->id }}">
                                                            <img src="{{ asset('backend/images/' . $product->mainimg) }}"
                                                                alt="">
                                                        </a>
                                                        <div class="label_product">
                                                            <span class="label_sale">-7%</span>
                                                        </div>
                                                        <div class="action_links">
                                                            <ul>
                                                                <li class="add_to_cart"><a
                                                                        href="{{ route('cart.add', ['product_id' => $product->id, 'quantity' => 1]) }}"
                                                                        title="Add to cart"><i
                                                                            class="icon-shopping-bag"></i></a>
                                                                </li>
                                                                <li class="wishlist"><a
                                                                        href="{{ '/wishlist/' . $product->id, $quantity = 1 }}"
                                                                        title="Add to Wishlist"><i
                                                                            class="icon-heart"></i></a>
                                                                </li>
                                                                <li class="quick_button"><a
                                                                        href="{{ '/get-product_details/' . $product->id }}"
                                                                        data-bs-toggle="modal" data-bs-target="#modal_box"
                                                                        title="quick view"> <i class="icon-eye"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <figcaption class="product_content">
                                                        <div class="product_rating">
                                                            <ul>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <h4 class="product_name"><a
                                                                href="{{ '/get-product_details/' . $product->id }}">{{ $product->pname }}
                                                                nisi</a></h4>
                                                        <div class="price_box">
                                                            <span class="current_price">{{ $product->dprice }}Rs.</span>
                                                            <span class="old_price">{{ $product->price }}Rs.</span>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </article>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="bestSellerProducts" role="tabpanel">
                        <div class="row">
                            <div class="product_carousel product_column4 owl-carousel">
                                @foreach ($bestSellerProducts as $product)
                                    <div class="col-lg-3">
                                        <div class="product_items">
                                            <article class="single_product">
                                                <figure>
                                                    <div class="product_thumb">
                                                        <a class="primary_img"
                                                            href="{{ '/get-product_details/' . $product->id }}">
                                                            <img src="{{ asset('backend/images/' . $product->mainimg) }}"
                                                                alt="">
                                                        </a>
                                                        <div class="label_product">
                                                            <span class="label_sale">-7%</span>
                                                        </div>
                                                        <div class="action_links">
                                                            <ul>
                                                                <li class="add_to_cart"><a href="cart.html"
                                                                        title="Add to cart"><i
                                                                            class="icon-shopping-bag"></i></a>
                                                                </li>
                                                                <li class="compare"><a href="#"
                                                                        title="Add to Compare"><i
                                                                            class="icon-sliders"></i></a></li>
                                                                <li class="wishlist"><a
                                                                        href="{{ '/wishlist/' . $product->id }}"
                                                                        title="Add to Wishlist"><i
                                                                            class="icon-heart"></i></a>
                                                                </li>
                                                                <li class="quick_button"><a
                                                                        href="{{ '/get-product_details/' . $product->id }}"
                                                                        data-bs-toggle="modal" data-bs-target="#modal_box"
                                                                        title="quick view"> <i class="icon-eye"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <figcaption class="product_content">
                                                        <div class="product_rating">
                                                            <ul>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <h4 class="product_name"><a
                                                                href="{{ '/get-product_details/' . $product->id }}">{{ $product->pname }}
                                                                nisi</a></h4>
                                                        <div class="price_box">
                                                            <span class="current_price">{{ $product->dprice }}Rs.</span>
                                                            <span class="old_price">{{ $product->price }}Rs.</span>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </article>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="trendingProducts" role="tabpanel">
                        <div class="row">
                            <div class="product_carousel product_column4 owl-carousel">
                                @foreach ($trendingProducts as $product)
                                    <div class="col-lg-3">
                                        <div class="product_items">
                                            <article class="single_product">
                                                <figure>
                                                    <div class="product_thumb">
                                                        <a class="primary_img"
                                                            href="{{ '/get-product_details/' . $product->id }}">
                                                            <img src="{{ asset('backend/images/' . $product->mainimg) }}"
                                                                alt="">
                                                        </a>
                                                        <div class="label_product">
                                                            <span class="label_sale">-7%</span>
                                                        </div>
                                                        <div class="action_links">
                                                            <ul>
                                                                <li class="add_to_cart"><a href="cart.html"
                                                                        title="Add to cart"><i
                                                                            class="icon-shopping-bag"></i></a>
                                                                </li>
                                                                <li class="compare"><a href="#"
                                                                        title="Add to Compare"><i
                                                                            class="icon-sliders"></i></a></li>
                                                                <li class="wishlist"><a
                                                                        href="{{ '/wishlist/' . $product->id }}"
                                                                        title="Add to Wishlist"><i
                                                                            class="icon-heart"></i></a>
                                                                </li>
                                                                <li class="quick_button"><a
                                                                        href="{{ '/get-product_details/' . $product->id }}"
                                                                        data-bs-toggle="modal" data-bs-target="#modal_box"
                                                                        title="quick view"> <i class="icon-eye"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <figcaption class="product_content">
                                                        <div class="product_rating">
                                                            <ul>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <h4 class="product_name"><a
                                                                href="{{ '/get-product_details/' . $product->id }}">{{ $product->pname }}
                                                                nisi</a></h4>
                                                        <div class="price_box">
                                                            <span class="current_price">{{ $product->dprice }}Rs.</span>
                                                            <span class="old_price">{{ $product->price }}Rs.</span>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </article>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--product area end-->



        <section>
            <div class="container">
                <div class="row">
                    @foreach ($about as $items)
                        <div class="col-lg-6">
                            <figcaption class="about_content">
                                <p>{{ strip_tags($items->desc) }} </p>

                            </figcaption>
                        </div>
                        <div class="col-lg-6">
                            <div class="about_thumb">
                                <img src="{{ asset('backend/images/' . $items->image) }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!--testimonial area start-->
        <div class="testimonial_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>What Our Customers Says ?</h2>
                        </div>
                    </div>
                </div>
                <div class="testimonial_container">
                    <div class="row">
                        <div class="testimonial_carousel owl-carousel">
                            @foreach ($feedback as $feed)
                                <div class="col-12">
                                    <div class="single-testimonial">
                                        <div class="testimonial-icon-img">
                                            <img src="{{ asset('frontend/assets/img/about/testimonials-icon.png') }}"
                                                alt="">
                                        </div>
                                        <div class="testimonial_content">
                                            <p>{{ strip_tags($feed->desc) }}</p>
                                            <div class="testimonial_text_img">
                                                <img src="{{ asset('backend/images/' . $feed->image) }}" alt="">
                                            </div>
                                            <div class="testimonial_author">
                                                <p>{{ $feed->rname }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--testimonial area end-->
    @endsection

    @section('script')
        <script>
            $('.add-to-cart-btn').on('click', function() {
                var product_id = $(this).data('product-id');

                $.ajax({
                    url: '/add-to-cart',
                    type: 'POST',
                    data: {
                        product_id: product_id
                    },
                    success: function(response) {
                        alert(response.message); // Show success message
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        </script>
    @endsection
