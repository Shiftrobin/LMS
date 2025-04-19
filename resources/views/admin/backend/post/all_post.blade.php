@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Blog Post</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">

                <a href="{{ route('add.blog.post') }}" class="btn btn-primary px-5">Add Blog Post</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Post Title </th>
                            <th>Blog Category</th>
                            <th>Blog Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($post as $key=> $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td> {{ $item->post_title }}  </td>
                            <td>{{ $item['blog']['category_name'] }}</td>
                            <td> <img src="{{ asset('public/'.$item->post_image)  }}" alt="image" style="width: 70px; height: 40px;"/>   </td>
                            <td>
                                <a href="{{ route('edit.post', $item->id) }}" class="btn btn-info px-5">Edit</a>
                                <a href="{{ route('delete.post', $item->id) }}" class="btn btn-danger px-5" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>




</div>


	<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Blog Category</h5>

                </div>
                <div class="modal-body">
           <form action="{{ route('blog.category.store') }}" method="post">
            @csrf

            <div class="form-group col-md-12">
                <label for="input1" class="form-label">Blog Category Name</label>
                <input type="text" name="category_name" class="form-control" id="input1"  >
            </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>


    <!-- Edit Modal -->
    <div class="modal fade" id="category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Blog Category</h5>

                </div>
                <div class="modal-body">
           <form action="{{ route('blog.category.update') }}" method="post">
            @csrf

            <input type="hidden" name="cat_id" id="cat_id">

            <div class="form-group col-md-12">
                <label for="input1" class="form-label">Blog Category Name</label>
                <input type="text" name="category_name" class="form-control" id="cat"  >
            </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <script>
        function categoryEdit(id){
            $.ajax({
                type: 'GET',
                url: "{{ url('/') }}"+"/edit/blog/category/"+id,
                dataType: 'json',

                success:function(data){
                     console.log(data)
                    $('#cat').val(data.category_name);
                    $('#cat_id').val(data.id);

                }
            })

        }
    </script>

@endsection
