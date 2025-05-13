@extends('frontend.layouts.master')
@section('title', __('translation.menu.contact'))
@section('content')
    <section id="contact-detail" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('web.post_contact') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Nội dung <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                            @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('translation.menu.save') }}</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h2 class="text-center mb-4">Liên Hệ Với Chúng Tôi</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center">
                            <p class="lead">Để được tư vấn chi tiết về sản phẩm và dịch vụ thi công phào chỉ, hoa văn cho biệt thự của bạn, vui lòng liên hệ với chúng tôi qua số điện thoại, email hoặc để lại thông tin của bạn chúng tôi sẽ liên hệ hỗ trợ trong thời gian sớm nhất.</p>
                            <p class="m-0 d-flex justify-content-start text-align-left"><strong>Điện thoại:</strong> 0968 658 067</p>
                            <p class="m-0 d-flex justify-content-start text-align-left"><strong>Email:</strong> <a href="mailto:">email</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
