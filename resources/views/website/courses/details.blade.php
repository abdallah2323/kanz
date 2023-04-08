@extends('website.parent')

@section('title')

{{ $course->name }}

@endsection


@section('styles')
    <link rel="stylesheet" href="{{ asset('project/website/css/Details-Courses.css') }}" />
    <link rel="stylesheet" href="{{ asset('project/website/css/video.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    @if ($course->lectures->isEmpty())

    <style>
        .section-1 .box-1{
            background-color: aliceblue;
            height: 311px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        @media (max-width: 1199.98px){
        .section-1 .box-1 {
            height: auto;
            margin-top: 0;
        }
    }
        .section-1 .box-1 .p-7{
            font-weight: bold;
            text-align: center;
            color: #787676;
            margin-bottom: 0;
        }
    </style>

    @endif
@endsection

@section('content')
    <!-- section-1 -->
    <div class="section-1 pt-5 pb-5">
        <div class="container pt-5">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-end">
                    <div class="box">
                        <h5 class="lh-lg text-dark">
                            {{ $course->name }}
                        </h5>
                        <p class="lh-lg p-7 text-dark">
                            {{ $course->brief }}
                        </p>

                        <a href="{{ route('course-content', $course->id) }}" class="form-control more mt-5">محتوى الكورس</a>
                    </div>
                </div>
                @if ($course->explanatory)

                    {{-- <div class="col-md-6 mt-5">
                        <div class="box-1 position-relative">
                            <img src="{{ asset('project/website/img/arrow.png') }}" alt="" class="arrow" />
                            <video width="100%" height="100%" autoplay muted controls>
                                <source src="{{ asset('project/uploads/courses/explanatory') }}/{{ $course->explanatory }}"
                                    type="video/mp4" />
                            </video>
                        </div>
                    </div> --}}
                    <div class="col-md-6 mt-5">
                        <div class="box-1 position-relative">
                          <img src="{{ asset('project/website/img/arrow.png') }}" alt="" class="arrow" />

                          <div class="container-1">
                            <div class="video_player">
                                <video preload="metadata" class="main-video">
                                    <source src="{{ asset('project/uploads/courses/explanatory') }}/{{ $course->explanatory }}" size="1080"
                                        type="video/mp4">
                                </video>
                            </div>
                          </div>
                        </div>
                      </div>

                @else

                <div class="col-md-6 mt-5">
                    <div class="box-1 position-relative">
                        <img src="{{ asset('project/website/img/arrow.png') }}" alt="" class="arrow" />
                        <p class=p-7>لم يتم رفع فيديو توضيحي بعد
                        </p>
                    </div>
                </div>

                @endif

            </div>
        </div>
    </div>
    <!-- section-1 -->

    <!-- section-2 -->
    <section class="section-2 mt-5 pt-5 mb-5 pb-5">
        <div class="container">
            <div class="row">
                <h4 class="fw-bold mb-4">الوصف</h4>
                <p class="p-7">
                    {{ $course->description }}
                </p>
            </div>
        </div>
    </section>
    <!-- section-2 -->

    @if (count($course->objectives) > 0)
        <!-- section-3 -->
        <section class="section-3 mt-5 pt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="box">
                        <h4 class="fw-bold mb-5 h4-1 pb-3">محاور الدورة</h4>
                        <ol class="position-relative">

                            @foreach ($course->objectives as $objective)
                                <li>
                                    <p class="p-8">{{ $objective->title }}</p>
                                </li>
                            @endforeach

                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- section-3 -->
    @endif

    <!-- section-5 -->
    <section class="section-5 pt-5 pb-5">
        <div class="container">
            <h4 class="text-center mb-3">المحاضر ومعد الدورة</h4>
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <div class="box">
                        <div class="image">
                            <img src="{{ asset('project/uploads/instructors/' . $course->instructor->photo) }}"
                                alt="" class="instructor" />
                            <p class="mt-2">{{ $course->instructor->name }}</p>
                        </div>
                        <a href="{{ route('instructor-show', $course->instructor->id) }}" class="form-control a-1 mb-3">صفحة المدرب</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="box-1">

                        @foreach ($course->instructor->cv as $cv)
                            <p class="p-7">
                                {{ $cv->cv }}
                            </p>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section-5 -->

    <!-- section-4 -->
    <section class="section-4 mt-5 pt-5">
        <div class="container color">
            <svg xmlns="http://www.w3.org/2000/svg" width="23.905" height="21.105" viewBox="0 0 23.905 21.105">
                <defs>
                    <symbol id="heart" viewBox="0 0 23.905 21.105">
                        <path class="heart-box" data-name="Icon feather-heart"
                            d="M22.539,6.186a5.764,5.764,0,0,0-8.153,0L13.275,7.3,12.164,6.186a5.765,5.765,0,1,0-8.153,8.153L5.122,15.45,13.275,23.6l8.153-8.153,1.111-1.111a5.764,5.764,0,0,0,0-8.153Z"
                            transform="translate(-1.323 -3.497)" fill="none" stroke="#707070" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1" />
                    </symbol>

                    <symbol id="heart-fill" viewBox="0 0 23.905 21.105">
                        <path
                            d="M22.539,6.186a5.764,5.764,0,0,0-8.153,0L13.275,7.3,12.164,6.186a5.765,5.765,0,1,0-8.153,8.153L5.122,15.45,13.275,23.6l8.153-8.153,1.111-1.111a5.764,5.764,0,0,0,0-8.153Z"
                            fill="red" stroke="red" transform="translate(-1.323 -3.497)" fill="none" stroke="red"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                    </symbol>
                </defs>
            </svg>
            <div class="row">
                <div class="box-4">
                    <div class="content">
                        <p>التعليقات</p>
                        <p>الأحدث</p>
                    </div>

                    @foreach ($course->comments->sortByDesc('created_at')->take(5) as $comment)
                        <div class="content-1 mt-5">
                            <div class="comment">
                                <img src="{{ asset('project/uploads/users/' . $comment->user->image) }}" alt=""
                                    class="man" />
                                <div class="comm">
                                    <p class="p-12">{{ $comment->user->name }}</p>
                                    <p class="p-13">
                                        {{ $comment->comment }}
                                    </p>
                                </div>
                            </div>
                            <div id="icon">
                                <svg width="20" height="20" fill="currentColor">
                                    <use href="#heart"></use>
                                </svg>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- section-4 -->
@endsection

@section('scripts')
    <script src="{{ asset('project/website/js/viedeo.js') }}"></script>
@endsection
