@extends('website.parent')

@section('title', 'سياسة الخصوصية')

@section('styles')

    <link rel="stylesheet" href="{{ asset('project/website/css/Policy-conditions.css') }}" />

@endsection

@section('content')

    <section class="section-1 pt-5">
        <div class="container">
            <a href="{{ route('al-kanz') }}" class="a-1"><span>الرئيسية/</span></a>
            <a href="{{ route('privacy-page') }}" class="a-1"><span class="span-1">سياسية الخصوصية</span></a>
            <h5 class="fw-bold mt-2">سياسة الخصوصية</h5>
            <div class="row color">
                @if ($data->count() > 0)

                @foreach ($data as $policy)

                    <div class="paragraph">
                        <p class="p-7 mb-0 fw-bold">{{ $policy->title }}</p>
                        <p class="p-7">
                            {{ $policy->detail }}
                        </p>
                    </div>

                @endforeach

                @endif

            </div>
        </div>
    </section>

@endsection
