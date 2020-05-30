<div class="modal-header">
    <h5 class="modal-title">@lang('module/designation.form.title.edit')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.designation.edit',$designation->id) }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">@lang('module/designation.form.input.label.department')<span class="text-danger">*</span></label>
            <select class="select2-data-ajax form-control" name="department_id" style="width: 100%;">
                <option value="">@lang('module/designation.form.input.placeholder.select-department')</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" @if($designation->department_id == $department->id) selected @endif>{{ $department->department }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">@lang('module/designation.form.input.label.designation')<span class="text-danger">*</span></label>
            <input class="form-control" name="designation" type="text" placeholder="@lang('module/designation.form.input.placeholder.designation')" value="{{ $designation->designation }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">@lang('module/designation.form.input.label.note')</label>
            <textarea class="form-control" name="note" type="text" placeholder="@lang('module/designation.form.input.placeholder.note')">{{ $designation->note }}</textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/designation.form.button.close')</button>
        <button type="submit" class="btn btn-primary">@lang('module/designation.form.button.save')</button>
    </div>
</form>
