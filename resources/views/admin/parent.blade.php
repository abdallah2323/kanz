<?php
use App\Http\Controllers\DashboardController;
use App\Models\Contact;
use App\Models\Logo;

$logo = Logo::orderBy('created_at', 'DESC')->first();
$messages = Contact::orderBy('created_at', 'DESC')
    ->take(4)
    ->get();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Al-Kanz | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords"
        content="flat ui, admin  Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('project/website/img/logo-white.png') }}" type="image/x-icon">
    @yield('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('project/assets/plugins/toastr/toastr.min.css') }}">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('project/assets/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('project/assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('project/assets/icon/icofont/css/icofont.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('project/assets/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('project/assets/css/jquery.mCustomScrollbar.css') }}">

</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="{{ route('Dashboard') }}">
                            @if (isset($logo))
                                @if ($logo->count() > 0)
                                    <img class="img-fluid" style="width: 200px"
                                        src="{{ asset('project/uploads/logos/' . $logo->image) }}" alt="Theme-Logo" />
                                @else
                                    <img class="img-fluid" style="width: 200px"
                                        src="{{ asset('project/website/img/logo.png') }}" alt="Theme-Logo" />
                                @endif
                            @endif
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                                </div>
                            </li>

                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <a href="#!">
                                    <i class="ti-bell"></i>
                                    <span class="badge bg-c-pink"></span>
                                </a>
                                <ul class="show-notification">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    @if (isset($messages))
                                        @foreach ($messages as $message)
                                            <a href="{{ route('contacts.show', $message->id) }}">
                                                <li>
                                                    <div class="media">
                                                        <img class="img-60 img-radius mCS_img_loaded"
                                                            src="{{ asset('project/uploads/users/' . $message->user->image) }}"
                                                            alt="User-Profile-Image">

                                                        <div class="media-body">
                                                            <h5 class="notification-user" style="text-transform: ">
                                                                {{ $message->user->name }}</h5>
                                                            <p class="notification-msg" style="text-transform: ">
                                                                {{ $message->message }}</p>
                                                            <span
                                                                class="notification-time">{{ $message->created_at->isoFormat('LLLL') }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>
                                        @endforeach
                                    @endif

                                    <a href="{{ route('contacts.index') }}">Show All Messages</a>

                                </ul>
                            </li>
                            <li class="user-profile header-notification">
                                <a href="#">
                                    <img class="img-40 img-radius"
                                        src="{{ asset('project/uploads/admins/' . Auth::user()->photo) }}"
                                        alt="User-Profile-Image">
                                    <span>{{ Auth::user()->name }}</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="{{ route('reset-password') }}">
                                            <i class="ti-settings"></i> Change Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">



                    @include('admin.sider')



                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    @yield('icon')
                                                    <div class="d-inline">
                                                        <h4>@yield('sub-title')</h4>
                                                        <span>Welcome ! Here you can @yield('sub-text')</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="{{ route('Dashboard') }}">
                                                                <i class="icofont icofont-home"></i>
                                                            </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a
                                                                href="{{ route('Dashboard') }}">Dashboard</a>
                                                        </li>
                                                        {{-- <li class="breadcrumb-item"><a href="{{ route('admins.index') }}">Admins</a>
                                                        </li> --}}
                                                        @yield('link')
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->
                                    @yield('content')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Warning Section Starts -->
            <!-- Older IE warning message -->
            <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
            <!-- Warning Section Ends -->
            <!-- Required Jquery -->
            <script type="text/javascript" src="{{ asset('project/assets/js/jquery/jquery.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('project/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('project/assets/js/popper.js/popper.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('project/assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
            <!-- jquery slimscroll js -->
            <script type="text/javascript" src="{{ asset('project/assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
            <!-- modernizr js -->
            <script type="text/javascript" src="{{ asset('project/assets/js/modernizr/modernizr.js') }}"></script>
            <script type="text/javascript" src="{{ asset('project/assets/js/modernizr/css-scrollbars.js') }}"></script>

            <script type="text/javascript" src="{{ asset('project/assets/pages/accordion/accordion.js') }}"></script>
            <!-- classie js -->
            <script type="text/javascript" src="{{ asset('project/assets/js/classie/classie.js') }}"></script>
            <!-- Custom js -->
            <script type="text/javascript" src="{{ asset('project/assets/js/script.js') }}"></script>
            <script src="{{ asset('project/assets/js/pcoded.min.js') }}"></script>
            <script src="{{ asset('project/assets/js/demo-12.js') }}"></script>
            <script src="{{ asset('project/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
            <script src="{{ asset('project/assets/plugins/toastr/toastr.min.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

            @yield('scripts')

</body>

</html>
