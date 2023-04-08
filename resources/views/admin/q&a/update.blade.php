@extends('admin.parent')

@section('title', 'Update Common Questions')

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

            <li class="breadcrumb-item"><a href="{{ route('policy.index') }}">Show Common Questions</a></li>

        @endsection

        @section('sub-title')

            Update Common Question

        @endsection

        @section('sub-text')

        Update Common Question


        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Update Common Questions</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Question</label>
                                    <div class="col-sm-10">
                                        <textarea id="question" name="question" class="form-control">{{ $question->question }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Answer</label>
                                    <div class="col-sm-10">
                                        <textarea id="answer" name="answer" class="form-control">{{ $question->answer }}</textarea>
                                    </div>
                                </div>
                                <button type="button" onclick="update({{$question->id}})" class="btn btn-warning">Update</button>
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
        formData.append('question', document.getElementById('question').value);
        formData.append('answer', document.getElementById('answer').value);


    axios.post('/cms/admin/questions/'+id, formData)
        .then(function (response) {
        // handle success
        console.log(response);
        toastr.success(response.data.message);
        // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
        window.location.href= "/cms/admin/questions"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
