@extends('layouts.app')

@section('title', 'Profile')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('/storage/images/profils/' . Auth::user()->imagepath) }}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ Auth::user()->name }} {{ Auth::user()->lastname }}
                            </h3>

                            <p class="text-muted text-center">{{ __('Doctor') }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>{{ __('login.name') }}</b> : <a class="float-right">{{ Auth::user()->name }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ __('login.lastname') }}</b> : <a
                                        class="float-right">{{ Auth::user()->lastname }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ __('login.email') }}</b> : <a class="float-right">{{ Auth::user()->email }}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Activity</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#settings"
                                        data-toggle="tab">{{ __('Settings') }}</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    hello
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    hello hello
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <label>
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </label>
                                    <div class="col-md-6">

                                        <h6 class="m-y-2">{{ __('Upload a different photo') }}</h6>
                                        <form action="upload_image" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input
                                                            class="custom-file-input @error('image') is-invalid @enderror"
                                                            type="file" name="image" id="image" required>
                                                        <label class="custom-file-label"
                                                            for="image">{{ __('Browse to Choose an image') }}</label>
                                                        @csrf
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary "
                                                            type="submit">{{ __('Upload') }}</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <hr>
                                    <div class="col-md-6">
                                        <h6 class="m-y-2">{{ __('Edit') }} {{ __('login.name') }}</h6>
                                        <form action="change_name" method="POST">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="">
                                                        <label class="" for="name">{{ __('login.name') }}</label>
                                                        <input value="{{ Auth::user()->name }}"
                                                            class=" @error('name') is-invalid @enderror" type="text"
                                                            name="name" id="name" required>
                                                        @csrf
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary "
                                                            type="submit">{{ __('Edit') }}</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <hr>
                                    <div class="col-md-6">
                                        <h6 class="m-y-2">{{ __('Edit') }} {{ __('login.lastname') }}</h6>
                                        <form action="change_lastname" method="POST">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="">
                                                        <label class="" for="lastname">{{ __('login.lastname') }}</label>
                                                        <input value="{{ Auth::user()->lastname }}"
                                                            class=" @error('lastname') is-invalid @enderror" type="text"
                                                            name="lastname" id="lastname" required>
                                                        @csrf
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary "
                                                            type="submit">{{ __('Edit') }}</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <hr>
                                    <div class="col-md-6">
                                        <h6 class="m-y-2">{{ __('Edit') }} {{ __('login.password') }}</h6>
                                        <form action="change_password" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="form-group row">
                                                        <label for="password"
                                                            class="col-md-4 col-form-label text-md-right">{{ __('login.password') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="password" type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" required autocomplete="new-password">

                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="password-confirm"
                                                            class="col-md-4 col-form-label text-md-right">{{ __('login.confirm') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="password-confirm" type="password"
                                                                class="form-control" name="password_confirmation" required
                                                                autocomplete="new-password">
                                                        </div>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary "
                                                            type="submit">{{ __('Edit') }}</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
