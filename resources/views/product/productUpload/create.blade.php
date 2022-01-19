@extends('layouts.master')
@section('title')
    Product
@endsection
@section('pageName')
    Product
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Product</a></li>
    <li class="breadcrumb-item"><a href=" {{ route('products.product.list') }}">All Product</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create New Catgory </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="multipart/form-data" id="storeProductInfo">
                    @csrf
                    {{--<form method="POST" enctype="multipart/form-data" id="storeCategoryInfo"  >--}}
                    @include('layouts.partials.error-message')
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group input-group-sm {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="name" name="name"
                                           value="{{ old('name') }}" placeholder="Enter product name">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category" id="category" class="form-control select2bs4"
                                            style="width: 100%;">
                                        <option  value="0" selected="selected">{{__('Select A Category')}}</option>
                                    @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select name="brand" id="brand" class="form-control select2bs4"
                                            style="width: 100%;">
                                        <option  value="0" selected="selected">{{__('Select A Brand')}}</option>

                                    @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tags</label>
                                    <input type="text" class="form-control " id="tag" name="tag"
                                           value="{{ old('name') }}" placeholder="Enter product Tag Here">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vat</label>
                                    <select name="vat" id="vat" class="form-control select2bs4"
                                            style="width: 100%;">
                                        <option  value="0" selected="selected">{{__('Select A Vat')}}</option>
                                        @foreach($vats as $vat)
                                            <option value="{{$vat->id}}">{{$vat->item_head}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row justify-content-center text-center">
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
                        {{--============================================Product attribute Set======================================--}}
                        <div class="products_attribute_sets mt-3">
                            <label for="attribute_set"> Attribute Set</label>
                            <div class="row">
                                {{--variant 1--}}
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Attribute-1<span class="text-danger">*</span></label>
                                        <select name="variant1" id="variant1" class="form-control select2bs4"
                                                style="width: 100%;">
                                            <option value="0" selected="selected" disabled>Select Variant</option>
                                            @foreach($variants as $variant)
                                                <option value="{{$variant->id}}">{{$variant->key}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{--variant 2--}}
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Attribute-2 (Optional)</label>
                                        <select name="variant2" id="variant2" class="form-control select2bs4"
                                                style="width: 100%;">
                                            <option value="0" selected="selected" disabled>Select Variant</option>
                                            @foreach($variants as $variant)
                                                <option value="{{$variant->id}}">{{$variant->key}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{--variant 3--}}
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Attribute-3 (Optional)</label>
                                        <select name="variant3" id="variant3" class="form-control select2bs4"
                                                style="width: 100%;">
                                            <option value="0" selected="selected" disabled>Select Variant</option>
                                            @foreach($variants as $variant)
                                                <option value="{{$variant->id}}">{{$variant->key}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="float-right ">
                                        <a class="btn btn-success mt-4" onclick="generateCombination()"><i
                                                    class="fas fa-plus"></i>Make Combination</a>
                                    </div>
                                </div>
                            </div>
                            <div id="attributesets">
                            </div>
                        </div>
                        {{--============================================Product attribute Set======================================--}}


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
        function remove(id) {
            var row = document.getElementById(id);
            row.remove();
            toastr.error('Attribute Sets Removed');
        }
        function generateCombination() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let varient = {
                variant1: $('#variant1').val(),
                variant2: $('#variant2').val(),
                variant3: $('#variant3').val(),
            };
            $.ajax({
                url: '/products/product/attributeSet',
                data: varient,
                type: 'GET',
                success: function (response) {
                    for (let i = 0; i < response.length; i++) {
                        var newRow = document.createElement('div');
                        newRow.className = "row border-bottom border-primary 1px mb-2";
                        $('#attributesets').prepend(`<div class="row active_class border-bottom border-primary 1px mb-2" id="` + i + `" ><div class='col-md-3'> <div class='form-group'> <input type='text' class='form-control' id='attribute_set' name='attribute_set[]' value="` + response[i] + `"  readonly> </div> </div> <div class='col-md-2'> <div class='form-group'> <input type='text' class='form-control' id='price' name='price[]'  placeholder='Price'> </div> </div> <div class='col-md-2'> <div class='form-group'> <input type='text' class='form-control' id='sku' name='sku[]' value='' placeholder='SKU'> </div> </div> <div class='col-md-2'> <div class='form-group'> <input type='text' class='form-control' id='barcode' name='barcode[]' placeholder='Barcode'> </div> </div> <div class='col-md-2'> <div class='form-group'><div class="form-group"><select class="form-control" id="status" name="status[]"style="width: 100%;"><option selected="selected" value="Drafts" disabled>Select Status</option><option value="Published">Published</option><option value="Drafts">Drafts</option><option value="Pending">Pending</option></select></div> </div> </div> <div class='col-md-1'> <button type='button' class='btn btn-danger btn-sm' onclick='remove(` + i + `)'><i class='fas fa-trash'></i></button></div> <hr></div>`);
                    }
                },
                error: function (response) {
                    toastr.error('Something Went Wrong');
                }
            })
        }

        // for ck editor
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
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
            // store category
            $('#storeProductInfo').submit(function (e) {
                e.preventDefault();
                let formdata = new FormData(this);
                console.log(formdata);
                $.ajax({
                    url: '/products/product/store',
                    data: formdata,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function (response) {
                            toastr.success(response+" products created successfully");
                    },
                    error: function (response) {
                        toastr.error('Something Went Wrong');
                    }
                })
            })

        });
    </script>

@endsection

