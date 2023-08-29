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
                                        <h5>Slider Information</h5>
                                    </div>
                                    @if (session('status'))
                                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                                    @endif

                                    @if ($errors->any())
                                    @endif

                                    <form action="{{ route('slider.store') }}" method="Post"
                                        enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Heading Name </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="heading"
                                                    placeholder="Heading Name">
                                            </div>
                                        </div>

                                        <label for="my-input" class="form-label-title col-sm-3 mb-5">Status : </label>
                                        <span>Active</span>
                                        <input id="my-input" type="radio" name="status" value="1">
                                        <span>Deactive</span>
                                        <input id="my-input" type="radio" name="status" value="0">

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Choose File</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="image">
                                            </div>
                                        </div>
                                        {{-- <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Sub Category</label>
                                            <div class="col-sm-9">
                                                <select name="category_id" id="">
                                                    <option value="">No Sub Category</option>
                                                    @foreach ($categories as $categorie)
                                                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="mb-12 row align-items-center">
                                                <label class="form-label-title col-sm-12 mb-0">Description</label>
                                                <div class="col-sm-12">
                                                    <textarea name="desc" id="editor1" placeholder="Description"></textarea>
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
                <div class="table-responsive category-table">
                    <div>
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>Heading</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($show as $data)
                                <tr>
                                    <td>{{ $data->heading }}</td>
                                     <td>{{ $data->status == '1' ? 'Active' : 'Deactive' }}</td>
                                     <td>
                                        <img src="{{ asset('backend/images/' . $data->image) }}" alt="img" width="30px"
                                     height="30px"></td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{'/slider/add/edit/' . $data->id}}">
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{'/slider/add/delete/' . $data->id}}" >
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $show->links() }}
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
