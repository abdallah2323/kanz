@extends('admin.parent')

@section('title', 'Update Course')

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

            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></li>

        @endsection

        @section('sub-title')

            Update {{ $course->name }} Course

        @endsection

        @section('sub-text')

            update course that you selected

        @endsection


        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Update Course</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" name="name" value="{{ $course->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course Brief</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="brief" name="brief" value="{{ $course->brief }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" id="image" value="{{ $course->image }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course Type</label>
                                    <div class="col-sm-10">
                                        <select style="text-transform: capitalize" name="type" id="type" class="form-control">
                                            <option selected hidden value="{{ $course->type }}">{{ $course->type }}</option>

                                            <option value="course">Course</option>
                                            <option value="psychological">Psychological aid</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course Price</label>
                                    <div class="col-sm-3">
                                        <input type="number" id="price" name="price" value="{{ $course->price }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Explanatory Video</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="explanatory" value="{{ asset('project/uploads/courses/explanatory') }}/{{ $course->explanatory }}" name="explanatory" class="form-control">
                                    </div>
                                    <div class="mt-3">
                                        <progress id="progress-bar" value="0" max="100"></progress>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" id="description"
                                         cols="30" rows="10" placeholder="Enter Course Description">{{ $course->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course Instructor</label>
                                    <div class="col-sm-10">
                                        <select name="instructor_id" id="instructor_id" class="form-control">
                                            <option  disabled selected value="{{ $course->instructor_id }}">{{ $course->instructor->name }}</option>
                                            @foreach ($instructors as $instructor)

                                            <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course Material</label>
                                    <div class="col-sm-10">
                                        <select name="material_id" id="material_id" class="form-control">
                                            <option  disabled selected value="{{ $course->material_id }}">{{ $course->material->name }}</option>
                                            @foreach ($materials as $material)

                                            <option value="{{ $material->id }}">{{ $material->name }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <button type="button" onclick="update({{$course->id}})" class="btn btn-warning">Update</button>
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
        formData.append('brief', document.getElementById('brief').value);
        formData.append('type', document.getElementById('type').value);
        formData.append('price', document.getElementById('price').value);
        formData.append('description', document.getElementById('description').value);
        formData.append('image',document.getElementById('image').files[0]);
        formData.append('explanatory',document.getElementById('explanatory').files[0]);
        formData.append('instructor_id', document.getElementById('instructor_id').value);
        formData.append('material_id', document.getElementById('material_id').value);


    axios.post('/cms/admin/courses/'+id, formData , {
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
        window.location.href= "/cms/admin/courses"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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

    $("#instructor_id").select2({
          placeholder: "Select Instructor",
          allowClear: true,

      });

      $("#material_id").select2({
          placeholder: "Select Material",
          allowClear: true,

      });

</script>
@endsection
