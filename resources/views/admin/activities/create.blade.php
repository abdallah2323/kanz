@extends('admin.parent')

@section('title','Create New Activity')

@section('styles')

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

            <li class="breadcrumb-item"><a href="{{ route('activities.index') }}">Index Activities</a></li>

        @endsection

        @section('sub-title')

            Create New Activity

        @endsection

        @section('sub-text')

            create New Activity

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Add New Activity</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Activity Type</label>
                                    <div class="col-sm-10">
                                        <select name="type" class="form-control" id="type">
                                            <option selected hidden>Select File Type</option>
                                            <option value="image">Image</option>
                                            <option value="video">Video</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Activity File</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="file" id="file" class="form-control">
                                    </div>
                                    <div class="mt-3">
                                        <progress id="progress-bar" value="0" max="100"></progress>
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
        const type = document.querySelector('#type').value;
        const file = document.querySelector('#file').files[0];
        const formData = new FormData();
        formData.append('type', type);
        formData.append('file', file);

        axios.post('/cms/admin/activities', formData,{
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
                window.location.href = "/cms/admin/activities"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
