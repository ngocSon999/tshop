@extends('frontend.layouts.master')
@section('title', __('translation.menu.product'))
@section('content')
    <section id="product-detail" class="py-3">
        <div class="container">
            <h2 class="text-center mb-4 text-uppercase fw-bold">{{ $product->name }}</h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded shadow-sm">
                </div>
                <div class="col-md-6">
                    <h3>{{ $product->title }}</h3>
                    <p>{{ $product->description }}</p>
                    <p><strong>Giá: </strong>{{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
                    <a href="#" class="btn btn-primary">Mua Ngay</a>
                </div>
            </div>
        </div>
    </section>

@endsection
