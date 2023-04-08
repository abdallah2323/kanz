@extends('website.parent')

@section('title', 'الرئيسية')


@section('styles')

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="{{ asset('project/website/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('project/website/css/video.css') }}" />
    <style>
        .section-9 .d-block.w-100{
            outline: none;
        }
    </style>

@endsection

@section('content')

    <!-- section-1 -->
    <div class="section-1 pt-5 pb-5">
        <div class="container pt-5">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-end">
                    @if (isset($main))
                        <div class="box">
                            <h3 class="lh-lg h3-1">
                                @if (isset($main->title))
                                    {{ $main->title }}
                                @endif
                            </h3>
                            <p class="lh-lg p-7">
                                @if ($main->detail)
                                    {{ $main->detail }}
                                @endif
                            </p>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="box-1 position-relative">
                        <img src="{{ asset('project/website/img/arrow.png') }}" alt="" class="arrow" />
                        <div class="container-1">
                            <div class="video_player">
                                @if (isset($main->video))
                                    <video preload="metadata" class="main-video">
                                        <source src="{{ asset('project/uploads/main') }}/{{ $main['video'] }}" size="1080"
                                            type="video/mp4">
                                        <track label="English" kind="subtitles" src="./How To Get Started With VSCode.vtt"
                                            srclang="en">
                                        <track label="Urdu" kind="subtitles" src="./test.vtt" srclang="en">
                                    </video>
                                @endif

                            </div>
                        </div>
                        {{-- <video width="100%" height="100%" autoplay muted controls>
                            <source src="{{ asset('project/uploads/main')}}/{{ $main['video'] }}" type="video/mp4">
                        </video> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section-1 -->

    @if (isset($about))

        <!-- section-8 -->
        <section class="section-8 mb-5 pb-5">
            <div class="container">
                <div class="row align-items-center colom-reverse">
                    <div class="col-md-7 mb-5 text-center text-md-end">
                        <h4 class="h4-1 mt-4">{{ $about->title }}</h4>
                        <p class="p-7 mt-4 mb-4">{{ $about->detail }}</p>
                        <a href="{{ route('about-page') }}" class="a-1">قراءة المزيد</a>
                    </div>
                    <div class="col-md-5 text-center">
                        <img src="{{ asset('project/uploads/about/' . $about->image) }}" alt=""
                            class="img-fluid Ahmed" />
                    </div>
                </div>
            </div>
        </section>
        <!-- section-8 -->

    @endif

    <!-- section-2 -->
    <section class="section-2 pt-4 pb-5 position-relative">
        <div class="icon">
            <svg class="svg-inline--fa fa-angle-right arrow-right" aria-hidden="true" focusable="false" data-prefix="fas"
                data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"
                data-fa-i2svg="">
                <path fill="currentColor"
                    d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z">
                </path>
            </svg>
            <svg class="svg-inline--fa fa-angle-left arrow-left" aria-hidden="true" focusable="false" data-prefix="fas"
                data-icon="angle-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"
                data-fa-i2svg="">
                <path fill="currentColor"
                    d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z">
                </path>
            </svg>
        </div>
        <div class="container">
            <div class="div-1 mb-5">
                <p class="mb-0 fw-bold p-77">الكورسات المدفوعة</p>
                <a href="{{ route('courses-page') }}" class="a-1">عرض الكل</a>
            </div>
            <div class="row position-relative slider">
                @if (isset($paidCourses))

                    @foreach ($paidCourses as $course)
                        <div class="col-lg-3 col-md-4 col-sm-6 slide">
                            <div class="box position-relative" style="text-transform: capitalize">
                                <div class="image">
                                    <img src="{{ asset('project/uploads/courses/' . $course->image) }}" alt=""
                                        class="img-fluid" />
                                </div>
                                <div class="content">
                                    <p class="p-7 fw-bold">
                                        {{ $course->name }}
                                    </p>
                                    <div class="weman mt-3">
                                        @if (isset($course->instructor))

                                        <img src="{{ asset('project/uploads/instructors/' . $course->instructor->photo) }}"
                                            alt="" class="weman-1" />
                                        <span class="span-1"> {{ $course->instructor->name }} </span>

                                        @endif

                                    </div>
                                    <div class="number mt-3">
                                        <p class="mb-0 p-8">{{ $course->price }}₪</p>
                                    </div>
                                </div>
                                <div class="before">
                                    <p class="p-7">{{ $course->name }}</p>
                                    <p class="p-8">تم التحديث في {{ $course->created_at->format('d M') }}</p>
                                    <p class="p-10">{{ $course->brief }}</p>
                                    @foreach ($course->objectives as $objective)
                                        <p class="p-11">
                                            <i class="fa-solid fa-check"></i> {{ $objective->title }}
                                        </p>
                                    @endforeach
                                    <div class="know">
                                        <a href="{{ route('course-details', $course->id) }}" class="form-control a-1">تعرف
                                            أكثر</a>
                                        <a href="{{ route('course-content', $course->id) }}" class="form-control a-1">محتوى
                                            الكورس</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif

            </div>
        </div>
    </section>
    <!-- section-2 -->

    <!-- section-3 -->

    <section class="section-3 pt-4 pb-5 position-relative">
        <div class="icon">
            <svg class="svg-inline--fa fa-angle-right arrow-right" aria-hidden="true" focusable="false"
                data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 256 512" data-fa-i2svg="">
                <path fill="currentColor"
                    d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z">
                </path>
            </svg>
            <svg class="svg-inline--fa fa-angle-left arrow-left" aria-hidden="true" focusable="false" data-prefix="fas"
                data-icon="angle-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"
                data-fa-i2svg="">
                <path fill="currentColor"
                    d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z">
                </path>
            </svg>
        </div>
        <div class="container">
            <div class="div-1 mb-5">
                <p class="mb-0 fw-bold p-77">الكورسات المجانية</p>
                <a href="{{ route('courses-page') }}" class="a-1">عرض الكل</a>
            </div>
            <div class="row position-relative slider">
                @if (isset($freeCourses))

                    @foreach ($freeCourses as $course)
                        <div class="col-lg-3 col-md-4 col-sm-6 slide">
                            <div class="box position-relative" style="text-transform: capitalize">
                                <div class="image">
                                    <img src="{{ asset('project/uploads/courses/' . $course->image) }}" alt=""
                                        class="img-fluid" />
                                </div>
                                <div class="content">
                                    <p class="p-7 fw-bold">
                                        {{ $course->name }}
                                    </p>
                                    @if (isset($course->instructor))

                                        <div class="weman mt-3">
                                            <img src="{{ asset('project/uploads/instructors/' . $course->instructor->photo) }}"
                                                alt="" class="weman-1" />
                                            <span class="span-1"> {{ $course->instructor->name }} </span>
                                        </div>

                                    @endif

                                    <div class="number mt-3">
                                        <p class="mb-0 p-8">مجاني</p>
                                    </div>
                                </div>
                                <div class="before">
                                    <p class="p-7">{{ $course->name }}</p>
                                    <p class="p-8">تم التحديث في {{ $course->created_at->format('d M') }}</p>
                                    <p class="p-10">{{ $course->brief }}</p>
                                    @foreach ($course->objectives as $objective)
                                        <p class="p-11">
                                            <i class="fa-solid fa-check"></i> {{ $objective->title }}
                                        </p>
                                    @endforeach
                                    <div class="know">
                                        <a href="{{ route('course-details', $course->id) }}" class="form-control a-1">تعرف
                                            أكثر</a>
                                        <a href="{{ route('course-content', $course->id) }}" class="form-control a-1">محتوى
                                            الكورس</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif
            </div>
        </div>
    </section>
    <!-- section-3 -->

    <!-- section-4 -->
    <section class="section-7 pt-4 mt-4 pb-5 position-relative">
        <div class="icon">
            <svg class="svg-inline--fa fa-angle-right arrow-right" aria-hidden="true" focusable="false"
                data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 256 512" data-fa-i2svg="">
                <path fill="currentColor"
                    d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z">
                </path>
            </svg>
            <svg class="svg-inline--fa fa-angle-left arrow-left" aria-hidden="true" focusable="false" data-prefix="fas"
                data-icon="angle-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"
                data-fa-i2svg="">
                <path fill="currentColor"
                    d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z">
                </path>
            </svg>
        </div>
        <div class="container">
            <div class="div-1 mb-5">
                <p class="mb-0 fw-bold p-77">الكورسات الإرشادية</p>
                <a href="{{ route('courses-page') }}" class="a-1">عرض الكل</a>
            </div>
            <div class="row position-relative slider">
                @if (isset($psychologicalCourses))

                    @foreach ($psychologicalCourses as $course)
                        <div class="col-lg-3 col-md-4 col-sm-6 slide">
                            <div class="box position-relative" style="text-transform: capitalize">
                                <div class="image">
                                    <img src="{{ asset('project/uploads/courses/' . $course->image) }}" alt=""
                                        class="img-fluid" />
                                </div>
                                <div class="content">
                                    <p class="p-7 fw-bold">
                                        {{ $course->name }}
                                    </p>

                                    @if ($course->instructor)

                                        <div class="weman mt-3">
                                            <img src="{{ asset('project/uploads/instructors/' . $course->instructor->photo) }}"
                                                alt="" class="weman-1" />
                                            <span class="span-1"> {{ $course->instructor->name }} </span>
                                        </div>

                                    @endif

                                    <div class="number mt-3">
                                        <p class="mb-0 p-8">
                                            @if ($course->price)
                                                {{ $course->price }}₪
                                            @else
                                                مجاني
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="before">
                                    <p class="p-7">{{ $course->name }}</p>
                                    <p class="p-8">تم التحديث في {{ $course->created_at->format('d M') }}</p>
                                    <p class="p-10">{{ $course->brief }}</p>
                                    @foreach ($course->objectives as $objective)
                                        <p class="p-11">
                                            <i class="fa-solid fa-check"></i> {{ $objective->title }}
                                        </p>
                                    @endforeach
                                    <div class="know">
                                        <a href="{{ route('course-details', $course->id) }}" class="form-control a-1">تعرف
                                            أكثر</a>
                                        <a href="{{ route('course-content', $course->id) }}" class="form-control a-1">محتوى
                                            الكورس</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif
            </div>
        </div>
    </section>
    <!-- section-4 -->

    @if (count($activities) > 0)
        <!-- section-4 -->
        <div class="section-9 mt-5 mb-5">
            <div class="container">
                <h4 class="h4-1 mb-3">آخر أنشطة الأكاديمية</h4>
                <a href="{{ route('about-page') }}" class="a-1">مشاهدة المزيد من الأنشطة</a>
                <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-touch="false"
                    data-bs-interval="false" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($activities as $key => $activity)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                @if ($activity->type == 'video')
                                    <video width="100%" height="100%" class="d-block w-100"  controls>
                                        <source src="{{ asset('project/uploads/activities/') }}/{{ $activity['file'] }}"
                                            type="video/mp4" />
                                    </video>
                                @else
                                    <img src="{{ asset('project/uploads/activities/' . $activity->file) }}"
                                        class="d-block w-100" alt="...">
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>
        <!-- section-4 -->
    @endif

    @if (count($opinions) > 0)
        <!-- section-5 -->
        <div class="all">
            <h5 class="text-center">أراء الطلاب</h5>
            <div id="carouselExampleCaptions" class="carousel slide mt-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($opinions as $key => $opinion)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <section class="section-5 position-relative">
                                <div class="container">
                                    <div class="row mt-5">
                                        <div class="col-lg-4 col-md-5">
                                            <div class="box">
                                                <div class="image position-relative">
                                                    <img src="{{ asset('project/website/img/Card.webp') }}" alt=""
                                                        class="img-fluid Card" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-7 position-relative">
                                            <div class="content">
                                                <i class="fa-solid fa-quote-right quote mb-2"></i>
                                                <p class="p-7 p-10">
                                                    {{ $opinion->text }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    <i class="fa-solid fa-angle-left angle-left"></i>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    <i class="fa-solid fa-angle-right angle-right"></i>
                </button>
            </div>

        </div>
        <!-- section-5 -->
    @endif


    @if (count($news)>0)

        <!-- section-10 -->
        <div class="section-10">
            <div class="container">
                <h5 class="text-center">آخر الأخبار</h5>
                <div id="carouselExampleInterval" class="carousel mt-5 slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($news as $key => $new)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="10000">
                                <div class="content">
                                    <div class="image mb-2">
                                        <img src="{{ asset('project/uploads/admins/' . $new->admin->photo) }}" alt=""
                                            class="Ahmed">
                                        <h6 class="mb-0 h6-1">{{ $new->admin->name }}</h6>
                                    </div>
                                    <div class="mb-2">{{ $new->new }}</div>
                                    @if ($new->link)
                                        <div class="more mt-4">
                                            <a href="{{ $new->link }}" class="a-1">إضغط هنا</a>
                                        </div>
                                    @endif
                                    <br>
                                    <p class="text-muted">تم تحديث الخبر في {{ $new->created_at->isoFormat('LLLL') }}</p>

                                </div>
                            </div>
                        @endforeach

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                        <i class="fa-solid fa-angle-left angle-left"></i>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                        <i class="fa-solid fa-angle-right angle-right"></i>
                    </button>
                </div>

            </div>
        </div>
        <!-- section-10 -->
    @endif


    @auth

        <!-- section-6 -->
        <section class="section-6 mt-5 pt-5 pb-5">
            <div class="container">
                <h6 class="text-center fw-bold h6-1 mb-5">هل لديك استفسار ؟</h6>

                <form id="create-form">
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <div class="box">
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" id="user_id">
                                <input type="text" readonly name="name" value="{{ Auth::user()->name }}"
                                    id="name" placeholder="الإسم" class="form-control input-1" />
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="box">
                                <input type="email" readonly name="email" id="email"
                                    value="{{ Auth::user()->email }}" placeholder="البريد الالكتروني"
                                    class="form-control input-1" />
                            </div>
                        </div>

                        <textarea name="message" id="message" cols="30" rows="6" placeholder="اترك استفسارك هنا ..."
                            class="form-control input-1 mt-4"></textarea>
                    </div>
                    <input type="button" onclick="store()" class="form-control a-1 lh-lg mt-4 text-center m-auto"
                        value="أرسل الآن" />
                </form>


            </div>
        </section>
        <!-- section-6 -->
    @endauth

@endsection


@section('scripts')

    <script>
        function store() {

            let formData = new FormData();

            formData.append('user_id', document.getElementById('user_id').value);
            formData.append('message', document.getElementById('message').value);

            axios.post('/contact-us', formData)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    // window.location.getElementById('create-form').location.reload(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
                    // window.location.href = "/"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
                    window.location.reload();
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
    <script defer src="{{ asset('project/website/js/script-slider.js') }}"></script>


    <script src="{{ asset('project/website/js/viedeo.js') }}"></script>

@endsection
