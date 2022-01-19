@extends('layouts.master')
@section('title')
    Brand
@endsection
@section('pageName')
    Brand list
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Product</a></li>
    <li class="breadcrumb-item"><a href=" {{ route('products.brand.list') }}">Brand</a></li>
    <li class="breadcrumb-item active">List</li>
@endsection
@section('content')
    @include('product.brand.partials.show')
    @include('product.brand.partials.delete')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('products.brand.create') }}" class="btn btn-success float-right"><i class="fas fa-plus"></i>
                Create New Brand</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="brandTable" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr class="text-center" id="row_{{ $brand->id }}">
                            {{-- {{($category->status=='Drafts') ? 'text-warning':'text-danger'}} --}}
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>
                                <span
                                    class="{{ $brand->status == 'Published' ? 'badge badge-primary' : ($brand->status == 'Drafts' ? 'badge badge-warning' : 'badge badge-danger') }}">
                                    {{ $brand->status }}</span>
                            </td>
                            <td><img src="{{ asset('storage/brand/' . $brand->image) }}" style="width: 100px;height: 60px">
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#showModal"
                                    onclick="showModal({{ $brand->id }})"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-primary btn-sm" href="{{ url('/products/brand/edit/' . $brand->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm" onclick="datadelete({{ $brand }})"
                                    data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></a>
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
        // datatable
        $(function() {
            $("#brandTable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#brandTable_wrapper .col-md-6:eq(0)');

        });

        // delete brand

        let globalId = 0

        function datadelete(brand) {
            let modal = $('#deleteModal');
            $(modal).find('#deleteID').val(brand.id);
            document.getElementById("item_name").innerHTML=brand.name;
            globalId = brand.id;
        }
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#delete').submit(function(e) {
                e.preventDefault();
                let data = {
                    id: globalId
                };
                console.log(globalId);
                $.ajax({
                    url: '/products/brand/delete',
                    data: data,
                    type: 'PUT',
                    success: function(response) {
                        $("#row_" + response.id).remove();
                        $('#deleteModal').modal('hide')
                        toastr.error('Brand-> '+response.name+' Was Deleted Successfully!!!');
                    },
                    error: function(response) {}
                })
            });
        });

        // show brand
         function showModal(id){
            let modal = $('#showModal');
            let data = {
                id:id,
            };
            $.ajax({
                url:'/products/brand/show',
                type:'GET',
                data:data,
                success:function(data){
                    console.log(data);
                    $(modal).find('#name').val(data.name);
                    $(modal).find('#status').val(data.status);
                    $(modal).find('#descriptionmodal').val(data.description);
                    let image='/../storage/brand/'+data.image;
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
