@extends('layouts.app')
@section('title', __('Dashboard'))
@section('script')
@parent
<script>
    $(function () {
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });
  
      $('.filter-container').filterizr({gutterPixels: 3});
      $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })
  </script>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
          <a href="{{route('patients.show',$patient->id)}}">
          <h4 class="card-title">{{$patient->name }} {{$patient->lastname}}</h4>
            </a>
          </div>
          <div class="card-body">
            <div class="row">
                @foreach($images as $image)
              <div class="col-sm-2">
              <a href="{{ asset('/storage/images/img/'.$image->path) }}" data-toggle="lightbox" data-title="{{$image->description}}" data-gallery="gallery">
                  <img src="{{ asset('/storage/images/img/'.$image->path) }}" class="img-fluid mb-2" alt="{{$image->description}}"/>
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection