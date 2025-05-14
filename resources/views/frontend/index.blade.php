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
            <h2 class="text-center mb-4">Dự Án Đã Thực Hiện</h2>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/du_an2.jpg" alt="Dự Án 1" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Biệt Thự Phong Cách Cổ Điển</h5>
                            <p class="card-text">Thi công phào chỉ hoa văn tinh xảo cho biệt thự mang đậm phong cách cổ điển.</p>
                            <!--                        <a href="#" class="btn btn-outline-secondary btn-sm">Xem Chi Tiết</a>-->
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/du_an1.jpg" alt="Dự Án 2" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Biệt Thự Tân Cổ Điển</h5>
                            <p class="card-text">Ứng dụng phào chỉ hiện đại kết hợp với nét cổ điển, tạo nên vẻ đẹp sang trọng.</p>
                            <!--                        <a href="#" class="btn btn-outline-secondary btn-sm">Xem Chi Tiết</a>-->
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/du_an3.jpeg" alt="Dự Án 3" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Nội Thất Biệt Thự Cao Cấp</h5>
                            <p class="card-text">Thi công phào chỉ nội thất, tạo điểm nhấn cho phòng khách, phòng ngủ.</p>
                            <!--                        <a href="#" class="btn btn-outline-secondary btn-sm">Xem Chi Tiết</a>-->
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/du_an4.jpg" alt="Dự Án 4" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Chi Tiết Phào Chỉ Ngoại Thất</h5>
                            <p class="card-text">Thi công phào chỉ ngoại thất, tăng tính thẩm mỹ và độ bền cho công trình.</p>
                            <!--                        <a href="#" class="btn btn-outline-secondary btn-sm">Xem Chi Tiết</a>-->
                        </div>
                    </div>
                </div>
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
