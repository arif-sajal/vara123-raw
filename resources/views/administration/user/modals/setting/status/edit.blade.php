<div class="modal-header">
    <h5 class="modal-title">Edit Status</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.setting.status.edit',$status->id) }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">Status<span class="text-danger">*</span></label>
            <input class="form-control" name="status" type="text" placeholder="Status" value="{{ $status->status }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">State<span class="text-danger">*</span></label>
            <select class="form-control" name="state" type="text">
                <option value="Open" @if($status->state == "Open") selected @endif>Open</option>
                <option value="Close" @if($status->state == "Close") selected @endif>Close</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">Class<span class="text-danger">*</span></label>
            <input class="form-control" name="class" type="text" placeholder="Class" value="{{ $status->class }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">Note</label>
            <textarea class="form-control" name="note" placeholder="Note">{{ $status->note }}</textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/department.form.button.close')</button>
        <button type="submit" class="btn btn-primary">Save Status</button>
    </div>
</form>
