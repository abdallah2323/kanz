<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('project/website/img/logo-white.png') }}" type="image/x-icon">
    <title>أكاديمية الكنز | @yield('title')</title>
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('project/website/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('project/website/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('project/website/css/loader.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('project/assets/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('project/assets/css/jquery.mCustomScrollbar.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />


</head>

<body>
    <!-- Loading -->
    <div class="loaderr"></div>
    <!-- Loading -->
    <header>
        <div class="nav-img">
            <a href="{{ route('al-kanz') }}">
                <img src="{{ asset('project/website/img/logo.png') }}" alt="" class="image-nav">
            </a>
        </div>
    </header>

    @yield('content')

    <script type="text/javascript" src="{{ asset('project/assets/js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('project/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('project/website/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('project/website/js/all.min.js') }}"></script>
    <script src="{{ asset('project/website/js/script.js') }}"></script>
    <script src="{{ asset('project/website/js/loader.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('project/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('project/assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    @yield('scripts')
</body>

</html>
