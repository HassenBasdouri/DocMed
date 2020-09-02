@extends('layouts.app')

@section('title','Patients')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('login.patientlist') }}</div>
                <div class="card-body">
                    <div class="input-group mb-3">
                    <input type="text" id="search" class="form-control" placeholder="{{__('login.search')}}" aria-label="search" aria-describedby="basic-addon1">
                    </div>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
      <th scope="col">{{__('login.name')}}</th>
        <th scope="col">{{__('login.lastname')}}</th>
        <th scope="col">{{__('login.CNAM')}}</th>
        <th scope="col">{{__('CIN')}}</th>
      <th scope="col">{{__('login.listeRe')}}</th>
      </tr>
    </thead>
    <tbody id="tbody_patients">
        @foreach($data as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
        <td>{{$item->lastname}}</td>
        <td>{{$item->CNAM}}</td>
        <td>{{$item->cin}}</td>
      <td><a href="{{ route('rencontres',$item->id) }}">consulter</a></td>
      </tr>
      @endforeach
    </tbody>
</table>
{{$data->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var route = "{{ route('patient_search') }}";
    var routeRe ="{{ url('rencontres') }}";
    var token = "{{ csrf_token()}}";
</script>
@endsection
