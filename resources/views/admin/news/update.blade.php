@extends('admin.parent')

@section('title', 'Update News')

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

            <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Show New News</a></li>

        @endsection

        @section('sub-title')

            Update News

        @endsection

        @section('sub-text')

        Update News


        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Update News</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">News</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" value="{{ $article->admin_id }}" name="admin_id" id="admin_id" class="form-control">

                                        <textarea type="text" id="new" name="new" class="form-control">{{ $article->new }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">News Link <label class="label label-danger">if the news have link</label></label>
                                    <div class="col-sm-10">
                                        <input type="text" id="link" name="link" class="form-control" value="{{ $article->link }}">
                                    </div>
                                </div>
                                <button type="button" onclick="update({{$article->id}})" class="btn btn-warning">Update</button>
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
        formData.append('admin_id', document.getElementById('admin_id').value);
        formData.append('new', document.getElementById('new').value);
        formData.append('link', document.getElementById('link').value);


    axios.post('/cms/admin/news/'+id, formData)
        .then(function (response) {
        // handle success
        console.log(response);
        toastr.success(response.data.message);
        // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
        window.location.href= "/cms/admin/news"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
