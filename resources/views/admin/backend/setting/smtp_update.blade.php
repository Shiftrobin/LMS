@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">SMTP Setting</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">SMTP Setting</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">SMTP Setting</h5>

            <form action="{{ route('update.smtp') }}" method="POST" class="row g-3" id="myForm">
                @csrf

                <input type="hidden" name="id" value="{{ $smtp->id }}" />

                <div class="col-md-6">
                    <label for="input1" class="form-label">Mailer</label>
                    <input type="text" class="form-control" name="mailer" id="input1" value="{{ $smtp->mailer }}">
                </div>
                <div class="col-md-6">
                    <label for="input1" class="form-label">Host</label>
                    <input type="text" class="form-control" name="host" id="input1" value="{{ $smtp->host }}">
                </div>
                <div class="col-md-6">
                    <label for="input1" class="form-label">Port</label>
                    <input type="text" class="form-control" name="port" id="input1" value="{{ $smtp->port }}">
                </div>
                <div class="col-md-6">
                    <label for="input1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="input1" value="{{ $smtp->username }}">
                </div>
                <div class="col-md-6">
                    <label for="input1" class="form-label">Password</label>
                    <input type="text" class="form-control" name="password" id="input1" value="{{ $smtp->password }}">
                </div>
                <div class="col-md-6">
                    <label for="input1" class="form-label">Encryption</label>
                    <input type="text" class="form-control" name="encryption" id="input1" value="{{ $smtp->encryption }}">
                </div>
                <div class="col-md-6">
                    <label for="input1" class="form-label">From Address</label>
                    <input type="text" class="form-control" name="from_address" id="input1" value="{{ $smtp->from_address }}">
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

@endsection
