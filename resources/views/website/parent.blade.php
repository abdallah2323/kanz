<?php
use App\Http\Controllers\DashboardController;
use App\Models\Main;
use App\Models\Social;
use App\Models\Logo;

$logo = Logo::orderBy('created_at', 'DESC')->first();
$main = Main::all()->first();
$socials = Social::where('type', '!=' ,'messenger')->get();
$data = Social::all();
// $socials = Social::all();
// $messenger = Social::where('type', '==', 'messenger')->first();
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('project/website/img/logo-white.png') }}" type="image/x-icon">
    <title>أكاديمية الكنز | @yield('title')</title>
    @yield('styles')

    <link rel="stylesheet" href="{{ asset('project/website/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @auth
        <link rel="stylesheet" href="{{ asset('project/website/css/header-2.css') }}" />
        <link rel="stylesheet" href="{{ asset('project/website/css/header-1.css') }}" />
    @else
        <link rel="stylesheet" href="{{ asset('project/website/css/header-1.css') }}" />

    @endauth

    <link rel="stylesheet" href="{{ asset('project/website/css/loader.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('project/assets/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('project/assets/css/jquery.mCustomScrollbar.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <style>
        footer .li-1.instagram:hover {
          background-color: #833AB4;
          color: white;
          border: 1px solid #833AB4;
        }
    </style>

</head>

