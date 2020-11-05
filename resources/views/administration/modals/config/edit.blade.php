<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Edit Config Information</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="{{ route('app.form.submission.setting.config.update', $config->id) }}" class="ajax-form" method="post" enctype="multipart/form-data" >
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Key</label>
                        <input type="text" class="form-control" value="{{ $config->key }}" name="key">
                    </div>
                </div>
                @if( $config->type != 'file' )
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Value</label>
                        <input type="text" class="form-control" value="{{ $config->value }}" name="value">
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Upload Image</label> <br>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Update</button>
        </div>
    </form>
</div>
