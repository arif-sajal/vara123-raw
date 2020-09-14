<div class="modal-header">
    <h5 class="modal-title">Edit Group</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.setting.group.edit',$group) }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">Group Name<span class="text-danger">*</span></label>
            <input class="form-control" name="name" type="text" placeholder="Group Name" value="{{ $group->name }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">Note<span class="text-danger">*</span></label>
            <textarea class="form-control" name="note" type="text" placeholder="Note">{{ $group->note }}</textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/department.form.button.close')</button>
        <button type="submit" class="btn btn-primary">Save Group</button>
    </div>
</form>
