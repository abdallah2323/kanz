@extends('admin.parent')

@section('title', 'Course Details')

@section('styles')

@endsection

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        @section('icon')

            <i class="icofont icofont-table bg-info"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></li>

        @endsection

        @section('sub-title')

            {{ $course->name }} Details

        @endsection

        @section('sub-text')

            see all details in {{ $course->name }}

        @endsection

        <!-- Page-header end -->

        <div class="page-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="sub-title" style="font-size: 18px;font-weight: 700">Course Objectives Table</h5>
                            <span style="text-transform: capitalize">Here you'll show {{ $course->name }} objectives</span>
                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Objective</th>
                                            <th>Added At</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($course->objectives as $key => $objective)

                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td>{{ $objective->course->name }}</td>
                                                <td>{{ $objective->title }}</td>

                                                <td>{{ $objective->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                      <a href="{{route('objectives.edit',$objective->id)}}" type="button" class="btn btn-info">
                                                        <i class="ti-pencil-alt"></i>
                                                      </a>
                                                      <a href="#" class="btn btn-danger" onclick="objectiveDestroy({{$objective->id}}, this)">
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

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="sub-title" style="font-size: 18px;font-weight: 700">Course Files Table</h5>
                            <span style="text-transform: capitalize">Here you'll show files informations</span>
                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>File</th>
                                            <th>Added At</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($course->files as $key => $file)

                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td>{{ $file->name }}</td>
                                                <td>{{ $file->type }}</td>
                                                <td>
                                                    <a @if ($file->type == 'word')
                                                        class="btn btn-primary" @else class="btn btn-danger" @endif
                                                        href="{{ route('downloadFile',$file->file) }}">
                                                        Download File
                                                    </a>
                                                </td>

                                                <td>{{ $file->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                      <a href="{{route('files.edit',$file->id)}}" type="button" class="btn btn-info">
                                                        <i class="ti-pencil-alt"></i>
                                                      </a>
                                                      <a href="#" class="btn btn-danger" onclick="fileDestroy({{$file->id}}, this)">
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
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="sub-title" style="font-size: 18px;font-weight: 700">Course Lectures Table</h5>
                            <span style="text-transform: capitalize">Here you'll show Lectures informations</span>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="icofont icofont-simple-left "></i></li>
                                    <li><i class="icofont icofont-maximize full-card"></i></li>
                                    <li><i class="icofont icofont-minus minimize-card"></i></li>
                                    <li><i class="icofont icofont-refresh reload-card"></i></li>
                                    <li><i class="icofont icofont-error close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
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
                                        @foreach ($course->lectures as $key => $lecture)
                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td>
                                                    <video width="320" height="240" controls autoplay muted>
                                                        <source
                                                            src="{{ asset('project/uploads/lectures') }}/{{ $lecture['video'] }}"
                                                            type="video/mp4">
                                                    </video>
                                                </td>
                                                <td>{{ $lecture->title }}</td>
                                                <td>{{ $lecture->details }}</td>
                                                <td>{{ $lecture->course->name }}</td>
                                                <td>{{ $lecture->created_at->isoFormat('LLLL') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('lectures.edit', $lecture->id) }}"
                                                            type="button" class="btn btn-info">
                                                            <i class="ti-pencil-alt"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger"
                                                            onclick="confirmDestroy({{ $lecture->id }}, this)">
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
    function objectiveDestroy(id,reference){
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
          destroyObjective(id, reference);
        }
      })
    }

    function destroyObjective(id, reference){
      axios.delete('/cms/admin/objectives/'+id)
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

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function fileDestroy(id,reference){
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
                destroyFile(id, reference);
                }
            })
    }

    function destroyFile(id, reference){
        axios.delete('/cms/admin/files/'+id)
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
