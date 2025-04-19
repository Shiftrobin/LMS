@extends('instructor.instructor_dashboard')
@section('instructor')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Instructor Add Coupon</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Instructor Add Coupon</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Instructor Add Coupon</h5>

            <form action="{{ route('instructor.store.coupon') }}" method="POST" class="row g-3" id="myForm">
                @csrf

                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Coupon Name</label>
                    <input type="text" class="form-control" name="coupon_name" id="input1" placeholder="Coupon Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Coupon Discount</label>
                    <input type="text" class="form-control" name="coupon_discount" id="input1" placeholder="Coupon Discount">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Courses</label>
                    <select  name="course_id" class="form-select mb-3" aria-label="Default select example">
                        <option selected="">Open this select menu</option>

                        @foreach ($courses as $key => $course)                            
                          <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                        
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Coupon Validity Date</label>
                    <input type="date" class="form-control" name="coupon_validity" id="input1" placeholder="Coupon Validity" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
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
                coupon_name: {
                    required : true,
                },
                coupon_discount: {
                    required: true,
                },
                coupon_validity: {
                    required: true,
                }
            },
            messages :{
                coupon_name: {
                    required : 'Please Enter Coupon Name',
                },
                coupon_discount: {
                    required : 'Please Enter Coupon Discount',
                },
                coupon_validity: {
                    required : 'Please Enter Coupon Validity',
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
