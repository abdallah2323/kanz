@extends('admin.parent')

@section('title', 'Update Material')

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

            <li class="breadcrumb-item"><a href="{{ route('materials.index') }}">Material</a></li>

        @endsection

        @section('sub-title')

            Update {{ $material->name }} material

        @endsection

        @section('sub-text')

            update material that you selected

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Update Material</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Material Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" value="{{ $material->name }}" name="name" class="form-control">
                                    </div>
                                </div>
                                <button type="button" onclick="update({{$material->id}})" class="btn btn-warning">Update</button>
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


    axios.post('/cms/admin/materials/'+id, formData)
        .then(function (response) {
        // handle success
        console.log(response);
        toastr.success(response.data.message);
        // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
        window.location.href= "/cms/admin/materials"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
