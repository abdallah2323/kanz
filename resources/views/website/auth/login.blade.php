@extends('website.auth.parent')

@section('title', 'تسجيل الدخول')


@section('content')
    <section class="section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-5 text-md-end">
                    <div class="content">
                        <h1 class="heading-1 text-center text-md-end">تسجيل دخول</h1>
                        <p class="paragraph-1 text-center text-md-end">أهلا بك في اكسبو</p>
                    </div>
                    <form>
                        <label for="email" class="label-1 text-start">البريد الالكتروني</label><br>
                        <input class="input-1" type="email" name="email" id="email"
                            placeholder="أدخل البريد الالكتروني"><br>

                        <div class="position-relative">
                            <label for="password" class="label-2">كلمة المرور</label><br>
                            <input class="input-1" type="password" name="password" id="password"
                                placeholder="أدخل كلمة المرور" />
                            <i class="bi bi-eye-slash" id="togglePassword"></i><br>
                        </div>

                        <a href="{{ route('forget-pass') }}" class="paragraph_2">نسيت كلمة المرور ؟</a>
                        <input type="button" onclick="login()" class="input-2" value="تسجيل الدخول">
                        <div class="div-1">
                            <p class="paragraph-3">ليس لديك حساب؟</p>
                            <a href="{{ route('user-register') }}" class="sign-up">انشاء حساب</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-7">
                    <div class="div-img">
                        <img src="{{ asset('project/website/img/Group 10964.png') }}" alt="" class="image-nav1">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function login() {
            axios.post('/login', {
                    email: document.getElementById('email').value,
                    password: document.getElementById('password').value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    window.location.href = "/"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message);
                })
                .then(function() {
                    // always executed
                });
        }
    </script>
@endsection
