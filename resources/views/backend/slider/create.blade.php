@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label class="form-label" for="name">{{ __('translation.slider.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label class="form-label" for="title">{{ __('translation.slider.title') }}</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label class="form-label" for="link">{{ __('translation.slider.link') }}</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}">
                    @error('link')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label class="form-label" for="image">{{ __('translation.menu.image') }}</label>
                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mt-2">
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-outline-primary">{{ __('translation.menu.save') }}</button>
                </div>
            </div>
        </form>
    </div>

@endsection
