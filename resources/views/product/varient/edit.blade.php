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
                    <h3 class="card-title">Edit - {{$variant->name}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{url('products/variant/update',$variant->id)}}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            @include('layouts.partials.error-message')

                            <div class="col-md-6">
                                <div class="form-group input-group-sm {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="key">Key <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " id="key" name="key"
                                           value="{{ $variant->key }}" placeholder="Enter name">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="status" name="status"
                                            style="width: 100%;">
                                        <option selected="selected" value="Drafts" disabled>Select Status</option>
                                        <option {{($variant->status=='Published') ? 'selected':''}}>Published</option>
                                        <option {{($variant->status=='Drafts') ? 'selected':''}}>Drafts</option>
                                        <option {{($variant->status=='Pending') ? 'selected':''}}>Pending</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Varient Values</label>
                                    <select class="select2" multiple="multiple" name="values[]"
                                            data-placeholder="Select a State" style="width: 100%;">
                                        <option>S</option>
                                        @php
                                            $datas = explode(",",$variant->value);
                                            foreach ($datas as $data){
                                                echo "<option selected='selected'>$data</option>";
                                            }
                                        @endphp
                                        <option>L</option>
                                        <option>XL</option>
                                        <option>XXL</option>
                                        <option>XXXl</option>
                                        <option>Red</option>
                                        <option>Blue</option>
                                        <option>Orange</option>
                                        <option>Yellow</option>
                                        <option>Black</option>
                                        <option>Green</option>
                                        <option>Pest</option>
                                    </select>
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

        $(function () {
            $('#image').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {

                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        })
    </script>
@endsection