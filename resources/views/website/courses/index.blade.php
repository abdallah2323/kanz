@extends('website.parent')

@section('title', 'الكورسات')


@section('styles')
    <link rel="stylesheet" href="{{ asset('project/website/css/All-Courses.css') }}">
@endsection

@section('content')
    <!-- section-1 -->
    @if (count($sliders) > 0)

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)

                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('project/uploads/sliders/'. $slider->slider) }}" class="d-block w-100 img-fluid" alt="..." />
                    </div>

                @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    @else



    @endif
    <!-- section-1 -->


    <!-- section-2 -->
    <section class="section-2 mt-5 pt-5 position-relative" style="text-transform: capitalize">
        <div class="container">
            <h4 class="fw-bold text-center mb-5 pb-3">
                @if (isset($data->paid))

                    {{ $data->paid }}

                @endif
            </h4>

            @if (isset($paidCourses))

                <div class="row position-relative slider">
                    @foreach ($paidCourses as $course)
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
                                        <p class="mb-0 p-8">{{ $course->price }}₪</p>
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
                                        <a href="{{ route('course-details', $course->id) }}" class="form-control a-1">تعرف أكثر</a>
                                        <a href="{{ route('course-content', $course->id) }}" class="form-control a-1">محتوى الكورس</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            @endif

        </div>
    </section>
    <!-- section-2 -->

    <!-- section-3 -->
    <section class="section-2 mt-5 pt-5 position-relative">
        <div class="container">
            <h4 class="fw-bold text-center mb-5 pb-3">
                @if (isset($data->free))

                    {{ $data->free }}

                @endif
            </h4>

            <div class="row position-relative slider">
                @foreach ($freeCourses as $course)
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
                                    <p class="mb-0 p-8">مجاني</p>
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
                                    <a href="{{ route('course-details', $course->id) }}" class="form-control a-1">تعرف أكثر</a>
                                    <a href="{{ route('course-content', $course->id) }}" class="form-control a-1">محتوى الكورس</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- section-3 -->

    <!-- section-4 -->
    <section class="section-2 mt-5 pt-5 position-relative">
        <div class="container">
            <h4 class="fw-bold text-center mb-5 pb-3">
                @if (isset($data->psychological))

                    {{ $data->psychological }}

                @endif
            </h4>

            <div class="row position-relative slider">
                @foreach ($psychologicalCourses as $course)
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
                                    <p class="mb-0 p-8">
                                        @if ($course->price)
                                                <p class="mb-0 p-8">{{ $course->price }}₪</p>
                                            @else
                                                <p class="mb-0 p-8">مجاني</p>
                                        @endif
                                    </p>
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
                                    <a href="{{ route('course-details', $course->id) }}" class="form-control a-1">تعرف أكثر</a>
                                    <a href="{{ route('course-content', $course->id) }}" class="form-control a-1">محتوى الكورس</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- section-4 -->
@endsection
