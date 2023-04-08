@extends('website.parent')

@section('title', 'المكتبة')


@section('styles')
    <link rel="stylesheet" href="{{ asset('project/website/css/Library.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
@endsection

@section('content')
    <!-- section-1 -->
    <section class="section-1">
        <div class="container">
            <form>

                <h3 class="fw-bold text-center mb-5">المكتبة</h3>
                <h5 class="h6-1">بحث</h5>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 mt-4">
                        <div class="box position-relative">
                            <select name="education_id" id="education_id" class="select-1 education_id">
                                <option selected hidden>المستوى الدراسي</option>
                                @foreach ($educations as $education)
                                    <option value="{{ $education->id }}">{{ $education->education }}</option>
                                @endforeach
                            </select>
                            <img src="{{ asset('project/website/img/teatcher.png') }}" alt="" class="teatcher" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-4">
                        <div class="box position-relative">
                            <select name="semester" id="semester" class="select-1 semester">
                                <option selected hidden>الفصل الدراسي</option>
                                <option value="first">الفصل الاول</option>
                                <option value="second">الفصل الثاني</option>
                            </select>
                            <img src="{{ asset('project/website/img/teatcher.png') }}" alt="" class="teatcher" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-4">
                        <div class="box position-relative">
                            <select name="material_id" id="material_id" class="select-1 material_id">
                                <option selected hidden>المواد التعليمية</option>
                                @foreach ($materials as $material)
                                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                                @endforeach
                            </select>
                            <img src="{{ asset('project/website/img/teatcher.png') }}" alt="" class="teatcher" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-4">
                        <div class="box position-relative">
                            <select name="type" id="type" class="select-1 type">

                                <option selected hidden value="">نوع المرفق</option>

                                <option value="book">كتب وملازم</option>
                                <option value="paper">أوراق عمل</option>
                                <option value="exam">نماذج إمتحانات</option>
                                <option value="online_exam">نماذج إمتحانات إلكترونية</option>
                                <option value="youtube_link">روابط يوتيوب</option>

                            </select>
                            <img src="{{ asset('project/website/img/teatcher.png') }}" alt="" class="teatcher" />
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>
    <!-- section-1 -->

    <!-- section-2 -->
    <section class="section-2 mb-5">
        <div class="container">
            <h5 class="h6-1 mt-5 mb-5">المكتبة</h5>
            <div class="search-result">
                @include('website.library.search-result')
            </div>
        </div>
    </section>
    <!-- section-2 -->
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#semester').on('change', function(e) {
                getMoreLibraries();
                // $.ajax({
                //     url: "{{ route('library.search') }}",
                //     method: "GET",
                //     data: {
                //         semester: semester
                //     },
                //     success: function(res) {
                //         // console.log(res);
                //         $('.search-result').html(res);
                //     }
                // });
            });

            $('#education_id').on('change', function(e) {
                getMoreLibraries();
                // $.ajax({
                //     url: "{{ route('library.search') }}",
                //     method: "GET",
                //     data: {
                //         semester: semester
                //     },
                //     success: function(res) {
                //         // console.log(res);
                //         $('.search-result').html(res);
                //     }
                // });
            });

            $('#material_id').on('change', function(e) {
                getMoreLibraries();
                // $.ajax({
                //     url: "{{ route('library.search') }}",
                //     method: "GET",
                //     data: {
                //         semester: semester
                //     },
                //     success: function(res) {
                //         // console.log(res);
                //         $('.search-result').html(res);
                //     }
                // });
            });
            $('#type').on('change', function(e) {
                getMoreLibraries();
                // $.ajax({
                //     url: "{{ route('library.search') }}",
                //     method: "GET",
                //     data: {
                //         semester: semester
                //     },
                //     success: function(res) {
                //         // console.log(res);
                //         $('.search-result').html(res);
                //     }
                // });
            });

            // $('.type').on('change', function() {
            //     let type = $('.type').val();
            //     $.ajax({
            //         url: "{{ route('library.search') }}",
            //         method: "GET",
            //         data: {
            //             type: type
            //         },
            //         success: function(res) {
            //             // console.log(res);
            //             $('.search-result').html(res);
            //         }
            //     });
            // });

            // $('.material_id').on('change', function() {
            //     let material_id = $('.material_id').val();
            //     $.ajax({
            //         url: "{{ route('library.search') }}",
            //         method: "GET",
            //         data: {
            //             material_id: material_id
            //         },
            //         success: function(res) {
            //             // console.log(res);
            //             $('.search-result').html(res);
            //         }
            //     });
            // });

            // $('.education_id').on('change', function() {
            //     var education_id = $('.education_id').val();
            //     $.ajax({
            //         url: "{{ route('library.search') }}",
            //         method: "GET",
            //         data: {
            //             education_id: education_id,
            //         },
            //         success: function(res) {
            //             // console.log(res);
            //             $('.search-result').html(res);
            //         }
            //     });
            // });




        });

        function getMoreLibraries(){
            var semester = $('#semester option:selected').val();
            var education_id = $('#education_id option:selected').val();
            var material_id = $('#material_id option:selected').val();
            var type = $('#type option:selected').val();

                $.ajax({
                    url: "{{ route('library.search') }}",
                    method: "GET",
                    data: {
                        'semester': semester,
                        'education_id': education_id,
                        'material_id' :material_id,
                        'type' :type
                    },
                    success: function(res) {
                        // console.log(res);
                        $('.search-result').html(res);
                    }
                });
        }
    </script>

@endsection
