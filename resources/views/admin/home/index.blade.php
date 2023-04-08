@extends('admin.parent')

@section('title', 'Dashboard')

@section('styles')

@endsection

@section('content')

    <div class="main-body">
        <div class="page-wrapper">

            <!-- Page-header start -->
        @section('icon')

            <i class="ti-dashboard bg-c-blue"></i>

        @endsection

        @section('sub-title')

            Dashboard

        @endsection

        @section('sub-text')

            see latest activities

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <!-- card1 start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont iconfont icofont-user-alt-4 bg-c-blue card1-icon"></i>
                            <a href="{{ route('admins.index') }}"><span class="text-c-blue f-w-600">Admins</span></a>
                            <h4>{{ $admins }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <a href="{{ route('admins.index') }}" class="text-muted">
                                        <i class="text-c-blue f-16 icofont icofont-eye m-r-10"></i>
                                        Index Admins
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
                <!-- card1 start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont iconfont icofont-business-man bg-c-pink card1-icon"></i>
                            <a href="{{ route('instructors.index') }}"><span
                                    class="text-c-pink f-w-600">Instructors</span></a>
                            <h4>{{ $instructors }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <a href="{{ route('instructors.index') }}" class="text-muted">
                                        <i class="text-c-pink f-16 icofont icofont-eye m-r-10"></i>
                                        Index Instructors
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
                <!-- card1 start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont icofont-users-alt-5 bg-c-green card1-icon"></i>
                            <a href="{{ route('students.index') }}"><span
                                    class="text-c-green f-w-600">Students</span></a>
                            <h4>
                                {{ $students }}
                            </h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <a href="{{ route('students.index') }}" class="text-muted">
                                        <i class="text-c-green f-16 icofont icofont-eye m-r-10"></i>
                                        Index Students
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
                <!-- card1 start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="ti-user bg-c-yellow card1-icon"></i>
                            <span class="text-c-yellow f-w-600">Users</span>
                            <h4>{{ count($users) }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <a href="{{ route('users.index') }}" class="text-muted">
                                        <i class="text-c-yellow f-16 icofont icofont-eye m-r-10"></i>
                                        Index Users
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
                <!-- card1 start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont icofont-book-alt bg-c-yellow card1-icon"></i>
                            <span class="text-c-yellow f-w-600">Courses</span>
                            <h4>{{ count($courses) }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <a href="{{ route('courses.index') }}" class="text-muted">
                                        <i class="text-c-yellow f-16 icofont icofont-eye m-r-10"></i>
                                        Index Courses
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
                <!-- card1 start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont icofont-video-alt bg-c-green card1-icon"></i>
                            <span class="text-c-reen f-w-600">Lectures</span>
                            <h4>{{ $lectures }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <a href="{{ route('lectures.index') }}" class="text-muted">
                                        <i class="text-c-green f-16 icofont icofont-eye m-r-10"></i>
                                        Index Lectures
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
                <!-- card1 start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont icofont-file-pdf bg-c-pink card1-icon"></i>
                            <span class="text-c-pink f-w-600">Files</span>
                            <h4>{{ $files }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <a href="{{ route('files.index') }}" class="text-muted">
                                        <i class="text-c-pink f-16 icofont icofont-eye m-r-10"></i>
                                        Index Files
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
                <!-- card1 start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont icofont-comment bg-c-blue card1-icon"></i>
                            <span class="text-c-blue f-w-600">Comments</span>
                            <h4>{{ $comments }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <a href="{{ route('comments.index') }}" class="text-muted">
                                        <i class="text-c-blue f-16 icofont icofont-eye m-r-10"></i>
                                        Index Comments
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card1 end -->
                <!-- Statestics Start -->
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="sub-title" style="font-size: 18px;font-weight: 700">Latest Students</h5>
                            <span style="text-transform: capitalize">Here you'll Show Students latest registered</span>
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
                                            <th>Student Image</th>
                                            <th>Student Name</th>
                                            <th>Course Name</th>
                                            <th>Assigned At</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $student)
                                            @foreach ($student->courses as $course)
                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                    <td><img class="img-60 img-fluid img-circle"
                                                            src="{{ asset('project/uploads/users/' . $student->image) }}"
                                                            alt="User-Profile-Image"></td>
                                                    <td style="text-transform: capitalize">{{ $student->name }}</td>

                                                    <td style="text-transform: capitalize">{{ $course->name }}</td>

                                                    <td>{{ $student->created_at->isoFormat('LLLL') }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a style="margin-left: 10px" href="#"
                                                                class="btn btn-danger"
                                                                onclick="confirmDestroy({{ $student->student->id }}, this)">
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

                @foreach ($socials as $social)

                <div class="col-md-4 col-xl-4">
                    <a href="{{ $social->link }}">

                        @if ($social->type == 'facebook')
                            <div class="card fb-card">
                                <div class="card-header">
                                    <i class="icofont icofont-social-facebook"></i>
                                    <div class="d-inline-block">
                                        <h5>Facebook</h5>
                                        <span>blog page timeline</span>
                                    </div>
                                </div>
                            </div>

                            @elseif ($social->type == 'youtube')

                            <div class="card dribble-card">
                                <div class="card-header">
                                    <i class="icofont icofont-youtube-play"></i>
                                    <div class="d-inline-block">
                                        <h5>Youtube</h5>
                                        <span>blog page timeline</span>
                                    </div>
                                </div>
                            </div>

                            @elseif ($social->type == 'instagram')

                            <div class="card twitter-card">
                                <div class="card-header">
                                    <i class="icofont iconfont icofont-instagram"></i>
                                    <div class="d-inline-block">
                                        <h5>Instagram</h5>
                                        <span>blog page timeline</span>
                                    </div>
                                </div>
                            </div>

                            @elseif ($social->type == 'whatsapp')

                            <div class="card twitter-card">
                                <div class="card-header">
                                    <i class="icofont icofont-brand-whatsapp"></i>
                                    <div class="d-inline-block">
                                        <h5>WhatsApp</h5>
                                        <span>blog page timeline</span>
                                    </div>
                                </div>
                            </div>


                        @endif
                    </a>
                </div>

                @endforeach

                {{-- <div class="col-md-4 col-xl-4">
                    <a href="">
                        <div class="card dribble-card">
                            <div class="card-header">
                                <i class="icofont icofont-social-dribbble"></i>
                                <div class="d-inline-block">
                                    <h5>dribble</h5>
                                    <span>Product page analysis</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-xl-4">
                    <a href="">
                        <div class="card twitter-card">
                            <div class="card-header">
                                <i class="icofont icofont-social-twitter"></i>
                                <div class="d-inline-block">
                                    <h5>twitter</h5>
                                    <span>current new timeline</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> --}}

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
            axios.delete('/cms/admin/students/' + id)
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
