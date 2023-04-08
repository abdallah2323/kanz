@extends('website.parent')

@section('title', 'شروط الإستخدام')

@section('styles')

    <link rel="stylesheet" href="{{ asset('project/website/css/Policy-conditions.css') }}" />

@endsection

@section('content')

    <section class="section-1 pt-5">
        <div class="container">
            <a href="{{ route('al-kanz') }}" class="a-1"><span>الرئيسية/</span></a>
            <a href="{{ route('privacy-page') }}" class="a-1"><span class="span-1">شروط الإستخدام</span></a>
            <h5 class="fw-bold mt-2">شروط الإستخدام</h5>
            <div class="row color">
                @if ($data->count() > 0)

                    @foreach ($data as $guarantee)
    
                        <div class="paragraph">
    
                            <p class="p-7 mb-3 fw-bold">{{ $guarantee->title }}</p>
                            <ul>
                                <li>
                                    <p class="p-7">
                                        {{ $guarantee->detail }}
                                    </p>
                                </li>
                            </ul>
    
                        </div>
    
                    @endforeach

                @endif

            </div>
        </div>
    </section>

@endsection
