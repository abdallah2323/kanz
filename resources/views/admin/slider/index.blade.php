@extends('admin.parent')

@section('title', 'Index Course Page Items')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->
        @section('icon')

            <i class="icofont icofont-table bg-c-blue"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('course-page.create') }}">Add new item</a></li>

        @endsection

        @section('sub-title')

            Index Course Page Items

        @endsection

        @section('sub-text')

            see all course page items

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="sub-title" style="font-size: 18px;font-weight: 700">Course Page Items</h5>
                            <span style="text-transform: capitalize">Here you'll show course page items informations</span>
                            <span class="badge bg-danger" style="font-size: 13px; text-transform:capitalize; color:#fff">Note: all sliders was added that uploaded to the website</span>
                            <span class="badge bg-danger" style="font-size: 13px; text-transform:capitalize; color:#fff">Note: just The last addresses typed appear on the website page</span>

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
                                            <th>Slider</th>
                                            <th>Paid Course</th>
                                            <th>Free Course</th>
                                            <th>Psychological</th>
                                            <th>Added At</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $course)
                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td>
                                                    @if ($course->slider)
                                                        <img class="img-150" style="width: 300px; height: 150px "
                                                            src="{{ asset('project/uploads/sliders/' . $course->slider) }}"
                                                            alt="User-Profile-Image">
                                                    @else
                                                        Null
                                                    @endif
                                                </td>
                                                <td>{{ $course->paid }}</td>
                                                <td>{{ $course->free }}</td>
                                                <td>{{ $course->psychological }}</td>
                                                <td>{{ $course->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('course-page.edit', $course->id) }}" type="button"
                                                            class="btn btn-info">
                                                            <i class="ti-pencil-alt"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger"
                                                            onclick="confirmDestroy({{ $course->id }}, this)">
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
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

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
        axios.delete('/cms/admin/course-page/' + id)
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
