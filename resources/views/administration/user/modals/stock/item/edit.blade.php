<div class="modal-header">
    <h5 class="modal-title">@lang('module/stock/item.form.title.edit')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.stock.item.edit',$item->id) }}" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label class="form-label">@lang('module/stock/item.form.input.label.name')<span class="text-danger">*</span></label>
            <input class="form-control" name="name" type="text" placeholder="@lang('module/stock/item.form.input.placeholder.name')" value="{{ $item->name }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">@lang('module/stock/item.form.input.label.price')<span class="text-danger">*</span></label>
            <input class="form-control" name="unit_cost" type="text" placeholder="@lang('module/stock/item.form.input.placeholder.price')" value="{{ $item->unit_cost }}"/>
        </div>
        <div class="form-group">
            <label class="form-label">@lang('module/stock/item.form.input.label.unitType')<span class="text-danger">*</span></label>
            <select class="select2" name="unit_type" style="width:100%;">
                @foreach($unitTypes as $ut)
                    <option value="{{ $ut->id }}" @if($item->unit_type == $ut->id) selected @endif>{{ $ut->type }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">@lang('module/stock/item.form.input.label.itemGroup')<span class="text-danger">*</span></label>
            <select class="select2" name="group_id" style="width:100%;">
                <option value="">None</option>
                @foreach($itemGroups as $ig)
                    <option value="{{ $ig->id }}" @if($item->group_id == $ig->id) selected @endif>{{ $ig->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">@lang('module/stock/item.form.input.label.description')</label>
            <textarea class="form-control" name="description" type="text" placeholder="@lang('module/stock/item.form.input.placeholder.description')">{{ $item->description }}</textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/stock/item.form.button.close')</button>
        <button type="submit" class="btn btn-primary">@lang('module/stock/item.form.button.save')</button>
    </div>
</form>
<script>
    $('.select2').select2();
</script>
