@extends('backend.layouts.main')
@section('main-container')
    <div class="page-body">

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Category Information</h5>
                                    </div>
                                    @if (session('status'))
                                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                                    @endif

                                    @if ($errors->any())
                                    @endif

                                    <form action="{{ '/subcategory/add/update/' . $subcategories->id }}" method="Post"
                                        enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                            <div class="col-sm-9">
                                                <input id="my-input" class="form-control" type="text" name="subcate_name"
                                                     value="{{ $subcategories->subcate_name }}">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Sub Category</label>
                                            <div class="col-sm-9">
                                                <select id="my-select" class="form-control" name="category_id">
                                                    <option value="">Select a Category</option>
                                                    @foreach ($categories as $cat)
                                                        <option value="{{ $cat->id }}" {{ $cat->id == $subcategories->category_id ? 'selected' : '' }}>
                                                            {{ $cat->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <label for="my-input" class="form-label-title col-sm-3 mb-5">Status : </label>
                                        <span>Active</span>
                                        <input id="my-input" type="radio" name="status" value="1"
                                            {{ $subcategories->status == '1' ? 'checked' : '' }}>
                                        <span>Deactive</span>
                                        <input id="my-input" type="radio" name="status" value="0"
                                            {{ $subcategories->status == '0' ? 'checked' : '' }}>

                                        <div class="mb-4 row align-items-center">

                                            <label class="form-label-title col-sm-3 mb-0">Choose File</label>
                                            <div class="col-sm-9">
                                                <img src="{{ asset('backend/images/' . $subcategories->image) }}" alt="img"
                                                    width="50px" height="50px">
                                                <input class="form-control" type="file" name="image">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-12 row align-items-center">
                                                <label class="form-label-title col-sm-12 mb-0">Description</label>
                                                <div class="col-sm-12">
                                                    <textarea name="desc" id="editor1" placeholder="Description"> {{ $subcategories->desc }}</textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <input type="Submit" class="btn btn-info mt-3" value="Update">
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
    @endsection
