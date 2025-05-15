@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <form action="{{ route('admin.about.update', ['id' => $about->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label class="form-label" for="message">{{ __('translation.about.message') }}</label>
                    <textarea class="form-control" name="message" id="message" rows="6">{{ old('message', $about->message) }}</textarea>
                    @error('message')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label class="form-label" for="image">{{ __('translation.menu.image') }}</label>
                    <input multiple type="file" class="form-control" id="phone" name="image" value="{{ old('image') }}">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @if($about->image)
                        <div class="mt-2">
                            <img src="{{ asset($about->image) }}" alt="Product Image" class="img-thumbnail" style="width: 100px; height: 100px;">
                        </div>
                    @endif
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
