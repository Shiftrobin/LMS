@extends('instructor.instructor_dashboard')
@section('instructor')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Course</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.course.lecture', ['id'=> $clecture->course_id]) }}" class="btn btn-primary px-5">Back</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Lecture</h5>

            <form action="{{ route('update.course.lecture') }}" method="POST" class="row g-3" id="myForm" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $clecture->id }}" />
                <input type="hidden" name="old_video" value={{ 'public/'.$clecture->video }} />

                <div class="form-group col-md-12">
                    <label for="input1" class="form-label">Lecture Title</label>
                    <input type="text" class="form-control" name="lecture_title" id="input1" value="{{ $clecture->lecture_title }}" />
                </div>

                <div class="form-group col-md-6">
                    <label for="input2" class="form-label">Lecture Video</label>
                    <input type="file" class="form-control" name="video" id="input1" accept="video/mp4, video/webm">
                </div>
                <div class="form-group col-md-6">
                    <video width="300" height="130" controls>
                        <source src="{{ asset('public/'.$clecture->video) }}" type="video/mp4">
                    </video>
                </div>

                <div class="form-group col-md-12">
                    <label for="input1" class="form-label">Lecture Content</label>
                    <textarea name="content" class="form-control"> {{ $clecture->content }}</textarea>
                </div>

                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_name: {
                    required : true,
                },
            },
            messages :{
                category_name: {
                    required : 'Please Enter Category Name',
                },

            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>



@endsection
