<div class="modal-header">
    <h5 class="modal-title">@lang('module/designation.form.title.add')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.designation.add') }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">@lang('module/designation.form.input.label.department')<span class="text-danger">*</span></label>
            <select class="select2-data-ajax form-control" name="department_id" style="width: 100%;">
                <option value="">@lang('module/designation.form.input.placeholder.select-department')</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->department }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">@lang('module/designation.form.input.label.designation')<span class="text-danger">*</span></label>
            <input class="form-control" name="designation" type="text" placeholder="@lang('module/designation.form.input.placeholder.designation')"/>
        </div>
        <div class="form-group">
            <label class="form-label">@lang('module/designation.form.input.label.note')</label>
            <textarea class="form-control" name="note" type="text" placeholder="@lang('module/designation.form.input.placeholder.note')"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/designation.form.button.close')</button>
        <button type="submit" class="btn btn-primary">@lang('module/designation.form.button.add')</button>
    </div>
</form>
<script>
    // Loading remote data
    $(".select2-data-ajax").select2();
</script>
