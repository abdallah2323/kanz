@extends('admin.parent')

@section('title', 'Update Activity')

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

        <i class="ti ti-pencil-alt btn-warning"></i>


        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('activities.index') }}">Show Activities</a></li>

        @endsection

        @section('sub-title')

            Update Activity File

        @endsection

        @section('sub-text')

        Update Activity File


        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Update Activity</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Activity Type</label>
                                    <div class="col-sm-10">
                                        <select name="type" class="form-control" id="type">
                                            <option value="{{ $activity->type }}" selected hidden>{{  $activity->type }}</option>
                                            <option value="image">Image</option>
                                            <option value="video">Video</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Activity File</label>
                                    <div class="col-sm-10">
                                        <input type="file" value="{{ $activity->file }}" name="file" id="file" class="form-control">
                                    </div>
                                    <div class="mt-3">
                                        <progress id="progress-bar" value="0" max="100"></progress>
                                    </div>
                                </div>
                                <button type="button" onclick="update({{$activity->id}})" class="btn btn-warning">Update</button>
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
        formData.append('type',document.getElementById('type').value);
        formData.append('file',document.getElementById('file').files[0]);


    axios.post('/cms/admin/activities/'+id, formData, {
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
        window.location.href= "/cms/admin/activities"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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

@endsection
