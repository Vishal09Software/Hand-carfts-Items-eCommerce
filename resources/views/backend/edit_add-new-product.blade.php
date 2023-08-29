@extends('backend.layouts.main')
@section('main-container')
    <div class="page-body">

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Product Information</h5>
                                    </div>
                                    @if (session('status'))
                                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                                    @endif

                                    @if ($errors->any())
                                    @endif



                                    <form action="{{ '/admin/product/add/update/' . $products->id }}" method="post"
                                        enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                        @csrf
                                        @method('put')
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="pname"
                                                    placeholder="Product Name" value="{{ $products->pname }}">
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Category</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100 category" name="category_id"
                                                    id="category">
                                                    <option selected disabled>Category Menu</option>
                                                    @if ($categories->isNotEmpty())
                                                        @foreach ($categories as $categorie)
                                                            <option value="{{ $categorie->id }}"
                                                                {{ $categorie->name == $categorie->id ? 'selected' : '' }}>
                                                                {{ $categorie->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>


                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Unit Price(MRP)</label>
                                            <div class="col-sm-9">
                                                <div class="bs-example">
                                                    <input type="text" class="form-control" name="price"
                                                        placeholder="Price" value="{{ $products->price }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Discount</label>
                                            <div class="col-sm-9">
                                                <div class="bs-example">
                                                    <input type="text" class="form-control" name="dprice"
                                                        placeholder="Discount Price" value="{{ $products->dprice }}">
                                                </div>
                                            </div>
                                        </div>

                                        @php
                                            $age = [];

                                            // Make sure $products->age is not empty and is a valid JSON string
                                            if (!empty($products->age)) {
                                                $decodedAge = json_decode($products->age, true);
                                                // Check if decoding was successful and the result is an array
                                                if (is_array($decodedAge)) {
                                                    $age = $decodedAge;
                                                }
                                            }
                                        @endphp

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Age</label>
                                            <div class="col-sm-9">
                                                <div class="bs-example">
                                                    <input type="checkbox" class="form-check-input" name="age[]"
                                                        value="1-5" {{ in_array('1-5', $age) ? 'checked' : '' }}> 1-5
                                                    <input type="checkbox" class="form-check-input" name="age[]"
                                                        value="5-10" {{ in_array('5-10', $age) ? 'checked' : '' }}> 5-10
                                                    <input type="checkbox" class="form-check-input" name="age[]"
                                                        value="10-15" {{ in_array('10-15', $age) ? 'checked' : '' }}>
                                                    10-15
                                                </div>
                                            </div>
                                        </div>


                                        @php
                                            $pts = [];

                                            // Make sure $products->age is not empty and is a valid JSON string
                                            if (!empty($products->pts)) {
                                                $decodedPts = json_decode($products->pts, true);

                                                // Check if decoding was successful and the result is an array
                                                if (is_array($decodedPts)) {
                                                    $age = $decodedPts;
                                                }
                                            }
                                        @endphp

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Product For:</label>
                                            <div class="col-sm-9">
                                                <div class="bs-example ">
                                                    <input type="checkbox" class="form-check-input" name="type[]"
                                                        id="" value="new arrival"
                                                        {{ in_array('new arrival', $age) ? 'checked' : '' }}> New Arrival
                                                    Products
                                                    <input type="checkbox" class="form-check-input" name="type[]"
                                                        id="" value="best seller"
                                                        {{ in_array('best seller', $pts) ? 'checked' : '' }}> Best Seller
                                                    Products
                                                    <input type="checkbox" class="form-check-input" name="type[]"
                                                        id="" value="trending now"
                                                        {{ in_array('trending now', $pts) ? 'checked' : '' }}> Trending Now
                                                </div>


                                            </div>
                                        </div>

                                        @php
                                            $you = [];

                                            // Make sure $products->age is not empty and is a valid JSON string
                                            if (!empty($products->you)) {
                                                $decodedYou = json_decode($products->you, true);

                                                // Check if decoding was successful and the result is an array
                                                if (is_array($decodedYou)) {
                                                    $age = $decodedYou;
                                                }
                                            }
                                        @endphp

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Are You:</label>
                                            <div class="col-sm-9">
                                                <div class="bs-example ">
                                                    <input type="checkbox" class="form-check-input" name="areyou[]"
                                                        id="" value="teacher"
                                                        {{ in_array('teacher', $you) ? 'checked' : '' }}> A Teacher
                                                    <input type="checkbox" class="form-check-input" name="areyou[]"
                                                        id=""
                                                        value="parent"{{ in_array('parent', $you) ? 'checked' : '' }}>
                                                    A Parent
                                                    <input type="checkbox" class="form-check-input" name="areyou[]"
                                                        id="" value="gift"
                                                        {{ in_array('gift', $you) ? 'checked' : '' }}> Buying A Gift
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-header-2">
                                                    <h5>Product Images</h5>
                                                </div>

                                                <div class="theme-form theme-form-2 mega-form">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-sm-3 col-form-label form-label-title">Main
                                                            Image</label>
                                                        <div class="col-sm-9">
                                                            <img src="{{ asset('backend/images/' . $products->mainimg) }}"
                                                                alt="img" width="50px" height="50px">
                                                            <input class="form-control form-choose" type="file"
                                                                id="formFile" name="mainimg">
                                                        </div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <label class="col-sm-3 col-form-label form-label-title">Sub
                                                            Images (Multiple)</label>
                                                        <div class="col-sm-9">
                                                            @foreach (json_decode($products->subimg) as $image)
                                                                <img src="{{ asset('backend/images/' . $image) }}"
                                                                    width="50px" height="50px" alt="Sub Image">
                                                            @endforeach

                                                            <input class="form-control form-choose" type="file"
                                                                id="formFileMultiple1" multiple name="subimg[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-header-2">
                                                    <h5>Description</h5>
                                                </div>
                                                <div class="theme-form theme-form-2 mega-form">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <label class="form-label-title col-sm-3 mb-0">Product
                                                                    Description</label>
                                                                <div class="col-sm-9">
                                                                    <textarea name="pdesc" id="editor1" placeholder="Description">{{ $products->pdesc }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Short
                                                        Description</label>
                                                    <div class="col-sm-9">
                                                        <div class="bs-example">
                                                            <textarea id="" cols="53" rows="2" name="psdesc" class="p-2"
                                                                placeholder="Short Description">{{ $products->psdesc }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="theme-form theme-form-2 mega-form">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <label class="form-label-title col-sm-3 mb-0">Product
                                                                    Specification</label>
                                                                <div class="col-sm-9">
                                                                    <textarea name="pspdesc" id="editor2" placeholder="Description">{{ $products->pspdesc }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-header-2">
                                                    <h5>Meta Information</h5>
                                                </div>

                                                <div class="theme-form theme-form-2 mega-form">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-3 mb-0">Meta title</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="search"
                                                                placeholder="Meta title" name="mtitle"
                                                                value="{{ $products->mtitle }}">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row">
                                                        <label class="form-label-title col-sm-3 mb-0">Meta
                                                            Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="mdesc" cols="53" rows="2" placeholder="Description">{{ $products->mdesc }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="theme-form theme-form-2 mega-form">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-3 mb-0">OG title</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="search"
                                                                placeholder="OG title" name="otitle"
                                                                value="{{ $products->otitle }}">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row">
                                                        <label class="form-label-title col-sm-3 mb-0">OG
                                                            Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea name="odesc" cols="53" rows="2" placeholder="Description">{{ $products->odesc }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="Submit" class="btn btn-info mt-3" value="Submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Product Add End -->
    @endsection
    @section('scripts')
        <script>
            CKEDITOR.replace('editor1');
        </script>

        <script>
            CKEDITOR.replace('editor2');
        </script>
    @endsection
