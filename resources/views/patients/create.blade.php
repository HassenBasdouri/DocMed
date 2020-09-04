@extends('layouts.app')

@section('title', 'Patients')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New patient') }}</div>

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
                            @if (!empty($patient))
                                <form class="flex flex-col w-full" method="POST"
                                    action="{{ route('patients.update', $patient) }}">
                                    @method('put')
                                @else
                                    <form class="flex flex-col w-full" method="POST" action="{{ route('patients.store') }}">
                            @endif
                            @csrf
                            <div class="flex w-full">
                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('login.name') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" required name="name"
                                            value="{{ old('name', $patient->name ?? '') }}"
                                            class=" form-control @error('name') border-red-500 @enderror">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="lastname"
                                        class="col-md-4 col-form-label text-md-right">{{ __('login.lastname') }}</label>
                                    <div class="col-md-6">
                                        <input id="lastname" type="text" required name="lastname"
                                            value="{{ old('lastname', $patient->lastname ?? '') }}" class="form-control
                                @error('lastname') border-red-500 @enderror">

                                        @error('lastname')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="birth"
                                        class="col-md-4 col-form-label text-md-right">{{ __('login.birth') }}</label>
                                    <div class="col-md-6">
                                        <input id="birth" type="date" required name="birth"
                                            value="{{ old('birth', $patient->birth ?? '') }}" class="form-control
                                @error('birth') border-red-500 @enderror">

                                        @error('birth')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="phone"
                                        class="col-md-4 col-form-label text-md-right">{{ __('login.phone') }}</label>
                                    <div class="col-md-6">
                                        <input id="phone" type="text" required name="phone"
                                            value="{{ old('phone', $patient->phone ?? '') }}" class="form-control
                                @error('phone') border-red-500 @enderror">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="cin"
                                        class="col-md-4 col-form-label text-md-right">{{ __('login.cin') }}</label>
                                    <div class="col-md-6">
                                        <input id="cin" type="text" required name="cin"
                                            value="{{ old('cin', $patient->cin ?? '') }}" class="form-control
                                @error('cin') border-red-500 @enderror">

                                        @error('cin')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="profession"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Profession') }}</label>
                                    <div class="col-md-6">
                                        <input id="profession" type="text" required name="profession"
                                            value="{{ old('profession', $patient->profession ?? '') }}" class="form-control
                                @error('profession') border-red-500 @enderror">

                                        @error('profession')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="cnam"
                                        class="col-md-4 col-form-label text-md-right">{{ __('login.cnam') }}</label>
                                    <div class="col-md-6">
                                        <input id="cnam" type="text" required name="cnam"
                                            value="{{ old('cnam', $patient->cnam ?? '') }}" class="form-control
                                @error('cnam') border-red-500 @enderror">

                                        @error('cnam')
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
