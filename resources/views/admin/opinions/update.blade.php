@extends('admin.parent')

@section('title', 'Update Opinions')

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

            <li class="breadcrumb-item"><a href="{{ route('opinions.index') }}">Show New Opinions</a></li>

        @endsection

        @section('sub-title')

            Update Opinions

        @endsection

        @section('sub-text')

        Update Opinions


        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Update Opinions</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Opinion</label>
                                    <div class="col-sm-10">

                                        <textarea type="text" id="text" name="text" class="form-control">{{ $opinion->text }}</textarea>
                                    </div>
                                </div>
                                <button type="button" onclick="update({{$opinion->id}})" class="btn btn-warning">Update</button>
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
        formData.append('text', document.getElementById('text').value);


    axios.post('/cms/admin/opinions/'+id, formData)
        .then(function (response) {
        // handle success
        console.log(response);
        toastr.success(response.data.message);
        // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
        window.location.href= "/cms/admin/opinions"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
