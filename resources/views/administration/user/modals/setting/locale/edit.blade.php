<div class="modal-header">
    <h5 class="modal-title">Edit Locale</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.setting.locale.edit',$locale->id) }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">Name<span class="text-danger">*</span></label>
            <input class="form-control" name="name" type="text" placeholder="Name" value="{{ $locale->name }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">Locale<span class="text-danger">*</span></label>
            <input class="form-control" name="locales" type="text" placeholder="Locale" value="{{ $locale->locale }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">Code<span class="text-danger">*</span></label>
            <input class="form-control" name="code" type="text" placeholder="Code" value="{{ $locale->code }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">Language<span class="text-danger">*</span></label>
            <select name="language_id" class="select2" style="width: 100%;">
                @foreach($languages as $language)
                    <option value="{{ $language->id }}" @if($locale->language_id == $language->id) selected @endif >{{ $language->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/department.form.button.close')</button>
        <button type="submit" class="btn btn-primary">Save Locale</button>
    </div>
</form>
<script>
    $('.select2').select2();
</script>
