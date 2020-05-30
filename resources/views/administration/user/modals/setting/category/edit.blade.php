<div class="modal-header">
    <h5 class="modal-title">Edit Category</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.setting.category.edit',$category->id) }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">Category<span class="text-danger">*</span></label>
            <input class="form-control" name="category" type="text" placeholder="Category" value="{{ $category->category }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">Note<span class="text-danger">*</span></label>
            <textarea class="form-control" name="note" type="text" placeholder="Note">{{ $category->note }}</textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/department.form.button.close')</button>
        <button type="submit" class="btn btn-primary">Save Category</button>
    </div>
</form>
