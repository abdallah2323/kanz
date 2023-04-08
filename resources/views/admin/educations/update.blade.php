@extends('admin.parent')

@section('title', 'Update Education Level')

@section('styles')

@endsection

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        @section('icon')

        <i class="ti ti-pencil-alt btn-warning"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('educations.index') }}">Education Levels</a></li>

        @endsection

        @section('sub-title')

            Update {{ $education->education }} Education Level

        @endsection

        @section('sub-text')

            update Education Level that you selected

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Update Education Level</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Education Level</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="level" value="{{ $education->education }}" name="level" class="form-control">
                                    </div>
                                </div>
                                <button type="button" onclick="update({{$education->id}})" class="btn btn-warning">Update</button>
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
    formData.append('level', document.getElementById('level').value);


    axios.post('/cms/admin/educations/'+id, formData)
        .then(function (response) {
        // handle success
        console.log(response);
        toastr.success(response.data.message);
        // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
        window.location.href= "/cms/admin/educations"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
