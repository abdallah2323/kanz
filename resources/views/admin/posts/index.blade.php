@extends('admin.parent')

@section('title', 'Index Courses Posts')

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

            <li class="breadcrumb-item"><a href="{{ route('posts.create') }}">Add New Post</a>
            </li>

        @endsection

        @section('sub-title')

            Index Courses Posts

        @endsection

        @section('sub-text')

            See all Courses Posts that you added

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="sub-title" style="font-size: 18px;font-weight: 700">Posts Table</h5>
                            <span style="text-transform: capitalize">Here you'll Show Posts</span>
                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive" style="padding: 10px">
                                <table id="myTable" class="table table-hover table-striped table-bordered" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Post</th>
                                            <th>Post Link</th>
                                            <th>Course Name</th>
                                            <th>Added At</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $key => $post)

                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td style="text-transform: capitalize">{{ $post->post }}</td>
                                                <td>
                                                    @if ($post->link)
                                                        <a class="btn btn-info" href="{{ $post->link }}">Link</a>
                                                    @else
                                                        <label style="font-size: 15px" class="label label-primary">post doesn't have any link</label>

                                                    @endif
                                                </td>
                                                <td style="text-transform: capitalize">{{ $post->course->name }}</td>
                                                <td>{{ $post->created_at->isoFormat('LLLL') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                      <a href="{{route('posts.edit',$post->id)}}" type="button" class="btn btn-info">
                                                        <i class="ti-pencil-alt"></i>
                                                      </a>
                                                      <a style="margin-left: 10px" href="#" class="btn btn-danger" onclick="confirmDestroy({{$post->id}}, this)">
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
      axios.delete('/cms/admin/posts/'+id)
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
