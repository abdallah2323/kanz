@extends('admin.parent')

@section('title','Create Common Question')

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

            <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Show Common Questions</a></li>

        @endsection

        @section('sub-title')

            Add New Common Questions

        @endsection

        @section('sub-text')

            Add New Common Questions

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Add Common Question</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Question</label>
                                    <div class="col-sm-10">
                                        <textarea id="question" name="question" class="form-control" placeholder="Enter Question"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Answer</label>
                                    <div class="col-sm-10">
                                        <textarea id="answer" name="answer" class="form-control" placeholder="Enter Answer"></textarea>
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
        formData.append('question', document.getElementById('question').value);
        formData.append('answer', document.getElementById('answer').value);

        axios.post('/cms/admin/questions', formData)
            .then(function(response) {
                // handle success
                console.log(response);
                toastr.success(response.data.message);
                // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
                window.location.href = "/cms/admin/questions"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
