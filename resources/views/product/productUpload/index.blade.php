@extends('layouts.master')
@section('title')
Product
@endsection
@section('pageName')
    Product List
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Product</a></li>
<li class="breadcrumb-item"><a href="{{ route('products.product.list') }}">All Product</a></li>
<li class="breadcrumb-item active">List</li>
@endsection
@section('content')
    @include('product.productUpload.partials.show')
    @include('product.productUpload.partials.delete')
    <div class="card">
        <div class="card-header">
            <a href="{{route('products.product.create')}}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Create New Products</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="categoryTable" class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Attribute set</th>
                    <th>Category</th>
                    <th>Vat</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="text-center" id="row_{{$product->id}}">
                        {{--{{($product->status=='Drafts') ? 'text-warning':'text-danger'}}--}}
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{ asset('storage/product/' . $product->image) }}" style="width: 100px;height: 60px"</td>
                        <td>
                            {{$product->name}}
                            <p>Brnad:
                            <a>
                                @foreach($product->brands as $brand)
                                    {{$brand->name}}
                                @endforeach
                            </a>
                            </p>
                        </td>
                        <td>
                         {{$product->attribute_set}}
                        </td>
                        <td>
                            @foreach($product->categories as $category)
                                {{$category->name}}
                            @endforeach
                        </td>
                        <td>{{$product->vat_status}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <span class="{{($product->status=='Published') ? 'badge badge-primary':(($product->status=='Drafts') ? 'badge badge-warning':'badge badge-danger')}}"> {{$product->status}}</span>
                        </td>
                        <td>
                            <a class="btn btn-info btn-sm"  data-toggle="modal" data-target="#showModal" onclick="showModal({{$product->id}})"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="{{url('/products/product/edit/'.$product->id)}}"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm" onclick="datadelete({{$product}})" data-toggle="modal" data-target="#deleteModal" ><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
@section('scripts')
    <script>

        // delete category

        let globalId=0
        function datadelete(product) {
            let modal = $('#deleteModal');
            $(modal).find('#deleteID').val(product.id);
            document.getElementById("item_name").innerHTML=product.name;

            globalId=product.id;
        }

        // ajax setup
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#delete').submit(function (e) {
                e.preventDefault();
                let data = {
                    id:globalId
                };
                console.log(globalId);
                $.ajax({
                    url: '/products/product/delete',
                    data: data,
                    type: 'PUT',
                    success: function (response) {
                        $("#row_"+response.id).remove();
                        $('#deleteModal').modal('hide')
                        toastr.error('Product-> '+response.name+' Was Deleted Successfully!!!');
                    },
                    error: function (response) {
                    }
                })
            });

            // select 2 for seceltor

            $('.select2').select2()
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });



        // datatable
        $(function () {
            $("#categoryTable").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#categoryTable_wrapper .col-md-6:eq(0)');

        });

        // show category
        function showModal(id){
            let modal = $('#showModal');
            let data = {
                id:id,
            };
            $.ajax({
                url:'/products/product/show',
                type:'GET',
                data:data,
                success:function(data){
                    console.log(data.image);
                    $(modal).find('#name').val(data.name);
                    $(modal).find('#status').val(data.status);
                    $(modal).find('#price').val(data.price);
                    $(modal).find('#sku').val(data.sku);
                    $(modal).find('#barcode').val(data.barcode);
                    $(modal).find('#tag').val(data.tag);
                    $(modal).find('#vat_status').val(data.vat_status);
                    $(modal).find('#tag').val(data.tag);
                    $(modal).find('#descriptionmodal').val(data.description);
                    let image='/../storage/product/'+data.image;
                    $(modal).find('#image_preview_container').attr('src',image);
                    $(modal).find('#modal_title').text(data.name);
                },
                error:function(error){
                    console.log(error);
                },
            });
        }
    </script>
@endsection