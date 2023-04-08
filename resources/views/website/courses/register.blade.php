@extends('website.parent')

@section('title')

    @if ($course->price == NULL)

        تأكيد التسجيل

        @else

        آلية الدفع

    @endif

@endsection

@section('styles')

    @if ($course->price == NULL)

    <link rel="stylesheet" href="{{ asset('project/website/css/noNotification.css') }}">

    @else

    <link rel="stylesheet" href="{{ asset('project/website/css/noNotification.css') }}">

    @endif


@endsection

@section('content')

    @if ($course->price == NULL)


    <div class="section-NoCertificate">
        <div class="container">
            <div class="row">
                <div class="link-home">

                </div>
                <div class="div-bell">
                    <form action="">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" id="user_id">
                        <input type="hidden" value="{{ $course->id }}" name="course_id" id="course_id">
                        <h6 class="h6-1">عزيزي المستخدم {{ Auth::user()->name }}</h6>
                        <p class="p-7">هل انت متأكد لتسجيلك في الكورس {{ $course->name }}</p>

                        <button type="button" onclick="store({{$course->id}})" class="button-1 form-control">لتأكيد التسجيل اضغط هنا</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    @else

    <div class="section-NoCertificate">
        <div class="container">
            <div class="row">
                <div class="link-home">
                    <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_lsklpwya.json" background="transparent" speed="1"
                    style="width: 200px; height: 200px; position: absolute !important; top: 25% !important; left: 50% !important; transform: translateX(-50%) !important;"
                    loop autoplay></lottie-player>
                </div>
                <div class="div-bell">
                    
                    <form action="">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" id="user_id">
                        <input type="hidden" value="{{ $course->id }}" name="course_id" id="course_id">
                        <h6 class="h6-1">عزيزي الطالب {{ Auth::user()->name }}</h6>
                        <p class="p-7">اذا تريد التسجيل في هذا الكورس قم بتتبع وسيلة الدفع وسيتم تسجيلك مباشرة وقت الدفع</p>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">وسيلة الدفع
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endif

@endsection

@section('scripts')

    @if ($course->price == NULL)

    @else
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        jQuery(".button").click(function() {
            jQuery(".single").hide();
            jQuery(".div" + $(this).attr("target")).show();
        });
    </script>

    @endif

    <script>
        function store(id) {

            let formData = new FormData();

            formData.append('user_id', document.getElementById('user_id').value);
            formData.append('course_id', document.getElementById('course_id').value);

            axios.post('/student-register/'+id, formData)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
                    // window.location.reload();
                    window.location.href = "/course-content/"+id; // الانتقال الي الراوت المكتوب عند اضافة عنصر

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

@endsection
