@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label class="form-label" for="name">{{ __('translation.menu.category') }}</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">selected...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if((int) old('category_id') === $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label class="form-label" for="name">{{ __('translation.product.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label class="form-label" for="price">{{ __('translation.product.price') }}</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                    @error('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label class="form-label" for="title">{{ __('translation.product.title') }}</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">

                <div class="form-group col-md-6 col-12">
                    <label class="form-label" for="description">{{ __('translation.product.description') }}</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6 col-12">
                    <label class="form-label" for="image">{{ __('translation.menu.image') }}</label>
                    <input multiple type="file" class="form-control" id="image" name="image[]" value="{{ old('image') }}">
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
