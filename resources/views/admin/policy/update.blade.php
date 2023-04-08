@extends('admin.parent')

@section('title',)

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

            <li class="breadcrumb-item"><a href="{{ route('policy.index') }}">Show Privacy & Policy Page</a></li>

        @endsection

        @section('sub-title')

            Update Privacy & Policy Paragraph

        @endsection

        @section('sub-text')

        Update Privacy & Policy Paragraph


        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Update Privacy & Policy Paragraph</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="title" name="title" class="form-control" value="{{ $policy->title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Details</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" id="detail" name="detail" class="form-control">{{ $policy->detail }}</textarea>
                                    </div>
                                </div>
                                <button type="button" onclick="update({{$policy->id}})" class="btn btn-warning">Update</button>
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
        formData.append('detail', document.getElementById('detail').value);


    axios.post('/cms/admin/policy/'+id, formData)
        .then(function (response) {
        // handle success
        console.log(response);
        toastr.success(response.data.message);
        // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
        window.location.href= "/cms/admin/policy"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
