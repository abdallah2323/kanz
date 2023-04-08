@extends('website.auth.parent')

@section('title', 'إستعادة كلمة المرور')

@section('styles')

<link rel="stylesheet" href="{{ asset('project/website/css/forgetPass.css') }}">

@endsection

@section('content')

<section class="section-1">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="content">
                    <h1 class="heading-1">هل نسيت كلمة المرور؟</h1>
                    <p class="paragraph-1">أدخل الايميل الخاص فيك بهذا الموقع وسوف نرسل لك كلمة المرور على ايميلك
                        الخاص</p>
                </div>
                <form action="Enter-Code.html">
                    <label for="username" class="label-2">البريد الالكتروني</label><br>
                    <input class="input-1" type="email" name="" id="" placeholder="أدخل البريد الالكتروني"><br>
                    <input class="input-2" type="submit" value="طلب الاستعادة" /><br>
                    <a href="{{ route('user-login') }}" class="sign-up">الرجوع الى تسجيل الدخول</a>
                </form>
            </div>
            <div class="col-md-6">
                <div class="div-img">
                    <img src="{{ asset('project/website/img/Group 10964.png') }}" alt="" class="image-nav1">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
