@extends('admin.parent')

@section('title', 'Update Instructor CV')

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

            <li class="breadcrumb-item"><a href="{{ route('cv.index') }}">Index Instructors CV's</a></li>

        @endsection

        @section('sub-title')

            Update {{ $cv->instructor->name }} CV

        @endsection

        @section('sub-text')

            update instructor cv that you selected

        @endsection


        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Update Instructor CV</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course Instructor</label>
                                    <div class="col-sm-10">
                                        <select name="instructor_id" id="instructor_id" class="form-control">
                                            <option  disabled selected value="{{ $cv->instructor_id }}">{{ $cv->instructor->name }}</option>
                                            @foreach ($instructors as $instructor)

                                            <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">CV detail</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="cv" name="cv" class="form-control" value="{{ $cv->cv }}">
                                    </div>
                                </div>
                                <button type="button" onclick="update({{$cv->id}})" class="btn btn-warning">Update</button>
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
        formData.append('cv', document.getElementById('cv').value);
        formData.append('instructor_id', document.getElementById('instructor_id').value);


    axios.post('/cms/admin/cv/'+id, formData)
        .then(function (response) {
        // handle success
        console.log(response);
        toastr.success(response.data.message);
        // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
        window.location.href= "/cms/admin/cv"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
