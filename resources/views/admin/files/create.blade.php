@extends('admin.parent')

@section('title', 'Create File')

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

            <i class="ti ti-plus btn-success"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('files.index') }}">Files</a></li>

        @endsection

        @section('sub-title')

            Create new Files

        @endsection

        @section('sub-text')

            add new files

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Add New File</h2>
                            <form enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">File Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter File Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">File Type</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select" name="type" id="type">
                                            <option value="pdf">PDF</option>
                                            <option value="word">Word</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Import File</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="file" name="file" class="form-control">
                                    </div>
                                    <div class="mt-3">
                                        <progress id="progress-bar" value="0" max="100"></progress>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course</label>
                                    <div class="col-sm-10">
                                        <select name="course_id" id="course_id" class="form-control">

                                            <option selected hidden value="">Select Course</option>

                                            @foreach ($courses as $course)

                                            <option value="{{ $course->id }}">{{ $course->name }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <button type="button" onclick="store()" class="btn btn-success">Store</button>
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
    function store() {
        const name = document.querySelector('#name').value;
        const type = document.querySelector('#type').value;
        const file = document.querySelector('#file').files[0];
        let formData = new FormData();
        formData.append('name', name);
        formData.append('type', type);
        formData.append('file', file);
        formData.append('course_id', document.getElementById('course_id').value);

        axios.post('/cms/admin/files', formData, {
            onUploadProgress: (progressEvent) => {
                const percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                const progressBar = document.querySelector('#progress-bar');
                progressBar.value = percentCompleted;
            }
        })
            .then(function(response) {
                // handle success
                console.log(response);
                toastr.success(response.data.message);
                // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
                window.location.href = "/cms/admin/files"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

    $("#course_id").select2({
          placeholder: "Select Course",
          allowClear: true,

      });


</script>

@endsection
