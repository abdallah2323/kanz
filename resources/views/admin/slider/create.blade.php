@extends('admin.parent')

@section('title', 'Course Page')

@section('styles')


@endsection

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        @section('icon')

            <i class="ti ti-plus btn-success"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('course-page.index') }}">Course Page</a></li>

        @endsection

        @section('sub-title')

            Add items to course page

        @endsection

        @section('sub-text')

            Add items to course page

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Add items to Course page</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Slider</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Paid Courses Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="paid" name="paid" class="form-control" placeholder="Enter Course Title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Free Courses Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="free" name="free" class="form-control" placeholder="Enter Course Title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Psychological Courses Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="psychological" name="psychological" class="form-control" placeholder="Enter Course Title">
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
        formData.append('paid', document.getElementById('paid').value);
        formData.append('free', document.getElementById('free').value);
        formData.append('psychological', document.getElementById('psychological').value);
        formData.append('image',document.getElementById('image').files[0]);

        axios.post('/cms/admin/course-page', formData)
            .then(function(response) {
                // handle success
                console.log(response);
                toastr.success(response.data.message);
                // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
                window.location.href = "/cms/admin/course-page"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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

@endsection
