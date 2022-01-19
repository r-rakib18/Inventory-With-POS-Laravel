@extends('layouts.master')
@section('title')
    Category
@endsection
@section('pageName')
    Category Edit
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Product</a></li>
    <li class="breadcrumb-item"><a href=" {{ route('products.category.list') }}">Category</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit - {{$vat->item_head}} </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{url('products/vat/update',$vat->id)}}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            {{--@include('layouts.partials.error-message')--}}
                            <div class="col-md-6">
                                <div class="form-group input-group-sm {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="item_head">Iteam Head <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="item_head" name="item_head"
                                           value="{{ $vat->item_head }}" placeholder="Enter name">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control select2bs4" id="status" name="status" style="width: 100%;">
                                        <option {{($vat->status=='Published') ? 'selected':''}}>Published</option>
                                        <option {{($vat->status=='Drafts') ? 'selected':''}}>Drafts</option>
                                        <option {{($vat->status=='Pending') ? 'selected':''}}>Pending</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{--@include('layouts.partials.error-message')--}}
                            <div class="col-md-6">
                                <div class="form-group input-group-sm ">
                                    <label for="value">Vat Value (%) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="value" name="value"
                                           value="{{ $vat->value }}" placeholder="Enter Value Here">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <label for="description" class="ml-2">Description</label>
                            <div class="col-md-12">
                                <textarea name="description" id="description" cols="30" rows="10">{{$vat->description}}</textarea>
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
        $(function () {
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
@endsection