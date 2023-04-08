@extends('admin.parent')

@section('title', 'Social Media Links')

@section('styles')

@endsection

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        @section('icon')

        <i class="icofont icofont-table bg-c-blue"></i>


        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('socials.create') }}">Add New Social Media</a></li>

        @endsection

        @section('sub-title')

            Index Social Media Links

        @endsection

        @section('sub-text')

            Show All Social media links that you added

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="sub-title" style="font-size: 18px;font-weight: 700">Social Media Table</h5>
                            <span style="text-transform: capitalize">Here you'll show Social Media informations</span>
                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive" style="padding: 10px">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Link</th>
                                            <th>Added At</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($socials as $key => $social)

                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td style="text-align: center">
                                                        @if ($social->type == 'facebook')
                                                            <a href="{{ $social->link }}"><img style="width:100px; height:70px" src="{{ asset('project/assets/images/Facebook.png') }}" alt=""></a>

                                                        @elseif ($social->type == 'messenger')
                                                            <a href="{{ $social->link }}"><img style="width:100px; height:100px" src="{{ asset('project/assets/images/messenger.png') }}" alt=""></a>

                                                        @elseif ($social->type == 'instagram')
                                                            <a href="{{ $social->link }}"><img style="width:100px; height:100px" src="{{ asset('project/assets/images/instagram.png') }}" alt=""></a>

                                                        @elseif ($social->type == 'youtube')
                                                            <a href="{{ $social->link }}"><img style="width:60px; height:50px" src="{{ asset('project/assets/images/yotube.png') }}" alt=""></a>

                                                        @elseif ($social->type == 'tiktok')
                                                            <a href="{{ $social->link }}"><img style="width:100px; height:80px" src="{{ asset('project/assets/images/tiktok.png') }}" alt=""></a>

                                                        @elseif ($social->type == 'telegram')
                                                            <a href="{{ $social->link }}"><img style="width:70px; height:60px" src="{{ asset('project/assets/images/Telegram.png') }}" alt=""></a>

                                                        @elseif ($social->type == 'whatsapp')
                                                            <a href="{{ $social->link }}"><img style="width:120px; height:80px" src="{{ asset('project/assets/images/WhatsApp.png') }}" alt=""></a>

                                                    @endif
                                                </td>


                                                <td>{{ $social->created_at->isoFormat('LLLL') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                      <a href="{{route('socials.edit',$social->id)}}" type="button" class="btn btn-info">
                                                        <i class="ti-pencil-alt"></i>
                                                      </a>
                                                      <a href="#" class="btn btn-danger" onclick="confirmDestroy({{$social->id}}, this)">
                                                        <i class="ti-trash"></i>
                                                      </a>
                                                    </div>
                                                  </td>
                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
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
    function confirmDestroy(id,reference){
    console.log("ID: "+id);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
        destroy(id, reference);
        }
    })
    }

    function destroy(id, reference){
    axios.delete('/cms/admin/socials/'+id)
        .then(function (response) {
        // handle success
        console.log(response);
        reference.closest('tr').remove();
        showMessage(response.data);
        })
        .catch(function (error) {
        // handle error
        console.log(error);
        showMessage(error.response.data);
        })
        .then(function () {
        // always executed
        });
    }

    function showMessage(data){
    Swal.fire({
        icon: data.icon,
        title: data.title,
        text: data.text,
        showConfirmButton: false,
        timer: 1500
    })
    }

</script>

@endsection
