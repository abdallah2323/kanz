@extends('admin.parent')

@section('title','Add News')

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

            <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Show Latest News</a></li>

        @endsection

        @section('sub-title')

            Add new News

        @endsection

        @section('sub-text')

            Add new news

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Add News</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">News</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id" id="admin_id" class="form-control">
                                        <textarea type="text" id="new" name="new" class="form-control" placeholder="Write New News Here ..!"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">News Link <label class="label label-danger">if the news have link</label></label>
                                    <div class="col-sm-10">
                                        <input type="text" id="link" name="link" class="form-control" placeholder="Enter News Link">
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
        formData.append('admin_id', document.getElementById('admin_id').value);
        formData.append('new', document.getElementById('new').value);
        formData.append('link', document.getElementById('link').value);

        axios.post('/cms/admin/news', formData)
            .then(function(response) {
                // handle success
                console.log(response);
                toastr.success(response.data.message);
                // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
                window.location.href = "/cms/admin/news"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
