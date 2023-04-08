@extends('admin.parent')

@section('title','Add New Opinions')

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

            <li class="breadcrumb-item"><a href="{{ route('opinions.index') }}">Show Latest Opinions</a></li>

        @endsection

        @section('sub-title')

            Add new Opinions

        @endsection

        @section('sub-text')

            Add new Opinions

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Add Opinion</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Opinion</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" id="text" name="text" class="form-control" placeholder="Write New Opinion Here ..!"></textarea>
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
        formData.append('text', document.getElementById('text').value);

        axios.post('/cms/admin/opinions', formData)
            .then(function(response) {
                // handle success
                console.log(response);
                toastr.success(response.data.message);
                // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
                window.location.href = "/cms/admin/opinions"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
