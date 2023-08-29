@extends('frontend.layouts.main')
@section('main-container')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Wishlist</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->


    <!--wishlist area start -->
    <div class="wishlist_area mt-100">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc wishlist">
                            <div class="cart_page table-responsive">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if ($wishlist->count() > 0)
                                    <table>
                                        <thead>
                                            <tr>
                                                {{-- <th class="product_thumb">Product Id</th> --}}
                                                <th class="product_thumb">Image</th>
                                                <th class="product_name">Product Name</th>
                                                <th class="product-price">Discount Price</th>
                                                <th class="product-price">Price</th>
                                                <th class="product_total">Add To Cart</th>
                                                <th class="product_remove">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($wishlist as $item)
                                                <tr>
                                                    {{-- <td class="product-price">{{ $item->id }}</td> --}}
                                                    <td class="product_thumb">
                                                            <img src="{{ asset('backend/images/' . $item->mainimg) }}"
                                                                alt="">
                                                    </td>
                                                    <td class="product_name">{{ $item->pname }}</td>
                                                    <td class="product-price">{{ $item->dprice }}</td>
                                                    <td class="product-price">{{ $item->price }}</td>
                                                    <td class="product_total"><a href="#">Add To Cart</a></td>
                                                    <td>

                                                        <a href="{{ route('remove-from-wishlist', ['id' => $item->id]) }}">X</a>

                                                </td>



                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h4>There is No Products in Wishlist</h4>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--wishlist area end -->
@endsection
