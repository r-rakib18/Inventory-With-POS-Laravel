@extends('layouts.master')
@section('title')
    Variant
@endsection
@section('pageName')
    Varient List
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Product</a></li>
    <li class="breadcrumb-item"><a href=" {{ route('products.variant.list') }}">Varient</a></li>
    <li class="breadcrumb-item active">List</li>
@endsection
@section('content')
    @include('product.varient.partials.delete')
    <div class="card">
        <div class="card-header">
            <a href="{{route('products.variant.create')}}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Create New Variant</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="variantDataTable" class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Key</th>
                    <th>value</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($variants as $variant)
                <tr class="text-center" id="row_{{$variant->id}}">
                    {{--{{($variant->status=='Drafts') ? 'text-warning':'text-danger'}}--}}
                    <td>{{$loop->iteration}}</td>
                    <td>{{$variant->key}}</td>
                    <td>
                        {{$variant->value}}
                    </td>
                    <td >
                        <span class="{{($variant->status=='Published') ? 'badge badge-primary':(($variant->status=='Drafts') ? 'badge badge-warning':'badge badge-danger')}}"> {{$variant->status}}</span>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{url('/products/variant/edit/'.$variant->id)}}"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" onclick="datadelete({{$variant}})" data-toggle="modal" data-target="#deleteModal" ><i class="fas fa-trash"></i></a>
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
        let globalId=0
      function datadelete(variant) {
          let modal = $('#deleteModal');
          $(modal).find('#deleteID').val(variant.id);
          document.getElementById("item_name").innerHTML=variant.key;

          globalId=variant.id;
      }
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
                    url: '/products/variant/delete',
                    data: data,
                    type: 'PUT',
                    success: function (response) {
                        $("#row_"+response.id).remove();
                        $('#deleteModal').modal('hide')
                        toastr.error('Variant-> '+response.key+' Was Deleted Successfully!!!');
                    },
                    error: function (response) {
                    }
                })
            });
            $('.select2').select2()
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });


        $(function () {
            $("#variantDataTable").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#variantDataTable_wrapper .col-md-6:eq(0)');

        });


    </script>
@endsection