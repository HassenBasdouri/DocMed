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
                            @if (!empty($rencontre))
                                <form class="flex flex-col w-full" method="POST"
                                    action="{{ route('rencontres.update', $rencontre) }}">
                                    @method('put')

                                @else
                                    <form class="flex flex-col w-full" method="POST" action="{{ route('rencontres.store') }}">
                            @endif
                            @csrf
                                    <input name="patient_id" id="patient_id" type="hidden" value="{{Request::get('id'), $rencontre->patient->id ?? ''}}">
                            <div class="flex w-full">
                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="type_contact"
                                        class="col-md-4 col-form-label text-md-right">{{ __('login.typeContact') }}</label>
                                    <div class="col-md-6">
                                        <select id="type_contact" type="text" required name="type_contact"
                                            class=" form-control @error('type_contact') border-red-500 @enderror">
                                            <option value="{{ old('type_contact', $rencontre->type_contact ?? '') }}" selected>{{ old('type_contact', $rencontre->type_contact ?? '') }}</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        @error('type_contact')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="donnees_significatives"
                                        class="col-md-4 col-form-label text-md-right">{{ __('login.donneesSingiRe') }}</label>
                                    <div class="col-md-6">
                                        <textarea rows="3" id="donnees_significatives" type="text" required name="donnees_significatives" class="form-control
                                @error('donnees_significatives') border-red-500 @enderror">
                               {{old('donnees_significatives')}} {{ $rencontre->donnees_significatives ?? '' }}
                            </textarea>

                                        @error('donnees_significatives')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="conclusion"
                                        class="col-md-4 col-form-label text-md-right">{{ __('login.conclusionRe') }}</label>
                                    <div class="col-md-6">
                                        <textarea rows="3" id="conclusion" type="text" required name="conclusion"
                                            class="form-control
                                @error('conclusion') border-red-500 @enderror">
                                {{ old('conclusion')}} {{ $rencontre->conclusion ?? '' }}
                            </textarea>

                                        @error('conclusion')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="decisions"
                                        class="col-md-4 col-form-label text-md-right">{{ __('login.decisions') }}</label>
                                    <div class="col-md-6">
                                        <textarea rows="2" id="decisions" type="text" required name="decisions"
                                             class="form-control
                                @error('decisions') border-red-500 @enderror">
                                {{ old('decisions')}}{{$rencontre->decisions ?? ''}}
                            </textarea>

                                        @error('decisions')
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
