@extends('layouts.app')
@section('title', __('My appointments'))
@section('script')
@parent
<script src="{{ mix('js/calendar/calendar_script.js') }}" defer></script>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col -->

        <div class="col-md-12">
            <a type="button" class="btn btn-primary"
                            href="{{ route('rendezvous.create') }}">{{ __('New appointment') }}</a><br>
          <div class="card card-primary">
            <div class="card-body p-0">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection
