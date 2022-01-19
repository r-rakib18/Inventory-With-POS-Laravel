@extends('layouts.master')
@section('title')
    Category
@endsection
@section('pageName')
    Category List
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Product</a></li>
    <li class="breadcrumb-item"><a href=" {{ route('products.category.list') }}">Category</a></li>
    <li class="breadcrumb-item active">List</li>
@endsection
@section('content')
    @include('product.category.partials.show')
    @include('product.category.partials.delete')
    <div class="card">
        <div class="card-header">
            <a href="{{route('products.category.create')}}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Create New Category</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="categoryTable" class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Total Subcategory</th>
                    <th>Total Products</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr class="text-center" id="row_{{$category->id}}">
                    {{--{{($category->status=='Drafts') ? 'text-warning':'text-danger'}}--}}
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        @php
                        $result = DB::table('categories')->where('parent_id', $category->id)->get(); //sql2
                        echo count($result);
                        @endphp

                    </td>
                    <td>
                        @php
                            $results = DB::table('categories')->where('parent_id', $category->id)->get(); //sql2
                            foreach ($results as $result){
                            echo $result->name. ', ';
                            }
                        @endphp
                    </td>
                    <td >
                        <span class="{{($category->status=='Published') ? 'badge badge-primary':(($category->status=='Drafts') ? 'badge badge-warning':'badge badge-danger')}}"> {{$category->status}}</span>
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm"  data-toggle="modal" data-target="#showModal" onclick="showModal({{$category->id}})"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm" href="{{url('/products/category/edit/'.$category->id)}}"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" onclick="datadelete({{$category}})" data-toggle="modal" data-target="#deleteModal" ><i class="fas fa-trash"></i></a>
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
      function datadelete(category) {
          let modal = $('#deleteModal');
          $(modal).find('#deleteID').val(category.id);
          document.getElementById("item_name").innerHTML=category.name;

          globalId=category.id;
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
                    url: '/products/category/delete',
                    data: data,
                    type: 'PUT',
                    success: function (response) {
                        $("#row_"+response.id).remove();
                        $('#deleteModal').modal('hide')
                        toastr.error('Category-> '+response.name+' Was Deleted Successfully!!!');
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

        // image preview
        $('#image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {

                $('#image_preview_container').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
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
                url:'/products/category/show',
                type:'GET',
                data:data,
                success:function(data){
                    console.log(data);
                    $(modal).find('#name').val(data.name);
                    $(modal).find('#status').val(data.status);
                    $(modal).find('#parent_category').val(data.parent_id);
                    $(modal).find('#descriptionmodal').val(data.description);
                    let image='/../storage/category/'+data.image;
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