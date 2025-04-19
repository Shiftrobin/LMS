@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<style>
    .large-checkbox{
       transform: scale(1.5);
    }
</style>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Course</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Course</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">All Course</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Course Name</th>
                            <th>Instructor</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course as $key=> $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td><img src="{{ asset('public/'.$item->course_image) }}" alt="course image" style="width:70px;height:40px;"></td>
                                <td> {{ $item->course_name }}</td>
                                <td> {{ $item['user']['name'] }}</td>
                                <td> {{ $item['category']['category_name'] }}</td>
                                <td> {{ $item->selling_price }}</td>
                                <td>
                                    <a href="{{ route('admin.course.details', $item->id) }}" class="btn btn-sm btn-info"> <i class="lni lni-eye"></i></a>
                                </td>
                                <td>
                                    <div class="form-check-danger form-check form-switch">
                                        <input class="form-check-input status-toggle large-checkbox" type="checkbox" id="flexSwitchCheckCheckedDanger"
                                         data-course-id="{{ $item->id }}" {{ $item->status ? 'checked' : '' }}>
                                    </div>
                                    {{-- <a href="{{ route('edit.category', $item->id) }}" class="btn btn-info px-5">Edit</a>
                                    <a href="{{ route('delete.category', $item->id) }}" class="btn btn-danger px-5" id="delete">Delete</a> --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
       $('.status-toggle').on('change',function(){

            var courseId = $(this).data('course-id');
            var isChecked = $(this).is(':checked');

            // send an ajax request to update status-toggle
            $.ajax({
                url: "{{ route('update.course.status')  }}",
                method: "POST",
                data: {
                    course_id : courseId,
                    is_checked : isChecked ? 1 : 0,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response){
                    toastr.success(response.message);
                },
                error: function(){

                }
            });
       });

    });
</script>

@endsection
