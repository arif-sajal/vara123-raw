<div class="modal-header">
    <h5 class="modal-title">Add Status</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.setting.status.add',$for) }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">Status <span class="text-danger">*</span></label>
            <input class="form-control" name="status" type="text" placeholder="Name"/>
        </div>
        <div class="form-group">
            <label class="form-label">State <span class="text-danger">*</span></label>
            <select class="form-control" name="state" type="text">
                <option value="Open">Open</option>
                <option value="Close">Close</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">Class <span class="text-danger">*</span></label>
            <input class="form-control" name="class" type="text" placeholder="Class"/>
        </div>
        <div class="form-group">
            <label class="form-label">Note</label>
            <textarea class="form-control" name="note" placeholder="Note"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/department.form.button.close')</button>
        <button type="submit" class="btn btn-primary">Add Status</button>
    </div>
</form>
