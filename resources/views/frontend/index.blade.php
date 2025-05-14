@extends('frontend.layouts.master')
@section('title', __('translation.menu.home'))
@section('slider')
    @include('frontend.component.slider')
@endsection
@section('about')
    <div class="mt-5">
        @include('frontend.component.about')
    </div>
@endsection
@section('content')
    <section id="products" class="py-5">
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
    <section id="projects" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4 text-uppercase">{{ __('translation.category.portfolio') }}</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($categories as $category)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <p class="card-text clamp-2">{{ $category->description ?? '' }}</p>
                                <a href="{{ route('web.category', $category->id) }}" class="btn btn-outline-primary btn-sm">{{ __('translation.menu.view') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('frontend.component.contact')
                </div>
            </div>
        </div>
    </section>
@endsection
