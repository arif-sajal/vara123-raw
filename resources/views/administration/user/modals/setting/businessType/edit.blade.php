<div class="modal-header">
    <h5 class="modal-title">Edit Business Type</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.setting.business.type.edit',$businessType) }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">Type<span class="text-danger">*</span></label>
            <input class="form-control" name="type" type="text" placeholder="Type" value="{{ $businessType->type }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">Note</label>
            <textarea class="form-control" name="note" placeholder="Note">{{ $businessType->note }}</textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/department.form.button.close')</button>
        <button type="submit" class="btn btn-primary">Save Business Type</button>
    </div>
</form>
