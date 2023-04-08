@extends('website.parent')

@section('title', 'عن الأكاديمية')

@section('styles')
    <link rel="stylesheet" href="{{ asset('project/website/css/About_academy.css') }}" />
    <style>
        .section-9 .d-block.w-100{
            outline: none;
        }
        .section-9 video {
          border-radius: 10px;
          object-fit: contain;
        }
    </style>
@endsection

@section('content')
    <!-- section-1 -->
    <section class="section-1">
        <div class="container">
            <h3 class="fw-bold pt-3">حول أكاديمية أحمد</h3>
            <div class="row">

                @if (isset($aboutFirst))
                    <div class="col-lg-7 mb-5">
                        <h4 class="h4-1 mt-5">{{ $aboutFirst->title }}</h4>
                        <p class="p-7 mt-4">
                            {{ $aboutFirst->detail }}
                        </p>
                    </div>
                    <div class="col-lg-5 text-center">
                        <img src="{{ asset('project/uploads/about/' . $aboutFirst->image) }}" alt=""
                            class="img-fluid Ahmed" />
                    </div>
                @endif

            </div>
            @if (isset($abouts))

                @foreach ($abouts->skip(1) as $about)
                    <div class="row">
                        <div class="col-lg-7 mb-5">
                            <h4 class="h4-1 mt-5">{{ $about->title }}</h4>
                            <p class="p-7 mt-4">
                                {{ $about->detail }}
                            </p>
                        </div>
                    </div>
                @endforeach

            @endif


        </div>
    </section>
    <!-- section-1 -->

    <!-- section-9-->
    <div class="section-9 mt-5 mb-5">
        <div class="container mt-5">
            <h4 class="h4-1 mb-3">أنشطة الأكاديمية</h4>
            <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel" data-bs-touch="false"
                data-bs-interval="false">
                <div class="carousel-inner">
                    @foreach ($activities as $key => $activity)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            @if ($activity->type == 'video')
                                <video width="100%" height="100%" class="d-block w-100" controls>
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
    <!-- section-9-->
@endsection
