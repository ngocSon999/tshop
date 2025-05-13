@extends('frontend.layouts.master')
@section('title', __('translation.menu.category'))
@section('content')
    <section id="" class="py-4">
        <div class="container">
            <h2 class="text-center mb-4 text-uppercase fw-bold">{{ __('translation.menu.product') }} - {{ $category->name }}</h2>
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
