@extends('admin.parent')

@section('title', 'User Message')

@section('styles')

@endsection

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        @section('icon')

        <i class="ti ti-eye btn-info"></i>


        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}"> Messages </a></li>

        @endsection

        @section('sub-title')

            Show User Message

        @endsection

        @section('sub-text')

            show the user message

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 style="text-transform: capitalize; font-size: 20px">{{ $contact->user->name }} Message</h5>
                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                        </div>
                        <div class="card-block tab-icon">
                            <!-- Row start -->
                            <div class="row">
                                <div class="col-lg-12 col-xl-12">
                                    <!-- <h6 class="sub-title">Tab With Icon</h6> -->
                                    <div class="sub-title">welcome admin you can show message information here</div>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs " role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home7" role="tab" aria-expanded="true"><i class="icofont icofont-ui-user"></i>User</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile7" role="tab" aria-expanded="false"><i class="ti-location-arrow"></i>Location</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#learning7" role="tab" aria-expanded="false"><i class="icofont icofont-ui-message"></i>Learning</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#messages7" role="tab" aria-expanded="false"><i class="icofont icofont-ui-message"></i>Message</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content card-block">
                                        <div class="tab-pane active" id="home7" role="tabpanel" aria-expanded="true">
                                            <dl class="dl-horizontal row">
                                                <dt class="col-sm-3">User Image</dt>
                                                <dd class="col-sm-9"><img src="{{ asset('project/uploads/users/' . $contact->user->image) }}" style="height: 100px" class="img-fluid img-circle" alt=""></dd>
                                                <dt class="col-sm-3">User Name</dt>
                                                <dd class="col-sm-9">{{ $contact->user->name }}</dd>
                                                <dt class="col-sm-3">User Email</dt>
                                                <dd class="col-sm-9">{{ $contact->user->email }}</dd>
                                                <dt class="col-sm-3">User Phone Code</dt>
                                                <dd class="col-sm-9">{{ $contact->user->code }}</dd>
                                                <dt class="col-sm-3">User Phone Number</dt>
                                                <dd class="col-sm-9">{{ $contact->user->phone_number }}</dd>
                                                <dt class="col-sm-3">Gender</dt>
                                                <dd class="col-sm-9">{{ $contact->user->gender }}</dd>
                                                <dt class="col-sm-3">Date of Birth</dt>
                                                <dd class="col-sm-9">{{ $contact->user->date_of_birth }}</dd>
                                            </dl>
                                        </div>
                                        <div class="tab-pane" id="profile7" role="tabpanel" aria-expanded="false">
                                            <dl class="dl-horizontal row">
                                                <dt class="col-sm-3">City</dt>
                                                <dd class="col-sm-9">{{ $contact->user->country }}</dd>
                                                <dt class="col-sm-3">Address</dt>
                                                <dd class="col-sm-9">{{ $contact->user->address }}</dd>
                                            </dl>
                                        </div>
                                        <div class="tab-pane" id="learning7" role="tabpanel" aria-expanded="false">
                                            <dl class="dl-horizontal row">
                                                <dt class="col-sm-3">Education Level</dt>
                                                <dd class="col-sm-9">{{ $contact->user->education->education }}</dd>
                                                <dt class="col-sm-3">Level in English</dt>
                                                <dd class="col-sm-9">{{ $contact->user->level->level }}</dd>
                                            </dl>
                                        </div>
                                        <div class="tab-pane" id="messages7" role="tabpanel" aria-expanded="false">
                                            <dl class="dl-horizontal row">
                                                <dt class="col-sm-3">Message</dt>
                                                <dd class="col-sm-9">{{ $contact->message }}</dd>
                                                <dt class="col-sm-3">Sended at</dt>
                                                <dd class="col-sm-9">{{ $contact->created_at->isoFormat('LLLL') }}</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection
