@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label class="form-label" for="message">{{ __('translation.product.description') }}</label>
                    <input type="text" class="form-control" id="message" name="message" value="{{ old('message') }}">
                    @error('message')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label class="form-label" for="image">{{ __('translation.menu.image') }}</label>
                    <input multiple type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
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
