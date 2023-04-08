@extends('admin.parent')

@section('title', 'Add Social Media')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        @section('icon')

        <i class="ti ti-plus btn-success"></i>


        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('socials.index') }}">Social Links</a></li>

        @endsection

        @section('sub-title')

            Add new social media link

        @endsection

        @section('sub-text')

            Add new social media link

        @endsection

        <!-- Page-header end -->


        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h2 class="sub-title" style="font-size: 18px; text-align:center">Add Social Media Link</h2>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Social Media Type</label>
                                    <div class="col-sm-10">
                                        <select name="type" id="type" class="form-control">
                                            <option value="facebook">Facebook</option>
                                            <option value="messenger">Messenger</option>
                                            <option value="instagram">Instagram</option>
                                            <option value="whatsapp">Whatsapp</option>
                                            <option value="tiktok">TikTok</option>
                                            <option value="youtube">Youtube</option>
                                            <option value="telegram">Telegram</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Socail Media Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Enter Social Media Link" name="link" id="link" class="form-control">
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
        formData.append('type', document.getElementById('type').value);
        formData.append('link', document.getElementById('link').value);

        axios.post('/cms/admin/socials', formData)
            .then(function(response) {
                // handle success
                console.log(response);
                toastr.success(response.data.message);
                // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
                window.location.href = "/cms/admin/socials"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

@endsection
