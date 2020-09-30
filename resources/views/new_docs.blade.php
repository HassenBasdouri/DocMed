@extends('layouts.app')

@section('title', __('New document'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New document') }}</div>

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
                        <form class="flex flex-col w-full" method="POST" action="{{ route('store_doc') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="flex w-full">
                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="patient_id"
                                        class="col-md-4 col-form-label text-md-right">{{ __('login.patient') }}</label>
                                    <div class="col-md-6">
                                        <select name="patient_id" id="select_client" class="
                                                    @error('patient_id') border-red-500 @enderror"
                                            value="{{ old('patient_id') }}"
                                            data-live-search="true" title="Select Patient" required>
                                            @foreach ($patients as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }} {{ $item->lastname }}
                                                </option>
                                            @endforeach
                                        </select>



                                        @error('patient_id')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="type"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                                    <div class="col-md-6">
                                        <select id="type" type="text" required name="type"
                                            class=" form-control @error('type') border-red-500 @enderror">
                                            <option value="{{ old('type') }}" selected>{{ old('type') }}</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>

                                        @error('type')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="doc"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Document') }}</label>
                                    <div class="col-md-6">
                                        <input  id="doc" type="file" required name="doc"
                                            value="{{ old('doc') }}" class="form-control
                                            @error('doc') border-red-500 @enderror">

                                        @error('doc')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="description"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                    <div class="col-md-6">
                                        <textarea rows="3" id="description" type="text" required name="description"
                                           class="form-control
                @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>

                                        @error('description')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Save </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
