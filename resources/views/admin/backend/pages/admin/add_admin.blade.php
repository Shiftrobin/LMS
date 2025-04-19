@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Admin</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Admin</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Add admin</h5>

            <form action="{{ route('store.admin') }}" method="POST" class="row g-3" id="myForm">
                @csrf

                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Admin User Name</label>
                    <input type="text" class="form-control" name="username" id="input1">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Admin Name</label>
                    <input type="text" class="form-control" name="name" id="input1">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Admin Email</label>
                    <input type="email" class="form-control" name="email" id="input1">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Admin Phone </label>
                    <input type="text" class="form-control" name="phone" id="input1">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Admin Address</label>
                    <input type="text" class="form-control" name="address" id="input1">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Admin Password</label>
                    <input type="password" class="form-control" name="password" id="input1">
                </div>


                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Role Name</label>
                    <select name="roles" class="form-select mb-3" aria-label="Default select example">
                        <option selected="" disabled>Open this select menu</option>
                        @foreach ($roles as $role )
                           <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
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
                username: {
                    required : true,
                },
                roles: {
                    required: true,
                }
            },
            messages :{
                username: {
                    required : 'Enter your User Name',
                },
                roles: {
                    required : 'Please Select Role',
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
