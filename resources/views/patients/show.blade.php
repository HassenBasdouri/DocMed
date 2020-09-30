@extends('layouts.app')

@section('title', $patient->name)
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <!-- Profile Image -->
                    <div class="card card-success card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('/images/img/default_avatar.png') }}" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ $patient->name }} {{ $patient->lastname }}</h3>

                            <p class="text-muted text-center">{{ $patient->profession }}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>{{ __('login.name') }}</b> : <a class="float-right">{{ $patient->name }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ __('login.lastname') }}</b> : <a class="float-right">{{ $patient->lastname }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ __('login.birth') }}</b> : <a class="float-right">{{ $patient->birth }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ __('CIN') }}</b> : <a class="float-right">{{ $patient->cin }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ __('login.cnam') }}</b> : <a class="float-right">{{ $patient->cnam }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ __('login.phone') }}</b> : <a class="float-right">{{ $patient->phone }}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">{{__('Operations ')}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a class="btn btn-primary" href="{{ url('/patients/' . $patient->id . '/edit') }}">{{ __('Edit') }} </a>
                            <a class="btn btn-primary" href="{{ route('patients.rencontres', ['id' => $patient->id]) }}">{{ __('login.listeRe') }}</a>
                            <a class="btn btn-primary" href="{{ route('rencontres.create', ['id' => $patient->id]) }}">{{ __('login.nouvelleRE') }}</a>
                            <a class="btn btn-primary" href="{{ route('show_documents', ['id' => $patient->id]) }}">{{ __('Documents') }}</a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
