@extends('layouts.app')

@section('title', __('New image'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New image') }}</div>

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
                        <form class="flex flex-col w-full" method="POST" action="{{ route('store_image') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="flex w-full">
                                {{-- form input element --}}
                                <div class="form-group row">
                                    <label for="patient_id"
                                        class="col-md-4 col-form-label text-md-right">{{ __('login.patient') }}</label>
                                    <div class="col-md-6">
                                        <select name="patient_id" id="patient_id" class="form-control
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
                                    <label for="image"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                    <div class="col-md-6">
                                        <input  id="image" type="file" required name="image"
                                            value="{{ old('image') }}" class="form-control
                                            @error('image') border-red-500 @enderror">

                                        @error('image')
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
