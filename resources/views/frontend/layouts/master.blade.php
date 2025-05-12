<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOM-THANG - Phào Chỉ Hoa Văn Biệt Thự Cao Cấp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ assert('/access/frontend/css/style.css') }}">
    <link rel="shortcut icon" href="{{ assert('/access/frontend/images/logo_1.png') }}" type="image/x-icon">
    <style>
        /* CSS Slider */
        #home-slider {
            overflow: hidden;
            margin-top: 111px;
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item {
            min-width: 100%;
            position: relative;
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
            width: 80%;
        }

        .carousel-caption h2 {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .carousel-caption p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            background: none;
            border: none;
            color: #fff;
            font-size: 2rem;
            opacity: 0.5;
            transition: opacity 0.15s ease;
            top: 50%;
            transform: translateY(-50%);
            width: 5%;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            opacity: 0.9;
        }

        .carousel-indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 15;
            display: flex;
            justify-content: center;
            padding-left: 0;
            margin-right: 15%;
            margin-left: 15%;
            list-style: none;
        }

        .carousel-indicators button {
            width: 30px;
            height: 3px;
            margin: 0 5px;
            background-color: rgba(255, 255, 255, 0.5);
            background-clip: padding-box;
            border: 0;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            opacity: .5;
            transition: opacity .2s ease;
            cursor: pointer;
        }

        .carousel-indicators .active {
            opacity: 1;
        }
    </style>
</head>
<body>
<header id="header" class="bg-light py-1 fixed-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h1 class="mb-0 d-flex header-logo">
                    <img src="{{ asset('access/frontend/images/logo_1.png') }}" alt="Logo BOM-THANG" class="img-fluid" style="max-height: 100px;">
                    <strong style="color: #d4d09d; padding-left: 6px; font-family: 'Arial', sans-serif">BOM-THANG</strong>
                </h1>
            </div>
            <div class="col-md-8">
                <nav class="navbar navbar-expand-md navbar-light justify-content-end">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Trang Chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">Về Chúng Tôi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#products">Sản Phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#projects">Dự Án</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Liên Hệ</a>
                            </li>
                        </ul>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </div>
</header>

<section id="home-slider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#home-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#home-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#home-slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" style="background: url('images/slider2.jpg') center center no-repeat; background-size: cover; min-height: 500px;">
            <div class="carousel-caption d-md-block">
                <h2>Phào Chỉ Đẳng Cấp Cho Biệt Thự</h2>
                <p>Thiết kế tinh tế, thi công chuyên nghiệp.</p>
                <a href="#products" class="btn btn-primary btn-lg">Xem Thêm</a>
            </div>
        </div>
        <div class="carousel-item" style="background: url('images/slider3.jpg') center center no-repeat; background-size: cover; min-height: 500px;">
            <div class="carousel-caption d-md-block">
                <h2>Hoa Văn Sang Trọng, Quý Phái</h2>
                <p>Tạo điểm nhấn độc đáo cho không gian sống.</p>
                <a href="#projects" class="btn btn-outline-light btn-lg">Xem Dự Án</a>
            </div>
        </div>
        <div class="carousel-item" style="background: url('images/slider1.jpg') center center no-repeat; background-size: cover; min-height: 500px;">
            <div class="carousel-caption d-md-block">
                <h2>Sản Xuất và Thi Công Phào Chỉ Theo Yêu Cầu</h2>
                <p>Đáp ứng mọi ý tưởng thiết kế của bạn.</p>
                <a href="#contact" class="btn btn-info btn-lg">Liên Hệ Ngay</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#home-slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#home-slider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</section>

