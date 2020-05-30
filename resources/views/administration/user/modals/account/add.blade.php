<div class="modal-header">
    <h5 class="modal-title">@lang('module/account.form.title.add')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.account.add') }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">@lang('module/account.form.input.label.name')<span class="text-danger">*</span></label>
            <input class="form-control" name="account_name" type="text" placeholder="@lang('module/account.form.input.placeholder.name')"/>
        </div>
        <div class="form-group">
            <label class="form-label">@lang('module/account.form.input.label.number')<span class="text-danger">*</span></label>
            <input class="form-control" name="account_number" type="text" placeholder="@lang('module/account.form.input.placeholder.number')"/>
        </div>
        <div class="form-group">
            <label class="form-label">@lang('module/account.form.input.label.initialBalance')<span class="text-danger">*</span></label>
            <input class="form-control" name="initial_balance" type="text" placeholder="@lang('module/account.form.input.placeholder.initialBalance')"/>
        </div>
        <div class="form-group">
            <label class="form-label">@lang('module/account.form.input.label.note')</label>
            <textarea class="form-control" name="note" type="text" placeholder="@lang('module/account.form.input.placeholder.note')"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/account.form.button.close')</button>
        <button type="submit" class="btn btn-primary">@lang('module/account.form.button.add')</button>
    </div>
</form>
