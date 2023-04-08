@extends('admin.parent')

@section('title', 'Instructor Courses')

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->

        @section('icon')

            <i class="icofont iconfont icofont-business-man bg-c-blue"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('instructors.index') }}">Instructors</a>
            </li>

        @endsection

        @section('sub-title')

            {{ $instructor->name }} Instructor

        @endsection

        @section('sub-text')

            see all {{ $instructor->name }} Instructor courses

        @endsection
        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="sub-title" style="font-size: 18px;font-weight: 700">Instructor Courses Table</h5>
                            <span style="text-transform: capitalize">Here you'll show instructor courses</span>
                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Instructor Image</th>
                                            <th>Instructor Name</th>
                                            <th>Course Image</th>
                                            <th>Course Name</th>
                                            <th>Added At</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($instructor->courses as $key => $course)

                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td><img class="img-60 img-radius mCS_img_loaded" src="{{ asset('project/uploads/instructors/' . $instructor->photo) }}" alt="User-Profile-Image"></td>
                                                <td>{{ $instructor->name }}</td>
                                                <td><img class="img-60 img-radius mCS_img_loaded" src="{{ asset('project/uploads/courses/' . $course->image) }}" alt="User-Profile-Image"></td>
                                                <td>{{ $course->name }}</td>
                                                <td>{{ $course->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                    <a href="{{route('instructors.edit',$instructor->id)}}" type="button" class="btn btn-info">
                                                        <i class="ti-pencil-alt"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger" onclick="confirmDestroy({{$instructor->id}}, this)">
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
      axios.delete('/cms/admin/instructors/'+id)
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
