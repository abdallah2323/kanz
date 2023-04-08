@extends('website.parent')

@section('title')
{{ $lecture->title }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('project/website/css/Course.css') }}" />
    <link rel="stylesheet" href="{{ asset('project/website/css/emojionearea.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('project/website/css/video.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection

@section('content')
    <!-- section-1 -->
    @if ($lecture->course->users->contains(Auth::user()->id))

        <section class="section-1">
            <div class="container">
                <div class="row">
                    <div class="box">
                        {{-- <video width="100%" height="100%" autoplay muted controls>
                            <source src="{{ asset('lectures')}}/{{ $lecture['video'] }}" type="video/mp4" />
                        </video> --}}
                        <div class="container-1">
                            <div class="video_player">
                                <video preload="metadata" class="main-video">
                                    <source src="{{ asset('project/uploads/lectures')}}/{{ $lecture['video'] }}" size="1080"
                                        type="video/mp4">
                                    <track label="English" kind="subtitles" src="./How To Get Started With VSCode.vtt"
                                        srclang="en">
                                    <track label="Urdu" kind="subtitles" src="./test.vtt" srclang="en">
                                </video>
                            </div>
                        </div>
                        @yield('lecture')
                    </div>
                    <div class="row">
                        <div class="box-1" style="text-transform: capitalize">
                            <a style="text-decoration: none" href="{{ route('course-content', $lecture->course->id) }}">
                                <h4 class="mt-5 mb-3 h4-1">{{ $lecture->course->name }}</h4>
                            </a>
                            <p class="p-7">{{ $lecture->title }}</p>


                            <div class="content mt-4">
                                <div class="button one active" target="1">الدروس</div>
                                <div class="button two" target="2">المادة العلمية</div>
                                <div class="button three" target="3">تعليقات</div>
                                <div class="button four" target="4">بوستات</div>
                            </div>
                            <ol class="mt-4 div1 single">

                                @foreach ($lecture->course->lectures as $lec)
                                    <li>
                                        <a href="{{ route('lecture-show', $lec->id) }}" class="a-1"> {{ $lec->title }} </a>
                                    </li>
                                @endforeach

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section-1 -->

        <!-- section-2-->
        <section class="section-2 mt-5 div2 single" style="display: none">
            <div class="container">
                <div class="row">
                    @foreach ($lecture->course->files as $file)
                        <label for="pdf" class="mb-4">
                            <a href="{{route('downloadFileWeb',$file->file)}}" class="a-1">
                                @if($file->type == 'pdf')<img src="{{ asset('project/website/img/pdf.png') }}" alt="" class="pdf" />@else<img src="{{ asset('project/website/img/word.png') }}" alt="" class="pdf" />@endif
                                {{ $file->name }}
                            </a>
                        </label>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- section-2-->

        <!-- section-4 -->
        <section class="section-4 mt-5 div3 single" style="display: none">
            <div class="container color pt-5">
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

                        @foreach ($lecture->course->comments as $comment)

                            <div class="content-1 mt-5">
                                <div class="comment">
                                    <img src="{{ asset('project/uploads/users/'. $comment->user->image) }}" alt="" class="man" />
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

                            @auth
                                <div class="add-comment mt-5 pb-5">
                                    <form action="" class="form-1">
                                        <img src="{{ asset('project/uploads/users/' . Auth::user()->image) }}" alt=""
                                            class="man" />

                                        <input type="hidden" name="course_id" id="course_id" value="{{ $lecture->course->id }}">
                                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                        <input type="text" name="comment" id="comment" placeholder="أضف تعليقا"
                                            class="input-1" />

                                        <button type="button" onclick="store()" class="button-1">
                                            <svg viewBox="0 0 24 24" height="24" width="24"
                                                preserveAspectRatio="xMidYMid meet" class="send" version="1.1" x="0px"
                                                y="0px" enable-background="new 0 0 24 24" xml:space="preserve">
                                                <path fill="currentColor"
                                                    d="M1.101,21.757L23.8,12.028L1.101,2.3l0.011,7.912l13.623,1.816L1.112,13.845 L1.101,21.757z">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @endauth

                    </div>
                </div>
            </div>
        </section>
        <!-- section-4 -->

        <!-- section-5 -->
        <section class="section-5 mt-4 div4 single" style="display: none">
            <div class="container">
                <div class="row">

                    @foreach ($lecture->course->posts as $post)

                    <div class="box mb-3">
                        <div class="image">
                            <img src="{{ asset('project/uploads/instructors/'. $post->course->instructor->photo) }}" alt="" class="Ahmed" />
                            <div class="content">
                                <h6 class="h6-1">{{ $post->course->instructor->name }}</h6>
                                <p class="date">{{ $post->created_at->isoFormat('LLLL') }}</p>
                            </div>
                        </div>
                        <div class="post mt-2">
                            <p class="p-7">
                                {{ $post->post }}
                                <br>
                                <br>
                                @if ($post->link)

                                    <a class="form-control a-10" href="{{ $post->link }}">إضغط هنا</a>

                                @endif
                            </p>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </section>
        <!-- section-5 -->
        @else
        <section class="section-1">
            <div class="container">
                <div class="row">
                    <div class="box">
                            <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_lsklpwya.json"
                                background="transparent" speed="1"
                                style="width: 200px; height: 200px; position: absolute !important; top: 15% !important; left: 50% !important; transform: translateX(-50%) !important;"
                                loop autoplay></lottie-player>
                            <p class="p-7">عذرا انت غير مسجل في هذا الكورس بعد</p>
                            <a href="#" class="form-control a-2">اشترك في هذه الدورة</a>
                    </div>
                </div>
            </div>
        </section>
        @endif
@endsection

@section('scripts')
    <script>
        function store() {

            let formData = new FormData();

            formData.append('user_id', document.getElementById('user_id').value);
            formData.append('course_id', document.getElementById('course_id').value);
            formData.append('comment', document.getElementById('comment').value);

            axios.post('/comment-store', formData)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    window.location.reload();
                    // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
                    // window.location.href = "/"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message);
                })
                .then(function() {
                    // always executed
                });
        }
    </script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('project/website/js/scripts.js') }}"></script>
    <script src="{{ asset('project/website/js/emojionearea.min.js') }}"></script>
    <script src="{{ asset('project/website/js/script-1.js') }}"></script>

    <script>
        let element = document.querySelectorAll(
            ".section-1 .box-1 .content .button"
        );
        console.log(element);
        //Loop on All List Items
        element.forEach((span) => {
            //Click on Every List items
            span.addEventListener("click", (e) => {
                e.target.parentElement.querySelectorAll(".active").forEach((ele) => {
                    ele.classList.remove("active");
                });
                e.target.classList.add("active");
            });
        });
    </script>
    <script src="{{ asset('project/website/js/viedeo.js') }}"></script>
@endsection
