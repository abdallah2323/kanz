@extends('website.parent')

@section('title')

{{ $lib->attachment_name }}

@endsection


@section('styles')

<link rel="stylesheet" href="{{ asset('project/website/css/Forms.css') }}" />

@endsection

@section('content')

    <!-- section-1 -->
    <section class="section-1">
        <div class="container">
          <h3 class="fw-bold text-center mb-5 pb-4">
            {{ $lib->attachment_name }}
          </h3>
          <div class="row">
            <div class="box">
              <img src="{{ asset('project/website/img/library.jpg') }}" alt="library" class="library" />
                  <a href="{{route('downloadLibWeb', $lib->attachment)}}" class="a-1">تحميل الملف</a>
            </div>
          </div>
        </div>
      </section>
      <!-- section-1 -->

@endsection


