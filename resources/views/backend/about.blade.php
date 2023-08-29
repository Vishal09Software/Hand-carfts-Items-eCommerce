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

                                    <form action="{{ route('about.store') }}" method="Post"
                                        enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Choose File</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="image">
                                            </div>
                                        </div>
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
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($show as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                     <td>
                                        <img src="{{ asset('backend/images/' . $data->image) }}" alt="img" width="30px"
                                     height="30px"></td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{'/about/add/edit/' . $data->id}}">
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{'/about/add/delete/' . $data->id}}" >
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
