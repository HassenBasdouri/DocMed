@extends('layouts.app')

@section('title',__('login.rencontre'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('login.rencontre') }}(s) :  <a href="{{route('patients.show',$patient[0]->id)}}">{{$patient[0]->name}} {{ $patient[0]->lastname}}</a></div>
                <div class="card-body">
                <a  type="button" class="btn btn-primary" href="{{ route('rencontres.create',['id'=>$patient[0]->id]) }}">{{__('login.nouvelleRE')}}</a>
<table class="table">
    <thead class="thead-dark">
      <tr>
      <th scope="col">{{__('login.dateRe')}}</th>
      <th scope="col">{{__('login.typeContact')}}</th>
        <th scope="col">{{__('login.donneesSingiRe')}}</th>
        <th scope="col">{{__('login.conclusionRe')}}</th>
        <th scope="col">{{__('login.decisions')}}</th>
        <th scope="col"></th>
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
        <td>
        <form action="{{ route('rencontres.destroy', $item->id)}}" method="post" onsubmit="return confirm('{{ __('Are you sure you want to delete this item?') }}');">
                @csrf
                @method('DELETE')
            <input type="hidden" id="id" name="id" value="{{$patient[0]->id}}">
                <button class="btn btn-danger" type="submit">{{__('Delete')}}</button>
            </form><br>
            <a class="btn btn-primary" href="{{ url('/rencontres/'.$item->id.'/edit') }}">{{__('Edit')}}</a>
        </td>
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
