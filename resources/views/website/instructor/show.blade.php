@extends('website.parent')

@section('title')

المحاضر {{ $instructor->name }}

@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('project/website/css/Coach.css') }}" />
    <style>
        .section-2 .box .image {
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <!-- section-1 -->
    <section class="section-1 pt-5 mt-5 pb-5">
        <div class="container mb-5">
            <div class="row">
                <div class="col-sm">
                    <div class="box position-relative">
                        <h3>{{ $instructor->name }}</h3>
                        <p class="p-7">{{ $instructor->specialty }}</p>
                        <br>
                        @if ($instructor->cv->count() > 0)
                            <div class="content">
                                <h5>السيرة الذاتية</h5>

                                @foreach ($instructor->cv as $cv)
                                    <p class="p-8" style="text-transform: capitalize">
                                        {{ $cv->cv }}
                                    </p>
                                @endforeach

                            </div>
                            <div class="icon">
                                <p class="mb-0 p-8 fw-bold">تواصل عبر</p>
                                @if ($socials->count() > 0)

                                    @foreach ($socials as $social)
                                        @if($social->type == 'instagram')
                                            <a href="{{$social->link}}" target="_blank">
                                                <i class="fa-brands fa-instagram behance"></i>
                                            </a>
                                        @elseif($social->type == 'facebook')
                                            <a href="{{$social->link}}" target="_blank">
                                                <i class="fa-brands fa-facebook-f behance"></i>
                                            </a>
                                        @elseif($social->type == 'whatsapp')
                                            <a href="{{$social->link}}" target="_blank">
                                                <i class="fa-brands fa-whatsapp behance"></i>
                                            </a>
                                        @endif
                                    @endforeach

                                @endif
                            </div>
                        @endif
                        <img src="{{ asset('project/website/img/dots.png ') }}" alt="" class="dots" />
                    </div>
                </div>
                <div class="col-sm text-center">
                    <div class="image position-relative">
                        <img src="{{ asset('project/uploads/instructors/'. $instructor->photo) }}" alt="" class="img-fluid Coach" />
                        <img src="{{ asset('project/website/img/bar-1.png') }}" alt="" class="bar-1" />
                        <img src="{{ asset('project/website/img/bar-2.png') }}" alt="" class="bar-2" />
                        <img src="{{ asset('project/website/img/bar-3.png') }}" alt="" class="bar-3" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section-1 -->

    <!-- section-2 -->
    <section class="section-2 mt-5 pt-5 position-relative">
        <div class="container">
            @if ($instructor->courses->count() > 0)
                <h4 class="fw-bold mb-4 pb-3">الكورسات الخاصة المسجلة</h4>

                <div class="row position-relative slider">

                    @foreach ($instructor->courses as $course)
                        <div class="col-lg-4 col-md-6 col-sm-6 mb-5">
                            <div class="box position-relative">
                                <div class="image">
                                    <img src="{{ asset('project/uploads/courses/' . $course->image) }}" alt=""
                                        class="img-fluid" />
                                </div>
                                <div class="content">
                                    <p class="p-7 fw-bold">
                                        {{ $course->name }}
                                    </p>
                                    <div class="weman mt-3">
                                        <img src="{{ asset('project/uploads/instructors/' . $course->instructor->photo) }}"
                                            alt="" class="weman-1" />
                                        <span class="span-1"{{ $course->instructor->name }} </span>
                                    </div>
                                    <div class="number mt-3">
                                        @if ($course->price)
                                            <p class="mb-0 p-8">{{ $course->price }}₪</p>
                                        @else
                                            <p class="mb-0 p-8">مجاني</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="before">
                                    <p class="p-7">{{ $course->name }}</p>
                                    <p class="p-8">تم التحديث في {{ $course->created_at->format('d M') }}</p>
                                    <p class="p-10">
                                        {{ $course->brief }}
                                    </p>
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

                </div>
            @else
                <h4 class="fw-bold mb-4 pb-3">ليس هناك كورسات مسجلة بعد لهذا المعلم</h4>
            @endif

        </div>
    </section>
    <!-- section-2 -->
@endsection
