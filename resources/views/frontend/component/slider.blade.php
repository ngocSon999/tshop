<section id="home-slider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#home-slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#home-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#home-slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        @foreach($sliders as $slider)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="background: url('{{ asset($slider->image) }}') center center no-repeat; background-size: cover; min-height: 500px;">
                <div class="carousel-caption d-md-block">
                    <h2>{{ $slider->name }}</h2>
                    <p>{{ $slider->title }}</p>
                    @if(!empty($slider->link))
                        <a href="{{ $slider->link }}" class="btn btn-primary btn-lg">{{ __('translation.menu.view') }}</a>
                    @endif
                </div>
            </div>
        @endforeach
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
