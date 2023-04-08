@extends('admin.parent')

@section('title', 'Index Instructors')

@section('content')

    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->

        @section('icon')

            <i class="icofont icofont-table bg-c-blue"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('instructors.create') }}">Create Instructor</a>
            </li>

        @endsection

        @section('sub-title')

            Index Instructors

        @endsection

        @section('sub-text')

            see all instructors

        @endsection
        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="sub-title" style="font-size: 18px;font-weight: 700">Instructors Table</h5>
                            <span style="text-transform: capitalize">Here you'll show instructors informations</span>
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
                            <div class="table-responsive" style="padding: 10px">
                                <table id="myTable" class="table table-hover table-striped table-bordered"
                                    style="width:100%">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Gender</th>
                                            <th>Country</th>
                                            <th>Address</th>
                                            <th>Specialty</th>
                                            <th>Courses</th>
                                            <th>Added At</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($instructors as $key => $instructor)
                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td><img class="img-60 img-fluid img-circle"
                                                        src="{{ asset('project/uploads/instructors/' . $instructor->photo) }}"
                                                        alt="User-Profile-Image"></td>
                                                <td>{{ $instructor->name }}</td>
                                                <td>{{ $instructor->email }}</td>
                                                <td>{{ $instructor->phone_number }}</td>
                                                <td>
                                                    @if ($instructor->gender == 'male')
                                                        male
                                                    @else
                                                        female
                                                    @endif
                                                </td>
                                                <td>{{ $instructor->country }}</td>
                                                <td>{{ $instructor->address }}</td>
                                                <td>
                                                    @if ($instructor->specialty)
                                                        {{ $instructor->specialty }}
                                                    @else
                                                        Null
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('instructors.show', $instructor->id) }}"
                                                        type="button" class="btn btn-success"><i
                                                            class="ti-eye"></i>Show Courses</a>
                                                </td>
                                                <td>{{ $instructor->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('instructors.edit', $instructor->id) }}"
                                                            type="button" class="btn btn-info">
                                                            <i class="ti-pencil-alt"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger"
                                                            onclick="confirmDestroy({{ $instructor->id }}, this)">
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
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<script>
    function confirmDestroy(id, reference) {
        console.log("ID: " + id);
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

    function destroy(id, reference) {
        axios.delete('/cms/admin/instructors/' + id)
            .then(function(response) {
                // handle success
                console.log(response);
                reference.closest('tr').remove();
                showMessage(response.data);
            })
            .catch(function(error) {
                // handle error
                console.log(error);
                showMessage(error.response.data);
            })
            .then(function() {
                // always executed
            });
    }

    function showMessage(data) {
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
