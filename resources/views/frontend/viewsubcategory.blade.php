@extends('frontend.layouts.main')
@section('main-container')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Shop</h3>
                        <ul>
                            <li><a href="{{ '/' }}">home</a></li>
                            <li>shop</li>
                            @if (isset($category->name))
                                <li>{{ $category->name }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shop  area start-->
    <div class="shop_area shop_reverse mt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            <div class="widget_list widget_categories">
                                <h3>Are You</h3>
                                <ul>
                                    <li class="widget_sub_categories sub_categories1"><a href="javascript:void(0)">Teacher</a>
                                        <ul class="widget_dropdown_categories dropdown_categories1">
                                            <li><a href="#">Document</a></li>
                                            <li><a href="#">Dropcap</a></li>
                                            <li><a href="#">Dummy Image</a></li>
                                            <li><a href="#">Dummy Text</a></li>
                                            <li><a href="#">Fancy Text</a></li>
                                        </ul>
                                    </li>
                                    <li class="widget_sub_categories sub_categories2"><a href="javascript:void(0)">Parent</a>
                                        <ul class="widget_dropdown_categories dropdown_categories2">
                                            <li><a href="#">Flickr</a></li>
                                            <li><a href="#">Flip Box</a></li>
                                            <li><a href="#">Cocktail</a></li>
                                            <li><a href="#">Frame</a></li>
                                            <li><a href="#">Flickrq</a></li>
                                        </ul>
                                    </li>
                                    <li class="widget_sub_categories sub_categories3"><a
                                            href="javascript:void(0)">Buying A Gift</a>
                                        <ul class="widget_dropdown_categories dropdown_categories3">
                                            <li><a href="#">Platform Beds</a></li>
                                            <li><a href="#">Storage Beds</a></li>
                                            <li><a href="#">Regular Beds</a></li>
                                            <li><a href="#">Sleigh Beds</a></li>
                                            <li><a href="#">Laundry</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget_list widget_filter">
                                <h3>Filter by price</h3>
                                <form action="#">
                                    <div id="slider-range"></div>
                                    <button type="submit">Filter</button>
                                    <input type="text" name="text" id="amount" />

                                </form>
                            </div>
                            <div class="widget_list widget_color">
                                <h3>Product Categories</h3>
                                <ul>
                                    @foreach ($category as $cat )
                                    <li>
                                        <a href="{{ route('get-products.show', $cat) }}">{{$cat->name}}</span></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget_list widget_color">
                                <h3>Age</h3>
                                <ul>
                                    <li>
                                        <a href="#">1-5</a>
                                    </li>
                                    <li>
                                        <a href="#">5-10</a>
                                    </li>
                                    <li>
                                        <a href="#">10-15</a>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-bs-toggle="tooltip"
                                title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-bs-toggle="tooltip"
                                title="4"></button>

                            <button data-role="grid_list" type="button" class="btn-list" data-bs-toggle="tooltip"
                                title="List"></button>
                        </div>
                        <div class=" niceselect_option">
                            <form class="select_option" action="#">
                                <select name="orderby" id="short">

                                    <option selected value="1">Sort by average rating</option>
                                    <option value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                    <option value="6">Product Name: Z</option>
                                </select>
                            </form>
                        </div>
                        <div class="page_amount">
                            <p>Showing 1–9 of 21 results</p>
                        </div>
                    </div>
                    <!--shop toolbar end-->

                    <div class="row shop_wrapper">
                        @if (isset($products) && (is_array($products) || is_object($products)))
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-4 col-12 ">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img"
                                                    href="{{ '/get-product_details/' . $product->id }}"><img
                                                        src="{{ asset('backend/images/' . $product->mainimg) }}"
                                                        alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">-7%</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                title="Add to cart"><i class="icon-shopping-bag"></i></a>
                                                        </li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i
                                                                    class="icon-sliders"></i></a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                title="Add to Wishlist"><i class="icon-heart"></i></a>
                                                        </li>
                                                        <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#modal_box" title="quick view"> <i
                                                                    class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="action_links list_action">
                                                    <ul>
                                                        <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#modal_box" title="quick view"> <i
                                                                    class="icon-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product_content grid_content">
                                                <div class="product_price_rating">
                                                    <div class="product_rating">
                                                        <ul>
                                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <h4 class="product_name">
                                                        <a
                                                            href="{{ '/product_details/' . $product->id }}">{{ $product->pname }}</a>
                                                    </h4>
                                                    <div class="price_box">
                                                        <span class="current_price">{{ $product->dprice }}Rs.</span>
                                                        <span class="old_price">{{ $product->price }}rs.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product_content list_content">
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
                                                        href="{{ '/product_details/' . $product->id }}">{{ $product->pname }}</a>
                                                </h4>
                                                <div class="price_box">
                                                    <span class="current_price">{{ $product->dprice }}Rs.</span>
                                                    <span class="old_price">{{ $product->dprice }}Rs.</span>
                                                </div>
                                                <div class="product_desc">
                                                    <p>{{ $product->sdesc }}</p>
                                                </div>
                                                <div class="action_links list_action_right">
                                                    <ul>
                                                        <li class="add_to_cart"><a href="cart.html"
                                                                title="Add to cart">Add
                                                                to
                                                                cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                title="Add to Wishlist"><i class="icon-heart"></i></a>
                                                        </li>
                                                        <li class="compare"><a href="#" title="Add to Compare"><i
                                                                    class="icon-sliders"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </figure>
                                    </article>
                                </div>
                            @endforeach


                        @else
                            <p>No categories found. Redirecting to the shop page...</p>
                            <?php
                            $shopRoute = route('shop.index');
                            ?>
                            <script>
                                window.location.href = "{{ $shopRoute }}";
                            </script>
                        @endif
                    </div>


                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
@endsection
