@extends('admin.parent')

@section('title', 'Index Users')

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->

        @section('icon')

            <i class="icofont icofont-table bg-c-blue"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('users.create') }}">Create User</a>
            </li>

        @endsection

        @section('sub-title')

            Index Users

        @endsection

        @section('sub-text')

            see all users

        @endsection
        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="sub-title" style="font-size: 18px;font-weight: 700">Users Table</h5>
                            <span style="text-transform: capitalize">Here you'll show users informations</span>
                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive" style="padding: 10px">
                                <table id="myTable" class="table table-hover table-striped table-bordered" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Code</th>
                                            <th>Phone Number</th>
                                            <th>Gender</th>
                                            <th>Level in English</th>
                                            <th>Education Level</th>
                                            <th>Country</th>
                                            <th>Address</th>
                                            <th>Added At</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)

                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td><img class="img-60 img-fluid img-circle" src="{{ asset('project/uploads/users/' . $user->image) }}" alt="User-Profile-Image"></td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->code }}</td>
                                                <td>{{ $user->phone_number }}</td>
                                                <td>
                                                    @if ($user->gender == 'male')
                                                        male
                                                        @else
                                                        female
                                                    @endif
                                                </td>
                                                <td>{{ $user->education->education }}</td>
                                                <td>{{ $user->level->level }}</td>
                                                <td>{{ $user->country }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                      <a href="{{route('users.edit',$user->id)}}" type="button" class="btn btn-info">
                                                        <i class="ti-pencil-alt"></i>
                                                      </a>
                                                      <a href="#" class="btn btn-danger" onclick="confirmDestroy({{$user->id}}, this)">
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
      axios.delete('/cms/admin/users/'+id)
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
