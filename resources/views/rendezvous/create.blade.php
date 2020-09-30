@extends('layouts.app')

@section('title', 'Meet')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New meeting') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (!empty($rendezvous))
                            <form class="flex flex-col w-full" method="POST"
                                action="{{ route('rendezvous.update', $rendezvous) }}">
                                @method('put')
                            @else
                                <form class="flex flex-col w-full" method="POST" action="{{ route('rendezvous.store') }}">
                        @endif
                        @csrf
                        <div class="flex w-full">
                            {{-- form input element --}}
                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>
                                <div class="col-md-6">
                                    <input rows="2" id="date" type="date" required name="date"
                                        value="{{ old('date', $rendezvous->date ?? '') }}" class="form-control
                                        @error('date') border-red-500 @enderror">

                                    @error('date')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- form input element --}}
                            <div class="form-group row">
                                <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>
                                <div class="col-md-6">
                                    <input rows="2" id="time" type="time" required name="time"
                                        value="{{ old('time', $rendezvous->time ?? '') }}" class="form-control
                                        @error('time') border-red-500 @enderror">

                                    @error('time')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- form input element --}}
                            <div class="form-group row">
                                <label for="patient_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('login.patient') }}</label>
                                <div class="col-md-6">
                                    <select name="patient_id" id="select_client" class="
                                                @error('patient_id') border-red-500 @enderror"
                                        value="{{ old('patient_id', $rendezvous->patient_id ?? '') }}"
                                        data-live-search="true" title="Select Patient" required>
                                        @foreach ($patients as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} {{ $item->lastname }}</option>
                                        @endforeach
                                    </select>



                                    @error('patient_id')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Save </button>
                        <form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
