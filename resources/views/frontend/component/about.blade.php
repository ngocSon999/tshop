<section id="about" class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ __('translation.about.tShop') }}</h2>
                <p style="text-align: justify">{{ $about->message }}</p>
            </div>
            <div class="col-md-6">
                <img style="width: 100%; max-height: 380px" src="{{ asset($about->image) }}" alt="Về Chúng Tôi" class="img-fluid rounded shadow-sm">
            </div>
        </div>
    </div>
</section>
