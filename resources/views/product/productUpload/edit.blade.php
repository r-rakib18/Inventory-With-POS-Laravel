@extends('layouts.master')
@section('title')
    Product
@endsection
@section('pageName')
    Product Edit
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Product</a></li>
    <li class="breadcrumb-item"><a href="{{ route('products.product.list') }}">All Product</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Product- {{ $product->name }} </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="multipart/form-data" action="{{url('/products/product/update',$product->id)}}">
                    @csrf
                    @include('layouts.partials.error-message')
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group input-group-sm ">
                                    <label for="name">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="name" name="name"
                                           value="{{ $product->name }}" placeholder="Enter product name">
                                </div>
                                <div class="form-group input-group-sm ">
                                    <label for="name">Attributes <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="attribute_set" name="attribute_set"
                                           value="{{ $product->attribute_set }}" placeholder="Enter product Attribute here">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category" id="category" class="form-control select2bs4"
                                            style="width: 100%;">
                                        <option  value="0" >{{__('Select A Category')}}</option>
                                    @foreach($categories as $category)
                                            <option {{($category->name==$product->category_name) ? 'selected':''}}  value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select name="brand" id="brand" class="form-control select2bs4"
                                            style="width: 100%;">
                                        <option  value="0" selected="selected">{{__('Select A Brand')}}</option>

                                    @foreach($brands as $brand)
                                            <option {{($brand->name==$product->brand_name) ? 'selected':''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tags</label>
                                    <input type="text" class="form-control " id="tag" name="tag"
                                           value="{{$product->tag}}" placeholder="Enter product Tag Here">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vat</label>
                                    <select name="vat" id="vat" class="form-control select2bs4"
                                            style="width: 100%;">
                                        {{--<option {{($product->vat_status=='Disabled') ? 'selected':''}} value="0" disabled>No Vat</option>--}}
                                        <option  value="0" selected="selected">{{__('Select A Vat')}}</option>
                                    @foreach($vats as $vat)
                                            <option {{($vat->item_head==$product->vat_name) ? 'selected':''}} value="{{$vat->id}}">{{$vat->item_head}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row justify-content-center text-center">
                                    <div class="card border w-50">
                                        <div class="card-body">
                                                <img id="image_preview_container"
                                                     src="{{ ($product->image)? asset('storage/product/' . $product->image):asset('storage/default.png') }}"
                                                     alt="preview image" style="width: 100%">
                                        </div>
                                            <div class="text-center col-md-12 form-group input-group-sm {{ $errors->has('image') ? ' has-error' : '' }}">
                                                <input type="file" class="form-control-file" name="image"
                                                       value="{{ $product->image}}"
                                                       id="image">
                                                <small class="text-danger">{{ $errors->first('image') }}</small>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    <div class="row active_class border-bottom border-primary 1px mb-2" >
                                        <div class='col-md-3'>
                                            <div class='form-group'>
                                                <label>Price</label>
                                                <input type='text' class='form-control' id='price' name='price' value="{{$product->price}}"  placeholder='Price'>
                                            </div>
                                        </div>
                                        <div class='col-md-3'>
                                            <div class='form-group'>
                                                <label>SKU</label>
                                                <input type='text' class='form-control' id='sku' name='sku' value="{{$product->sku}}" placeholder='SKU' {{($product->sku) ? 'readonly':''}}>
                                            </div>
                                        </div>
                                        <div class='col-md-3'>
                                            <div class='form-group'>
                                                <label>Barcode</label>
                                                <input type='text' class='form-control' id='barcode' name='barcode' value="{{$product->barcode}}" placeholder='Barcode'>
                                            </div>
                                        </div>
                                        <div class='col-md-3'>
                                            <div class='form-group'>
                                                <label>Status</label>
                                                <div class="form-group">
                                                    <select class="form-control" id="status" name="status"style="width: 100%;">
                                                        <option {{($product->status=='Published') ? 'selected':''}}>Published</option>
                                                        <option {{($product->status=='Drafts') ? 'selected':''}}>Drafts</option>
                                                        <option {{($product->status=='Pending') ? 'selected':''}}>Pending</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                        <div class="row">
                            <label for="description" class="ml-2">Description</label>
                            <div class="col-md-12">
                                <textarea name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea>
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
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
        // Image preview
        $(function () {

            $('#image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {

                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        })
    </script>
@endsection