@extends('website.parent')

@section('title', 'الأسئلة الشائعة')

@section('styles')
    <link rel="stylesheet" href="{{ asset('project/website/css/Q&A.css') }}" />
@endsection

@section('content')
    <!-- section-1 -->
    <section class="section-1">
        <div class="container">
            <h3 class="fw-bold pt-3">الأسئلة الشائعة</h3>
            <ol>
                @foreach ($questions as $question)
                    <li>
                        <h4 class="h4-1 mt-5">
                            {{ $question->question }}
                        </h4>
                        <hr />
                        <p class="p-7 mt-4">
                            {{ $question->answer }}
                        </p>
                    </li>
                @endforeach

            </ol>
        </div>
    </section>
    <!-- section-1 -->
@endsection
