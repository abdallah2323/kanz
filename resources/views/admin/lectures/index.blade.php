@extends('admin.parent')

@section('title', 'Index Lectures')

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

            <li class="breadcrumb-item"><a href="{{ route('lectures.create') }}">Create New Lecture</a></li>

        @endsection

        @section('sub-title')

            Index Lecture

        @endsection

        @section('sub-text')

            see all Lectures

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="sub-title" style="font-size: 18px;font-weight: 700">Lectures Table</h5>
                            <span style="text-transform: capitalize">Here you'll show Lectures informations</span>
                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive" style="padding: 10px">
                                <table id="myTable" class="table table-hover table-striped table-bordered" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Video</th>
                                            <th>Title</th>
                                            <th>Details</th>
                                            <th>Course Name</th>
                                            <th>Added At</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lectures as $key => $lecture)

                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                    <td>
                                                        <video width="320" height="240" controls autoplay muted>
                                                            <source src="{{ asset('project/uploads/lectures')}}/{{ $lecture['video'] }}" type="video/mp4">
                                                        </video>
                                                    </td>
                                                <td>{{ $lecture->title }}</td>
                                                <td>{{ $lecture->details }}</td>
                                                <td>{{ $lecture->course->name }}</td>
                                                <td>{{ $lecture->created_at->isoFormat('LLLL') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                      <a href="{{route('lectures.edit',$lecture->id)}}" type="button" class="btn btn-info">
                                                        <i class="ti-pencil-alt"></i>
                                                      </a>
                                                      <a href="#" class="btn btn-danger" onclick="confirmDestroy({{$lecture->id}}, this)">
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
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

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
    axios.delete('/cms/admin/lectures/'+id)
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
