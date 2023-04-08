@extends('website.parent')

@section('title', 'الملف الشخصي')

@section('styles')

    <link rel="stylesheet" href="{{ asset('project/website/css/traineeProfile.css') }}" />

@endsection

@section('content')

    <div class="section-Personal">
        <div class="alone bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 boxs_1">
                    <div class="image-1">
                        <img src="{{ asset('project/uploads/users/'. Auth::user()->image) }}" alt="" class="img-1" />
                    </div>
                    <div class="content">
                        <p class="para-1" style="text-transform: capitalize">{{ Auth::user()->name }}</p>
                        <p class="para-2" style="text-transform: uppercase">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="button-1">
                        <a href="{{ route('edit-profile-show') }}"><button class="btn-1">
                                <i class="fa-solid fa-gear"></i> تعديل الملف الشخصي
                            </button></a>
                    </div>
                    <div class="calender">
                        <i class="fa-solid fa-calendar-days calend"></i>
                        <p class="para-3">عضو منذ {{ Auth::user()->created_at->format('d M') }}</p>
                    </div>
                </div>
                <div class="row">

                    @if (Auth::user()->courses->isEmpty())
                        <h4 class="mt-5 h4-1">غير مسجل في اي كورس</h4>
                    @else


                        <h4 class="mt-5 h4-1">الدورات المشترك فيها</h4>
                    @foreach (Auth::user()->courses as $course)

                        <div class="col-lg-3 col-md-4 col-sm-6 col-9 au">
                            <a href="{{ route('course-details', $course->id) }}" class="a-1">
                                <div class="box">
                                    <div class="img">
                                        <img src="{{ asset('project/uploads/courses/'. $course->image) }}" alt="" class="img-2" />
                                    </div>
                                    <p class="p-7">{{ $course->name }}</p>
                                </div>
                            </a>
                        </div>

                    @endforeach

                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
