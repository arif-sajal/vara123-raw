<div class="modal-header">
    <h5 class="modal-title">Edit Currency</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.setting.currency.edit',$currency) }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">Symbol<span class="text-danger">*</span></label>
            <input class="form-control" name="symbol" type="text" placeholder="Symbol" value="{{ $currency->symbol }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">Name<span class="text-danger">*</span></label>
            <input class="form-control" name="name" type="text" placeholder="Name" value="{{ $currency->name }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">Code<span class="text-danger">*</span></label>
            <input class="form-control" name="code" type="text" placeholder="Code" value="{{ $currency->code }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">Plural Name<span class="text-danger">*</span></label>
            <input class="form-control" name="name_plural" type="text" placeholder="Plural Name" value="{{ $currency->name_plural }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">Exchange Rate<span class="text-danger">*</span></label>
            <input class="form-control" name="exchange_rate" type="text" placeholder="Exchange Rate" value="{{ $currency->exchange_rate }}"/>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/department.form.button.close')</button>
        <button type="submit" class="btn btn-primary">Save Currency</button>
    </div>
</form>
