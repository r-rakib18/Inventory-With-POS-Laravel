@extends('layouts.master')
@section('title')
category
@endsection
@section('pageName')
     Category
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Product</a></li>
    <li class="breadcrumb-item"><a href=" {{ route('products.category.list') }}">Category</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create New Category </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="multipart/form-data" id="storeCategoryInfo">
                    @csrf
                    {{--<form method="POST" enctype="multipart/form-data" id="storeCategoryInfo"  >--}}
                        @include('layouts.partials.error-message')

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group input-group-sm {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Category Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="name" name="name"
                                           value="{{ old('name') }}" placeholder="Enter name">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                     <select class="form-control" id="status" name="status"style="width: 100%;">
                                        <option selected="selected" value="Drafts" disabled>Select Status</option>
                                        <option value="Published">Published</option>
                                        <option value="Drafts">Drafts</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Parent Category</label>
                                    <select name="parent_category" id="parent_category" class="form-control select2bs4"
                                            style="width: 100%;">
                                        <option selected="selected" value="0">This is Parent</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="row justify-content-center text-center">
                                    <label class="col-md-12" for="image">Image</label>
                                    <div class="card border w-50">
                                        <div class="card-body">
                                            <img id="image_preview_container"
                                                 src="{{ asset('storage/default.png') }}"
                                                 alt="preview image" style="width: 100%">
                                        </div>
                                        <div class="text-center col-md-12 form-group input-group-sm {{ $errors->has('image') ? ' has-error' : '' }}">
                                            <input type="file" class="form-control-file" name="image"
                                                   value="{{ old('image') }}"
                                                   id="image">
                                            <small class="text-danger">{{ $errors->first('image') }}</small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <label for="description" class="ml-2">Description</label>
                            <div class="col-md-12">
                                <textarea name="description" id="description" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // for ck editor
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
            });

            // select for secletor
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });

        // image preview
        $('#image').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {

                $('#image_preview_container').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        });

        // ajax setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //validation
        $(function () {

            $('#storeCategoryInfo').submit(function (e) {
                e.preventDefault();
                let formdata = new FormData(this);
                $.ajax({
                    url: '/products/category/store',
                    data: formdata,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        document.getElementById('name').value = '',
                        document.getElementById('description').value = ''
                        document.getElementById('status').value = '',
                        document.getElementById('parent_category').value = 0,
                        document.getElementById('image').value = '',
//                        document.getElementById('description').setData('');
                        toastr.success(response.success);
                    },
                    error: function (error) {
//                        console.log(error);
                        toastr.error('Something Went Wrong');
                    }
                })
            })

        });
    </script>

@endsection

