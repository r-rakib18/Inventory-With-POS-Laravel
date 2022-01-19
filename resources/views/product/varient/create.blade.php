@extends('layouts.master')
@section('title')
    Variant
@endsection
@section('pageName')
    Create Variant
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Product</a></li>
    <li class="breadcrumb-item"><a href=" {{ route('products.variant.list') }}">Variant</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create New Variants </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST"  id="storeVariantInfo">
                    <div class="card-body">
                        <div class="row">
                            {{--@include('layouts.partials.error-message')--}}

                            <div class="col-md-6">
                                <div class="form-group input-group-sm {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="key">Key <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="key" name="key"
                                           value="{{ old('name') }}" placeholder="Enter name">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Varient Values</label>
                                    <input type="text" class="form-control " id="values" name="values"
                                           value="{{ old('values') }}" placeholder="Use Comma ',' to separate multiple values">
                                    {{--<select class="select2" multiple="multiple" name="values[]" data-placeholder="Select a State" style="width: 100%;">--}}
                                        {{--<option>S</option>--}}
                                        {{--<option>M</option>--}}
                                        {{--<option>L</option>--}}
                                        {{--<option>XL</option>--}}
                                        {{--<option>XXL</option>--}}
                                        {{--<option>XXXl</option>--}}
                                        {{--<option>Red</option>--}}
                                        {{--<option>Blue</option>--}}
                                        {{--<option>Orange</option>--}}
                                        {{--<option>Yellow</option>--}}
                                        {{--<option>Black</option>--}}
                                        {{--<option>Green</option>--}}
                                        {{--<option>Pest</option>--}}
                                        {{--<option>5 Kg</option>--}}
                                        {{--<option>3 Kg</option>--}}
                                        {{--<option>4 Kg</option>--}}
                                    {{--</select>--}}
                                </div>
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

            $('#storeVariantInfo').submit(function (e) {
                e.preventDefault();
                let formdata = $(this).serialize();
//                let formdata = $(this).serialize();
                console.log(formdata);
                $.ajax({
                    url: '/products/variant/store',
                    data: formdata,
                    type: 'POST',
                    success: function (response) {
                        document.getElementById('key').value = '',
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

