@extends('layouts.app')

@section('title',__('login.rencontre'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('login.rencontre') }}(s) : {{$user[0]->name}} {{ $user[0]->lastname}}</div>
                <div class="card-body">
                <a  type="button" class="btn btn-primary" href="{{ route('profile') }}">{{__('login.nouvelleRE')}}</a>
<table class="table">
    <thead class="thead-dark">
      <tr>
      <th scope="col">{{__('login.dateRe')}}</th>
      <th scope="col">{{__('login.typeContact')}}</th>
        <th scope="col">{{__('login.donneesSingiRe')}}</th>
        <th scope="col">{{__('login.conclusionRe')}}</th>
        <th scope="col">{{__('login.decisions')}}</th>
      </tr>
    </thead>
    <tbody id="tbody_patients">
        @foreach($data as $item)
      <tr>
        <td>{{$item->date}}</td>
        <td>{{$item->type_contact}}</td>
        <td>{{$item->donnees_significatives}}</td>
        <td>{{$item->conclusion}}</td>
        <td>{{$item->decisions}}</td>
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
@endsection
