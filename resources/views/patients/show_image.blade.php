@extends('layouts.app')
@section('title', __('Images').'-'.$patient->name )
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
          <h4 class="card-title">{{$patient->name }} {{$patient->lastname}} - Images</h4>
            </a>
          </div>
          <div class="card-body">
            <div>
            <div class="btn-group w-100 mb-2">
              <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> {{__('All images')}} </a>
              <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> {{__('Category')}} 1 </a>
              <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> {{__('Category')}} 2  </a>
              <a class="btn btn-info" href="javascript:void(0)" data-filter="3"> {{__('Category')}} 3  </a>
              <a class="btn btn-info" href="javascript:void(0)" data-filter="4"> {{__('Category')}} 4 </a>
            </div>
            <div class="mb-2">
              <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> {{__('Shuffle images')}} </a>
              <div class="float-right">
                <select class="custom-select" style="width: auto;" data-sortOrder>
                  <option value="index"> {{__('Sort by Position')}}</option>
                  <option value="sortData"> {{__('Sort by date')}} </option>
                </select>
                <div class="btn-group">
                  <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> {{__('Ascending')}} </a>
                  <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> {{__('Descending')}} </a>
                </div>
              </div>
            </div>
            </div>
            <div class="filter-container p-0 row">
                @foreach($images as $image)
                <div class="filtr-item col-sm-2" data-category="{{$image->type}}" data-sort="{{$image->created_at}}">
                  <a href="{{ asset('/storage/images/img/'.$image->path) }}" data-toggle="lightbox" data-title="{{$image->description}}">
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