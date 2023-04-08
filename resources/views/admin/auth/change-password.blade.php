@extends('admin.parent')

@section('title', 'Change Password')

@section('styles')

@endsection

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        @section('icon')

        <i class="ti ti-loop btn-info"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('admins.index') }}">Admins</a></li>

        @endsection

        @section('sub-title')

            Change Password

        @endsection

        @section('sub-text')

            change your password

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Reset Password</h2>
                            <form id="create-form">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Current Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" id="current_password" class="form-control" placeholder="Enter Current Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" id="new_password" class="form-control" placeholder="Enter New Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">New Password Confirmation</label>
                                    <div class="col-sm-10">
                                        <input type="password" id="new_password_confirmation" class="form-control" placeholder="Enter New Password Confirmation">
                                    </div>
                                </div>
                                <button type="button" onclick="performupdatepassword()" class="btn btn-info">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    function performupdatepassword(){
        axios.post('/cms/admin/update-password', {
            password: document.getElementById('current_password').value,
            new_password: document.getElementById('new_password').value,
            new_password_confirmation: document.getElementById('new_password_confirmation').value,
        })
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            // document.getElementById('create-form').reset();
            window.location.reload();
        })
        .catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message);
        });
    }
</script>

@endsection
