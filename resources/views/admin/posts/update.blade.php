@extends('admin.parent')

@section('title', 'Update Courses Posts')

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

            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Courses posts</a></li>

        @endsection

        @section('sub-title')

            Update Course Post

        @endsection

        @section('sub-text')

            update Course post that you selected

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Update Course Post</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course Post</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="post" name="post" class="form-control" value="{{ $post->post }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Post Link <label class="label label-danger">if the post have link</label></label>
                                    <div class="col-sm-10">
                                        <input type="text" id="link" name="link" class="form-control" value="{{ $post->link }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Course</label>
                                    <div class="col-sm-10">
                                        <select name="course_id" id="course_id" class="form-control">

                                            <option selected disabled value="{{ $post->course_id }}">{{ $post->course->name }}</option>

                                            @foreach ($courses as $course)

                                            <option value="{{ $course->id }}">{{ $course->name }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <button type="button" onclick="update({{$post->id}})" class="btn btn-warning">Update</button>
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
    formData.append('post', document.getElementById('post').value);
    formData.append('link', document.getElementById('link').value);
    formData.append('course_id', document.getElementById('course_id').value);


    axios.post('/cms/admin/posts/'+id, formData)
        .then(function (response) {
        // handle success
        console.log(response);
        toastr.success(response.data.message);
        // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
        window.location.href= "/cms/admin/posts"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
