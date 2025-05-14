@extends('frontend.layouts.master')
@section('title', __('translation.menu.category'))
@section('style')
    <style>
        .category-image {
            width: 100%;
            max-height: 380px;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')
    <section id="" class="py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="category-image" src="{{ asset($category->image) }}" alt="{{ asset($category->name) }}">
                </div>
                <div class="col-md-6">
                    <h2>{{ $category->name }}</h2>
                    <p>{{ $category->description }}</p>
                </div>
            </div>
        </div>
    </section>
    <section id="" class="py-2">
        <div class="container">
            <h2 class="text-center mb-4 text-uppercase fw-bold">{{ __('translation.menu.product') }}</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($products as $product)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->title }}</p>
                                <a href="{{ route('web.product_detail', $product->id) }}" class="btn btn-outline-primary btn-sm">{{ __('translation.menu.view') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
