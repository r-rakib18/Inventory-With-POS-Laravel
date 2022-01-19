@extends('layouts.master')
@section('title')
    Vat
@endsection
@section('pageName')
    Create Vat
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Product</a></li>
    <li class="breadcrumb-item"><a href=" {{ route('products.vat.list') }}">Vat</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create New Vats </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST"  id="storeVatInfo">
                    <div class="card-body">
                        <div class="row">
                            {{--@include('layouts.partials.error-message')--}}
                            <div class="col-md-6">
                                <div class="form-group input-group-sm {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="item_head">Iteam Head <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="item_head" name="item_head"
                                           value="{{ old('item_head') }}" placeholder="Enter name">
                                    <small class="text-danger">{{ $errors->first('item_head') }}</small>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="status" name="status"
                                            style="width: 100%;">
                                        <option selected="selected" value="Drafts" disabled>Select Status</option>
                                        <option value="Published">Published</option>
                                        <option value="Drafts">Drafts</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{--@include('layouts.partials.error-message')--}}
                            <div class="col-md-6">
                                <div class="form-group input-group-sm {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="value">Vat Value (%)<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="value" name="value"
                                           value="{{ old('value') }}" placeholder="Enter Value Here">
                                    <small class="text-danger">{{ $errors->first('value') }}</small>
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

        $(function () {
            //        for ck editor
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


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function () {

            $('#storeVatInfo').submit(function (e) {
                e.preventDefault();
                let formdata = $(this).serialize();
//                let formdata = $(this).serialize();
                console.log(formdata);
                $.ajax({
                    url: '/products/vat/store',
                    data: formdata,
                    type: 'POST',
                    success: function (response) {
                        document.getElementById('item_head').value = '',
                        document.getElementById('value').value = '',
                        toastr.success(response.success);
                    },
                    error: function (response) {
                        toastr.error('Something Went Wrong');
                    }
                })
            })

        });
        /* store teachers data*/

    </script>

@endsection

