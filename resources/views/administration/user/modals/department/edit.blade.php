<div class="modal-header">
    <h5 class="modal-title">@lang('module/department.form.title.edit')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.department.edit',$department->id) }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">@lang('module/department.form.input.label.department') <span class="text-danger">*</span></label>
            <input class="form-control" name="department" type="text" placeholder="@lang('module/department.form.input.placeholder.department')" value="{{ $department->department }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">@lang('module/department.form.input.label.note')</label>
            <textarea class="form-control" name="note" type="text" placeholder="@lang('module/department.form.input.placeholder.note')">{{ $department->note }}</textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/department.form.button.close')</button>
        <button type="submit" class="btn btn-primary">@lang('module/department.form.button.save')</button>
    </div>
</form>
