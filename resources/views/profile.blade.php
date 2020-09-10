@extends('layouts.app')

@section('title', 'Profile')
@section('content')
    <div class="container">
        <div class="row m-y-2">
            <div class="col-lg-4 pull-lg-8 text-xs-center">
                <img src="{{ asset('/storage/images/profils/' . Auth::user()->imagepath) }}"
                    class="m-x-auto img-fluid img-circle" alt="avatar">
            </div>
            <div class="col-lg-8 push-lg-4">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab"
                            class="nav-link active">{{ __('login.profil') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">{{ __('Edit') }}</a>
                    </li>
                </ul>
                <div class="tab-content p-b-3">

                    <div class="tab-pane active" id="profile">
                        <h4 class="m-y-2">{{ __('User Profile') }}</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>
                                    {{ __('Hello!') }} Dr {{ Auth::user()->name }}
                                </h5>
                                <h6>{{ __('login.name') }} : {{ Auth::user()->name }}</h6>
                                <h6>{{ __('login.lastname') }} : {{ Auth::user()->lastname }}</h6>
                                <h6>{{ __('login.email') }} : {{ Auth::user()->email }}</h6>
                            </div>
                            <div class="col-md-6">
                                <h6>{{ __('About') }}</h6>
                                <a href="#" class="tag tag-default tag-pill">RDs</a>
                                <hr>
                                <span class="tag tag-primary"><i class="fa fa-user"></i> 45
                                    {{ __('login.patients') }}</span><br>
                                <span class="tag tag-danger"><i class="fa fa-eye"></i> 214
                                    {{ __('login.rencontre') }}</span>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <div class="tab-pane" id="edit">
                        <h4 class="m-y-2">{{ __('Edit Profile') }}</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('editprofile') }}">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('login.name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ Auth::user()->name }}" autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lastname"
                                            class="col-md-4 col-form-label text-md-right">{{ __('login.lastname') }}</label>

                                        <div class="col-md-6">
                                            <input id="lastname" type="text"
                                                class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                                value="{{ Auth::user()->lastname }}" autocomplete="lastname" autofocus>

                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">{{ __('login.password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">

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
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('login.register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">

                                <h4 class="m-y-2">Upload a different photo</h4>
                                <form action="upload_image" method="POST" enctype="multipart/form-data">
                                    <label class="custom-file">
                                        <input class="@error('image') is-invalid @enderror" type="file" id="image"
                                            name="image" id="image">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        @csrf
                                        <button class="btn btn-primary " type="submit">Upload image</button>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <hr>
@endsection
