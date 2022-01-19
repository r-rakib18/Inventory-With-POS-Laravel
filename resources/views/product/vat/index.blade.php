@extends('layouts.master')
@section('title')
    Vat
@endsection
@section('pageName')
    Vat List
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Product</a></li>
    <li class="breadcrumb-item"><a href=" {{ route('products.vat.list') }}">Vat</a></li>
    <li class="breadcrumb-item active">List</li>
@endsection
@section('content')
    @include('product.vat.partials.delete')
    <div class="card">
        <div class="card-header">
            <a href="{{route('products.vat.create')}}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Create New Vat</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="variantDataTable" class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Head</th>
                    <th>Description</th>
                    <th>Value</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vats as $vat)
                <tr class="text-center" id="row_{{$vat->id}}">
                    {{--{{($vat->status=='Drafts') ? 'text-warning':'text-danger'}}--}}
                    <td>{{$loop->iteration}}</td>
                    <td>{{$vat->item_head}}</td>
                    <td>{!! $vat->description !!}</td>
                    <td>
                        {{$vat->value}}
                    </td>
                    <td >
                        <span class="{{($vat->status=='Published') ? 'badge badge-primary':(($vat->status=='Drafts') ? 'badge badge-warning':'badge badge-danger')}}"> {{$vat->status}}</span>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{url('/products/vat/edit/'.$vat->id)}}"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" onclick="datadelete({{$vat}})" data-toggle="modal" data-target="#deleteModal" ><i class="fas fa-trash"></i></a>
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
      function datadelete(vat) {
          let modal = $('#deleteModal');
          $(modal).find('#deleteID').val(vat.id);
          document.getElementById("item_name").innerHTML=vat.item_head;

          globalId=vat.id;
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
                    url: '/products/vat/delete',
                    data: data,
                    type: 'PUT',
                    success: function (response) {
                        $("#row_"+response.id).remove();
                        $('#deleteModal').modal('hide')
                        toastr.error('Vat-> '+response.item_head+' Was Deleted Successfully!!!');
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
            $("#vatDataTable").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#$vatDataTable_wrapper .col-md-6:eq(0)');

        });


    </script>
@endsection