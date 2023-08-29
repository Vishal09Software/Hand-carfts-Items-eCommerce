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
                                    <form action="{{'/admin/product/add/'}}" method="post" enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="pname" placeholder="Product Name">
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Category</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100 category" name="category_id"  id="categorySelect">
                                                    <option selected disabled>Category Menu</option>
                                                    @if ($categories->isNotEmpty())
                                                        @foreach ($categories as $categorie)
                                                            <option value="{{ $categorie->id }}">{{ $categorie->name }}
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
                                                        placeholder="Price">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Discount</label>
                                            <div class="col-sm-9">
                                                <div class="bs-example">
                                                    <input type="text" class="form-control" name="dprice"
                                                        placeholder="Discount Price">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Age</label>
                                            <div class="col-sm-9">
                                                <div class="bs-example ">
                                                    <input type="checkbox" class="form-check-input" name="age[]"
                                                        id="" value="1-5"> 1-5
                                                    <input type="checkbox" class="form-check-input" name="age[]"
                                                        id="" value="5-10"> 5-10
                                                    <input type="checkbox" class="form-check-input" name="age[]"
                                                        id="" value="10-15"> 10-15
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Product For:</label>
                                            <div class="col-sm-9">
                                                <div class="bs-example ">
                                                    <input type="checkbox" class="form-check-input" name="type[]"
                                                        id="" value="new arrival"> New Arrival Products
                                                    <input type="checkbox" class="form-check-input" name="type[]"
                                                        id="" value="best seller"> Best Seller Products
                                                    <input type="checkbox" class="form-check-input" name="type[]"
                                                        id="" value="trending now"> Trending Now
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Are You:</label>
                                            <div class="col-sm-9">
                                                <div class="bs-example ">
                                                    <input type="checkbox" class="form-check-input" name="areyou[]"
                                                        id="" value="teacher"> A Teacher
                                                    <input type="checkbox" class="form-check-input" name="areyou[]"
                                                        id="" value="parent"> A Parent
                                                    <input type="checkbox" class="form-check-input" name="areyou[]"
                                                        id="" value="gift"> Buying A Gift
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
                                                            <input class="form-control form-choose" type="file"
                                                                id="formFile" name="mainimg">
                                                        </div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <label class="col-sm-3 col-form-label form-label-title">Sub
                                                            Images (Multiple)</label>
                                                        <div class="col-sm-9">
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
                                                                    <textarea name="pdesc" id="editor1" placeholder="Description"></textarea>
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
                                                                placeholder="Short Description"></textarea>
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
                                                                    <textarea name="pspdesc" id="editor2" placeholder="Description"></textarea>
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
                                                                placeholder="Meta title" name="mtitle">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row">
                                                        <label class="form-label-title col-sm-3 mb-0">Meta
                                                            Description</label>
                                                            <div class="col-sm-9">
                                                                <textarea id="" cols="53" rows="2" name="mdesc" class="p-2"
                                                                placeholder="Short Description"></textarea>
                                                            </div>
                                                    </div>
                                                </div>

                                                <div class="theme-form theme-form-2 mega-form">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-3 mb-0">OG title</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="search"
                                                                placeholder="OG title" name="otitle">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row">
                                                        <label class="form-label-title col-sm-3 mb-0">OG
                                                            Description</label>
                                                            <div class="col-sm-9">
                                                                <textarea id="" cols="53" rows="2" name="odesc" class="p-2"
                                                                placeholder="Short Description"></textarea>
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

            <div class="row">
                <table class="table all-package theme-table" id="table_id">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->category_id }}</td>
                                <td>{{ $data->pname }}</td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->dprice }}</td>
                                <td>
                                    <ul>
                                        <li>
                                            <a href="{{ '/admin/product/add/edit/' . $data->id }}">
                                                <i class="ri-pencil-line"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ '/admin/product/add/delete/' . $data->id }}">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
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

<script>
    CKEDITOR.replace('editor3');
</script>

    @endsection
