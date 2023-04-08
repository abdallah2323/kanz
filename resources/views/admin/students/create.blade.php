@extends('admin.parent')

@section('title', 'Add New Student')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        @section('icon')

        <i class="ti ti-plus btn-success"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Students</a></li>

        @endsection

        @section('sub-title')

            Add New Students

        @endsection

        @section('sub-text')

            add new student

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Add New Student</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Student Name</label>
                                    <div class="col-sm-10">
                                        <select name="user_id" id="user_id" class="form-control">
                                            <option selected disabled value="">Select User Name</option>
                                            @foreach ($users as $user)

                                            <option value="{{ $user->id }}">{{ $user->name }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course Name</label>
                                    <div class="col-sm-10">
                                        <select name="course_id" id="course_id" class="form-control">
                                            <option selected disabled value="">Select Course Name</option>
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

        let formData = new FormData();

        formData.append('user_id', document.getElementById('user_id').value);
        formData.append('course_id', document.getElementById('course_id').value);

        axios.post('/cms/admin/students', formData)
            .then(function(response) {
                // handle success
                console.log(response);
                toastr.success(response.data.message);
                // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
                window.location.href = "/cms/admin/students"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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

      $("#user_id").select2({
          placeholder: "Select User",
          allowClear: true,
      });

</script>

@endsection
