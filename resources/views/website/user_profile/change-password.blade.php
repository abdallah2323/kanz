@extends('website.user_profile.parent')

@section('title', 'تغيير كلمة المرور')

@section('styles')

<link rel="stylesheet" href="{{ asset('project/website/css/changeUserP.css') }}">
<link rel="stylesheet" href="{{ asset('project/website/css/settings.css') }}">

@endsection

@section('edit')
    <div class="col-lg-9 col-md-9">
        <div class="box-1">
            <h1 class="heading_1">تغيير كلمة المرور</h1>
            <form action="" id="create-form" class="form__Div">
                <div class="div__1">
                    <label for="" class="la_1">كلمة المرور الحالية</label>
                    <input type="password" id="current_password" class="inp_1" />
                </div>
                <div class="div__1">
                    <label for="" class="la_2">كلمة المرور الجديدة</label>
                    <input type="password" id="new_password" class="inp_1" />
                </div>
                <div class="div__1">
                    <label for="" class="la_3">تأكيد كلمة المرور الجديدة</label>
                    <input type="password" id="new_password_confirmation" class="inp_1" />
                </div>
                <div class="btn--1">
                    <button type="button" onclick="performupdatepassword()" class="btn__1">حفظ التغييرات</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

<script>
    function performupdatepassword(){
        axios.post('/change-password', {
            password: document.getElementById('current_password').value,
            new_password: document.getElementById('new_password').value,
            new_password_confirmation: document.getElementById('new_password_confirmation').value,
        })
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            window.location.reload();
        })
        .catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message);
        });
    }
</script>

@endsection
