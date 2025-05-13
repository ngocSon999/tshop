<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tShop - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/access/frontend/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('/access/frontend/images/logo_2.jpg') }}" type="image/x-icon">
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
@include('frontend.layouts.header')
<div style="margin-top: 120px">
    @yield('slider')
    @yield('about')
    @yield('content')
</div>
@include('frontend.layouts.footer')
<div id="imageModal" class="modal">
    <span class="close-button">&times;</span>
    <img class="modal-content" id="fullScreenImage" />
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/access/frontend/js/script.js') }}"></script>
</body>
</html>
