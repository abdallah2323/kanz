@extends('admin.parent')

@section('title', 'Update Courses Objectives')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        @section('icon')

        <i class="ti ti-pencil-alt btn-warning"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('objectives.index') }}">Courses Objectives</a></li>

        @endsection

        @section('sub-title')

            Update "{{ $objective->title }}" Objective for "{{ $objective->course->name }}" Course

        @endsection

        @section('sub-text')

            update Course Objective that you selected

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Update Course Objective</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course Objective</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="title" name="title" class="form-control" value="{{ $objective->title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course</label>
                                    <div class="col-sm-10">
                                        <select name="course_id" id="course_id" class="form-control">

                                            <option selected disabled value="{{ $objective->course_id }}">{{ $objective->course->name }}</option>

                                            @foreach ($courses as $course)

                                            <option value="{{ $course->id }}">{{ $course->name }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <button type="button" onclick="update({{$objective->id}})" class="btn btn-warning">Update</button>
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
    formData.append('course_id', document.getElementById('course_id').value);


    axios.post('/cms/admin/objectives/'+id, formData)
        .then(function (response) {
        // handle success
        console.log(response);
        toastr.success(response.data.message);
        // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
        window.location.href= "/cms/admin/objectives"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