<section id="about" class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Về BOM-THANG</h2>
                <p style="text-align: justify">Chúng tôi là đơn vị chuyên sản xuất và thi công phào chỉ hoa văn dành cho các công trình. Với đội thợ lành nghề và kinh nghiệm nhiều năm trong lĩnh vực, BOM-THANG cam kết mang đến những sản phẩm chất lượng, độc đáo và phù hợp với kiến trúc riêng của từng ngôi nhà.</p>
                <p style="text-align: justify">Sứ mệnh của chúng tôi là kiến tạo không gian sống, thể hiện gu thẩm mỹ tinh tế của gia chủ thông qua những chi tiết phào chỉ được chế tác tỉ mỉ.</p>
            </div>
            <div class="col-md-6">
                <img style="width: 100%; max-height: 380px" src="images/logo_1.png" alt="Về Chúng Tôi" class="img-fluid rounded shadow-sm">
            </div>
        </div>
    </div>
</section>

<section id="products" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Sản Phẩm Tiêu Biểu</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <div class="col">
                <div class="card shadow-sm">
                    <img src="images/product4.jpg" alt="Phào Chỉ Trần" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Phào Chỉ Trần</h5>
                        <p class="card-text">Các mẫu phào chỉ trang trí trần nhà đa dạng về kiểu dáng và hoa văn.</p>
                        <!--                    <a href="#" class="btn btn-outline-primary btn-sm">Xem Chi Tiết</a>-->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <img src="images/product2.jpg" alt="Phào Chỉ Tường" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Phào Chỉ Tường</h5>
                        <p class="card-text">Phào chỉ trang trí tường, tạo điểm nhấn và sự khác biệt cho không gian.</p>
                        <!--                    <a href="#" class="btn btn-outline-primary btn-sm">Xem Chi Tiết</a>-->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <img src="images/product3.jpeg" alt="Hoa Văn Góc" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Hoa Văn Góc</h5>
                        <p class="card-text">Các chi tiết hoa văn trang trí góc tường, cột, tạo sự hoàn thiện.</p>
                        <!--                    <a href="#" class="btn btn-outline-primary btn-sm">Xem Chi Tiết</a>-->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <img src="images/product1.jpg" alt="Chỉ Viền Cửa" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Chỉ Viền Cửa</h5>
                        <p class="card-text">Các loại chỉ viền trang trí cửa, mang đến vẻ đẹp cổ điển và sang trọng.</p>
                        <!--                    <a href="#" class="btn btn-outline-primary btn-sm">Xem Chi Tiết</a>-->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <img src="images/product6.jpg" alt="Phào Chỉ Khác" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Phào Chỉ Khác</h5>
                        <p class="card-text">Các loại phào chỉ trang trí đặc biệt theo yêu cầu của khách hàng.</p>
                        <!--                    <a href="#" class="btn btn-outline-primary btn-sm">Xem Chi Tiết</a>-->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <img src="images/product3.jpeg" alt="Thi Công Thực Tế" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Thi Công Thực Tế</h5>
                        <p class="card-text">Hình ảnh các công trình biệt thự đã được thi công phào chỉ.</p>
                        <!--                    <a href="#projects" class="btn btn-outline-primary btn-sm">Xem Dự Án</a>-->
                    </div>
                </div>
            </div>
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
        <h2 class="text-center mb-4">Liên Hệ Với Chúng Tôi</h2>
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <p class="lead">Để được tư vấn chi tiết về sản phẩm và dịch vụ thi công phào chỉ hoa văn cho biệt thự của bạn, vui lòng liên hệ với chúng tôi qua số điện thoại hoặc email dưới đây:</p>
                <p class="text-align-left"><strong>Điện thoại:</strong> 0968 658 067</p>
                <p><strong>Email:</strong> <a href="mailto:">email</a></p>
            </div>
        </div>
    </div>
</section>

<footer class="text-light py-4 text-center">
    <div class="container">
        <p class="mb-0">&copy; 2025 BOM-THANG. All Rights Reserved.</p>
    </div>
</footer>
<div id="imageModal" class="modal">
    <span class="close-button">&times;</span>
    <img class="modal-content" id="fullScreenImage" />
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ assert('/access/frontend/js/script.js') }}"></script>
</body>
</html>
