<div class="modal" id="modal-confirm-contact" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-send-mail" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p class="text-title"></p>
                    <input type="text" id="email" name="email" hidden="hidden">
                    <div class="form-group">
                        <label for="content">{{ __('translation.sendMail.content') }}</label>
                        <textarea id="content" rows="3" class="form-control" name="content"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label for="file">{{ __('translation.sendMail.file') }}</label>
                        <input type="file" id="file" multiple name="file[]">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm" href="">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
