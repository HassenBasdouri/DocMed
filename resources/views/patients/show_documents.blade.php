@extends('layouts.app')
@section('title', __('Documents') . '-' . $patient->name)
@section('script')
    @parent
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
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
                        <a href="{{ route('patients.show', $patient->id) }}">
                            <h4 class="card-title">{{ $patient->name }} {{ $patient->lastname }} - Documents</h4>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>{{ _('Label') }}</th>
                                            <th>{{ _('Description') }}</th>
                                            <th>{{ _('Type') }}</th>
                                            <th>{{ _('Created at') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($documents as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            @if(substr($item->path,-3)=='pdf')
                                            <td><a target="_blank" href="{{ asset('/storage/doc/'.$item->path) }}">{{$item->libelle}}</a></td>
                                            @else
                                            <td>
                                                <a href="{{ asset('/storage/doc/'.$item->path) }}" data-toggle="lightbox" data-title="sample 10 - white" data-gallery="gallery">
                                                    {{$item->libelle}}
                                                </a>
                                              </td>
                                            @endif
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>{{$item->created_at}}</td>
                                        </tr>  
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>{{ _('Label') }}</th>
                                            <th>{{ _('Description') }}</th>
                                            <th>{{ _('Type') }}</th>
                                            <th>{{ _('Created at') }}</th>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        @endsection
