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

                                    <form action="{{ '/about/add/update/' .$edit->id }}" method="Post"
                                        enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                        @csrf
                                        @method('PUT')
                                            <label class="form-label-title col-sm-3 mb-0">Choose File</label>
                                            <div class="col-sm-9">
                                                <img src="{{ asset('backend/images/' . $edit->image) }}" alt="img" width="50px"
                                                height="50px">
                                                <input class="form-control" type="file" name="image">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-12 row align-items-center">
                                                <label class="form-label-title col-sm-12 mb-0">Description</label>
                                                <div class="col-sm-12">
                                                    <textarea name="desc" id="editor1" placeholder="Description" > {{$edit->desc}}</textarea>
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
