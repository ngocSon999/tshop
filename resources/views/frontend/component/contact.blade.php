<h2 class="text-center mb-2">{{ __('translation.contact.us') }}</h2>
<div class="row justify-content-center">
    <div class="text-center">
        <p class="lead">{{ getSetting('contact_description') }}</p>
        <p class="d-flex justify-content-start text-align-left m-0"><strong>Điện thoại:</strong><a style="text-decoration: none; padding-left: 6px" href="tel:{{ getSetting('contact_phone') }}">{{ getSetting('contact_phone') }}</a></p>
        <p class="d-flex justify-content-start text-align-left m-0"><strong>Email:</strong><a style="text-decoration: none; padding-left: 6px" href="mailto:{{ getSetting('contact_email') }}">{{ getSetting('contact_email') }}</a></p>
    </div>
</div>
