@extends('admin.parent')

@section('title', 'Create English Levels')

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

            <li class="breadcrumb-item"><a href="{{ route('levels.index') }}">English Levels</a></li>

        @endsection

        @section('sub-title')

            Create New English Levels

        @endsection

        @section('sub-text')

            create english levels

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Add New English Level</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">English Level</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="level" name="level" class="form-control" placeholder="Enter English Level">
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

        formData.append('level', document.getElementById('level').value);

        axios.post('/cms/admin/levels', formData)
            .then(function(response) {
                // handle success
                console.log(response);
                toastr.success(response.data.message);
                // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
                window.location.href = "/cms/admin/levels"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
