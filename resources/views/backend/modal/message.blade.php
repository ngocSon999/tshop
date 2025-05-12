@if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show auto-dismiss-alert" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="alert-timer-bar"></div>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show auto-dismiss-alert" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="alert-timer-bar"></div>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show auto-dismiss-alert" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="alert-timer-bar"></div>
    </div>
@endif
