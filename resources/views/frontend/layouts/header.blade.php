<header id="header" class="bg-light py-1 fixed-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h1 class="mb-0 d-flex align-items-center header-logo">
                    <img src="{{ asset('access/frontend/images/logo_2.jpg') }}" alt="Logo BOM-THANG" class="img-fluid" style="max-height: 100px;">
                    <strong style="color: #d4d09d; padding-left: 6px; text-transform: uppercase; font-family: 'Arial', sans-serif">tshop</strong>
                </h1>
            </div>
            <div class="col-md-8">
                <nav class="navbar navbar-expand-md navbar-light justify-content-end">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('web.index') }}">
                                    {{ __('translation.web.home') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.about') }}">{{ __('translation.web.about') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('translation.web.category') }}
                                </a>
                                <ul class="dropdown-menu" style="border: none" aria-labelledby="navbarDropdown">
                                    @foreach($categories as $category)
                                        <li><a class="dropdown-item" href="{{ route('web.category', $category->id) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.contact') }}">{{ __('translation.web.contact') }}</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
