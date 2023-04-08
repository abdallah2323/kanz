@extends('admin.parent')

@section('title', 'Update Lecture')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style>
        progress#progress-bar {
            width: 100%;
            height: 2rem
        }
    </style>
@endsection

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        @section('icon')

            <i class="ti ti-pencil-alt btn-warning"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('lectures.index') }}">Lectures</a></li>

        @endsection

        @section('sub-title')

            Update "{{ $lecture->title }}" Lecture in "{{ $lecture->course->name }}" Course

        @endsection

        @section('sub-text')

            update lecture that you selected

        @endsection


        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Update Lecture</h2>
                            <form enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Lecture Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="title" value="{{ $lecture->title }}" name="title" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Lecture Details</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="detail" value="{{ $lecture->details }}" name="detail" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Lecture Video</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="video" value="{{ asset('lectures')}}/{{ $lecture['video'] }}" name="video" class="form-control">
                                    </div>
                                    <div class="mt-3">
                                        <progress id="progress-bar" value="0" max="100"></progress>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course</label>
                                    <div class="col-sm-10">
                                        <select name="course_id" id="course_id" class="form-control">

                                            <option disabled selected value="{{ $lecture->course_id }}">{{ $lecture->course->name }}</option>

                                            @foreach ($courses as $course)

                                            <option value="{{ $course->id }}">{{ $course->name }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <button type="button" onclick="update({{$lecture->id}})" class="btn btn-warning">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function update(id){

    const formData = new FormData();

        formData.append('_method', 'PUT');
        formData.append('title', document.getElementById('title').value);
        formData.append('detail', document.getElementById('detail').value);
        formData.append('video',document.getElementById('video').files[0]);
        formData.append('course_id', document.getElementById('course_id').value);

    axios.post('/cms/admin/lectures/'+id, formData, {
                onUploadProgress: (progressEvent) => {
                    const percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                    const progressBar = document.querySelector('#progress-bar');
                    progressBar.value = percentCompleted;
                }
        })
        .then(function (response) {
        // handle success
        console.log(response);
        toastr.success(response.data.message);
        // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
        window.location.href= "/cms/admin/lectures"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
        })
        .catch(function (error) {
        // handle error
        console.log(error);
        toastr.error(error.response.data.message);
        })
        .then(function () {
        // always executed
        });
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">

    $("#course_id").select2({
          placeholder: "Select Course",
          allowClear: true,

      });


</script>
@endsection