<body>
    <!-- Loading -->
    <div class="loaderr"></div>
    <!-- Loading -->

    @auth

        <!-- header -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('al-kanz') }}"><img
                        src="{{ asset('project/website/img/logo.png') }}" alt="" class="logo" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler"><i class="fa-solid fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('al-kanz') }}">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-1" href="{{ route('courses-page') }}">الكورسات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-2" href="{{ route('about-page') }}">عن الأكاديمية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-3" href="{{ route('library-page') }}">المكتبة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-4" href="{{ route('q&a-page') }}">الأسئلة الشائعة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-5" href="{{ route('contact_us-page') }}">اتصل بنا</a>
                        </li>
                    </ul>
                </div>
                <div class="profile">
                    <div class="dropdown">
                        <button style="text-transform: capitalize" class="btn dropdown-toggle" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <a class="dropdown-item a-2" href="{{ route('user-profile') }}">مشاهدة الصفحة الشخصية</a>
                            </li>
                            <li>
                                <a class="dropdown-item a-2" href="{{ route('edit-profile-show') }}">اعدادات الحساب</a>
                            </li>
                            <li>
                                <a class="dropdown-item a-2 border-botom" href="{{ route('user-logout') }}">تسجيل
                                    الخروج</a>
                            </li>
                        </ul>
                    </div>
                    <div class="imag position-relative">
                        <img src="{{ asset('project/uploads/users/' . Auth::user()->image) }}" alt=""
                            class="profile-img" />
                    </div>
                </div>
            </div>
        </nav>
        <!-- header -->
    @else
        <!-- header -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('al-kanz') }}"><img
                        src="{{ asset('project/website/img/logo.png') }}" alt="" class="logo" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler"><i class="fa-solid fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('al-kanz') }}">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-1" href="{{ route('courses-page') }}">الكورسات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-2" href="{{ route('about-page') }}">عن الأكاديمية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-3" href="{{ route('library-page') }}">المكتبة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-4" id="ww" href="{{ route('q&a-page') }}">الأسئلة
                                الشائعة</a>
                        </li>
                    </ul>
                    <div class="login">
                        <a href="{{ route('user-login') }}" class="a-1">تسجيل دخول</a>
                        <a href="{{ route('user-register') }}" class="a-1 a-2">إنشاء حساب</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- header -->

    @endauth

    <!-- Sections -->

    @yield('content')

    <!-- /Sections -->

    <!-- Communication -->
    <div class="Communication">
        @if ($socials->count() > 0)

            @foreach ($data as $social)
                @if ($social->type == 'messenger')
                    <a target="_blank" class="fb-img" href="{{ $social->link }}"><img
                            src="https://sanabil-edu.com/frontAssets/images/messenger.png" alt="" /></a>
                @elseif($social->type == 'whatsapp')
                    <a target="_blank" class="what-img" href="{{ $social->link }}"><img
                            src="https://sanabil-edu.com/frontAssets/images/svg/whatsapp.svg" alt="" /></a>
                @endif
            @endforeach


        @endif

    </div>
    <!-- Communication -->

    <!-- footer -->
    <footer class="text-center text-md-end pt-5 pb-4">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h1 class="heading">
                        @if (isset($main->title))
                            {{ $main->title }}
                        @endif
                    </h1>
                    <p class="paragraph text-white-50 p-footer-1">
                        @if (isset($main->detail))
                            {{ $main->detail }}
                        @endif

                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0 heading-1">
                        @if (isset($main->title))
                            {{ $main->title }}
                        @endif
                    </h5>

                    <ul class="list-unstyled mt-2">
                        <li>
                            <a href="{{ route('privacy-page') }}" class="text-white-50 a-1">سياسة الخصوصية</a>
                        </li>
                        <li>
                            <a href="{{ route('guarantee-page') }}" class="text-white-50 a-1">شروط الإستخدام</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase heading-1">وسائل الدفع</h5>

                    <ul class="list-unstyled mb-0">
                        {{-- <li>
                            <a href="#" class="text-white-50 a-1">Visa</a>
                        </li>
                        <li>
                            <a href="#" class="text-white-50 a-1">Jawwal Pay</a>
                        </li> --}}
                        <li>
                            <a href="#" class="text-white-50 a-1 button" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">طريقة الدفع</a>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog  first">
                                    <div class="modal-content first">
                                        <div class="modal-header first">
                                            <h5 class="modal-title" id="staticBackdropLabel">أخي الحبيب .. أختي
                                                الحبيبة
                                                تيسيرا لمن لا يستطيع سداد رسوم الدورات باستخدام بطاقة الدفع عبر الإنترنت
                                                بإمكانك استخدام هذه الطرق البديلة المتاحة حاليا :</h5>
                                            <button type="button" class="btn-close first" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <ol>
                                                <li class="first mb-3">يمكنك سداد الرسوم عن طريق مؤسسة عمارة للاستشارات
                                                    و التدريب في مصر ( القاهرة - الاسكندرية )</li>
                                                <li class="first mb-3">التواصل عبر الواتس: 05987456</li>
                                                <li class="first mb-3">يمكنك سداد الرسوم عن طريق تحويل بنكي</li>
                                            </ol>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success first"
                                                data-bs-dismiss="modal">اغلاق</button>
                                            <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0 heading">اتصل بنا</h5>

                    <ul class="list-unstyled ul-1 mt-4">
                        @if ($socials->count() > 0)

                            @foreach ($socials as $social)
                                <li>
                                    @if ($social->type == 'facebook')
                                        <a href="{{ $social->link }}" class="li-1 facebook"><i
                                                class="fa-brands fa-facebook-f"></i></a>
                                    @elseif ($social->type == 'instagram')
                                        <a href="{{ $social->link }}" class="li-1 li instagram"><i
                                            class="fa-brands fa-instagram"></i></a>
                                    @elseif ($social->type == 'whatsapp')
                                        <a href="{{ $social->link }}" class="li-1 li whatsapp"><i
                                                class="fa-brands fa-whatsapp what"></i></a>
                                    @elseif ($social->type == 'youtube')
                                        <a href="{{ $social->link }}" class="li-1 li pinterest"><i
                                                class="fa-brands fa-youtube"></i></a>
                                    @elseif ($social->type == 'telegram')
                                        <a href="{{ $social->link }}" class="li-1 li telegram"><i
                                                class="fa-brands fa-telegram"></i></a>
                                    @elseif ($social->type == 'tiktok')
                                        <a href="{{ $social->link }}" class="li-1 li tiktok"><i
                                                class="fa-brands fa-tiktok"></i></a>
                                    @endif
                                </li>
                            @endforeach

                        @endif
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->
    </footer>
    <!-- footer -->
    <script type="text/javascript" src="{{ asset('project/assets/js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('project/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('project/website/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('project/website/js/all.min.js') }}"></script>
    <script src="{{ asset('project/website/js/loader.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('project/assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('project/assets/plugins/toastr/toastr.js.map') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('project/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('project/assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        jQuery(".button").click(function() {
            jQuery(".single").hide();
            jQuery(".div" + $(this).attr("target")).show();
        });
    </script>
    @yield('scripts')
</body>

</html>
