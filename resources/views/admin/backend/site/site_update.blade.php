@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Site Setting</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Site Setting</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Site Setting</h5>

            <form action="{{ route('update.site') }}" method="POST" class="row g-3" id="myForm" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $site->id }}" />

                <div class="col-md-6">
                    <label for="input1" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="input1" value="{{ $site->phone }}">
                </div>
                <div class="col-md-6">
                    <label for="input1" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="input1" value="{{ $site->email }}">
                </div>
                <div class="col-md-6">
                    <label for="input1" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="input1" value="{{ $site->address }}">
                </div>
                <div class="col-md-6">
                    <label for="input1" class="form-label">Facebook</label>
                    <input type="text" class="form-control" name="facebook" id="input1" value="{{ $site->facebook }}">
                </div>
                <div class="col-md-6">
                    <label for="input1" class="form-label">Twitter</label>
                    <input type="text" class="form-control" name="twitter" id="input1" value="{{ $site->twitter }}">
                </div>
                <div class="col-md-6">
                    <label for="input1" class="form-label">Copyright</label>
                    <input type="text" class="form-control" name="copyright" id="input1" value="{{ $site->copyright }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="input2" class="form-label">Site Logo</label>
                    <input class="form-control" name="logo" type="file" id="image">
                </div>
                <div class="col-md-6">
                    <img id="showImage" src="{{ asset('public/'.$site->logo) }}" alt="logo" class="mt-4" width="141" height="41">
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
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });
</script>

@endsection
