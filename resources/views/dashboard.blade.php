@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
    <!-- Main content -->
    <section class="content connectedSortable">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $number }}</h3>

                            <p>{{ __('login.patient') }}s</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"><a href="#"></i>
                        </div>
                        <a href="{{ route('patients.index') }}" class="small-box-footer">{{ __('More info') }}<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                        <h3>{{$numberRencontre}} <sup style="font-size: 20px">%</sup></h3>

                            <p>{{__('Meeting Rate')}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    <a href="{{route('rendezvous.index')}}" class="small-box-footer">{{ __('More info') }}<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
        </div>
        <div class="card bg-gradient-success">
            <div class="card-header border-0">

                <h3 class="card-title">
                    <i class="far fa-calendar-alt"></i>
                   {{__('Calendar')}}
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                    <!-- button with a dropdown -->
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar_dashboard" style="width: 90%"></div>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
@endsection
