@extends('admin.parent')

@section('title', 'Index Students')

@section('styles')

@endsection

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        @section('icon')

            <i class="icofont icofont icofont-users-alt-5 bg-c-blue"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('students.create') }}"> Create New Student </a></li>


        @endsection

        @section('sub-title')

            Index Students

        @endsection

        @section('sub-text')

            See all students assigned

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="sub-title" style="font-size: 18px;font-weight: 700">Students Table</h5>
                            <span style="text-transform: capitalize">Here you'll Show Students</span>
                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive" style="padding: 10px">
                                <table id="myTable" class="table table-hover table-striped table-bordered" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Image</th>
                                            <th>Student Name</th>
                                            <th>Course Name</th>
                                            <th>Assigned At</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $student)
                                            @foreach ($student->courses as $course)
                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                    {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                                    <td><img class="img-60 img-fluid img-circle" src="{{ asset('project/uploads/users/' . $student->image) }}" alt="User-Profile-Image"></td>
                                                    <td style="text-transform: capitalize">{{ $student->name }}</td>

                                                    <td style="text-transform: capitalize">{{ $course->name }}</td>

                                                    <td>{{ $student->created_at->isoFormat('LLLL') }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                        <a style="margin-left: 10px" href="#" class="btn btn-danger" onclick="confirmDestroy({{$student->student->id}}, this)">
                                                            <i class="ti-trash"></i>
                                                        </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                            @endforeach
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
      axios.delete('/cms/admin/students/'+id)
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
