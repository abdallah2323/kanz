@extends('website.parent')

@section('styles')
    <link rel="stylesheet" href="{{ asset('project/website/css/settings.css') }}" />
    <link rel="stylesheet" href="{{ asset('project/website/css/editAccount.css') }}" />
    <link rel="stylesheet" href="{{ asset('project/website/css/styleCreateAccount.css') }}" />
@endsection

@section('content')
    <div class="section-setting">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="div-settings">
                        <div class="box">
                            <a href="{{ route('edit-profile-show') }}" class="link colo">تعديل الحساب<i
                                    class="fa-solid fa-angle-left a-left"></i>

                                <svg class="svg-inline--fa fa-angle-left a-left" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="angle-left" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z">
                                    </path>
                                </svg>
                            </a>
                            <a href="{{ route('change-pass-show') }}" class="link">تغيير كلمة المرور
                                <svg class="svg-inline--fa fa-angle-left a-left" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="angle-left" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                @yield('edit')

            </div>
        </div>
    </div>
@endsection
