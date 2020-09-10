@extends('layouts.app')

@section('title', __('My appointments'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('My appointments') }}(s)</div>
                    <div class="card-body">
                        <a type="button" class="btn btn-primary"
                            href="{{ route('rendezvous.create') }}">{{ __('New appointment') }}</a>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">{{ __('Date') }}</th>
                                    <th scope="col">{{ __('Time') }}</th>
                                    <th scope="col">{{ __('login.patient') }}</th>
                                    <th scope="col">{{ __('login.phone') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="tbody_patients">
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->time }}</td>
                                        <td>{{ $item->patient->name }} {{ $item->patient->lastname }}</td>
                                        <td>{{ $item->patient->phone }}</td>
                                        <td>
                                            <form action="{{ route('rendezvous.destroy', $item->id) }}" method="post"
                                                onsubmit="return confirm('{{ __('Are you sure you want to delete this item?') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
