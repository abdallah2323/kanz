@extends('admin.parent')

@section('title',)

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

            <li class="breadcrumb-item"><a href="{{ route('libraries.index') }}"> Library Attachments </a></li>

        @endsection

        @section('sub-title')



        @endsection

        @section('sub-text')



        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Update Lecture</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Attachment Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" name="name" value="{{ $library->attachment_name }}" class="form-control" placeholder="Enter Attachment Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Attachment Type</label>
                                    <div class="col-sm-10">
                                        <select name="type" id="type" class="form-control">

                                            <option selected hidden value="{{ $library->attachment_type }}">{{ $library->attachment_type }}</option>

                                            <option value="book">كتب وملازم</option>
                                            <option value="paper">أوراق عمل</option>
                                            <option value="exam">نماذج إمتحانات</option>
                                            <option value="online_exam">نماذج إمتحانات إلكترونية</option>
                                            <option value="youtube_link">روابط يوتيوب</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Import Attachment</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="file" name="file" value="{{ $library->attachment }}" class="form-control">
                                    </div>
                                    <div class="mt-3">
                                        <progress id="progress-bar" value="0" max="100"></progress>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Education Level</label>
                                    <div class="col-sm-10">
                                        <select name="education_id" id="education_id" class="form-control">

                                            <option selected hidden value="{{ $library->education_id }}">{{ $library->education->education }}</option>

                                            @foreach ($educations as $education)

                                            <option value="{{ $education->id }}">{{ $education->education }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Material</label>
                                    <div class="col-sm-10">
                                        <select name="material_id" id="material_id" class="form-control">

                                            <option disabled hidden value="{{ $library->material_id }}">{{ $library->material->name }}</option>

                                            @foreach ($materials as $material)

                                            <option value="{{ $material->id }}">{{ $material->name }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Semester</label>
                                    <div class="col-sm-10">
                                        <select name="semester" id="semester" class="form-control">

                                            <option disabled hidden value="{{ $library->semester }}">{{ $library->semester }}</option>

                                            <option value="first">الفصل الأول</option>
                                            <option value="second">الفصل الثاني</option>

                                        </select>
                                    </div>
                                </div>
                                <button type="button" onclick="update({{$library->id}})" class="btn btn-warning">Update</button>
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
        formData.append('name', document.getElementById('name').value);
        formData.append('type', document.getElementById('type').value);
        formData.append('file',document.getElementById('file').files[0]);
        formData.append('education_id', document.getElementById('education_id').value);
        formData.append('material_id', document.getElementById('material_id').value);
        formData.append('semester',document.getElementById('semester').value);

    axios.post('/cms/admin/libraries/'+id,  formData, {
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
        window.location.href= "/cms/admin/libraries"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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


      $("#material_id").select2({
          placeholder: "Select Material",
          allowClear: true,

      });

      $("#education_id").select2({
          placeholder: "Select Education",
          allowClear: true,

      });

</script>

@endsection
