<div class="modal-header">
    <h5 class="modal-title">Add Lead</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.department.add') }}" method="POST">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Lead Name<span class="text-danger">*</span></label>
                    <input class="form-control" name="lead_name" type="text" placeholder="Title" value="{{ $lead->lead_name }}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Company Name<span class="text-danger">*</span></label>
                    <input class="form-control" name="lead_name" type="text" placeholder="Title" value="{{ $lead->company_name }}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Business Type<span class="text-danger">*</span></label>
                    <select class="select2" name="business_type_id" style="width: 100%;">
                        @foreach($businessTypes as $bt)
                            <option value="{{ $bt->id }}">{{ $bt->type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Status<span class="text-danger">*</span></label>
                    <select class="select2" name="status_id" style="width: 100%;">
                        @foreach($statuses as $st)
                            <option value="{{ $st->id }}">{{ $st->status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Priority<span class="text-danger">*</span></label>
                    <select class="select2" name="priority_id" style="width: 100%;">
                        @foreach($priorities as $ps)
                            <option value="{{ $ps->id }}">{{ $ps->priority }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="city" value="{{ $lead->email }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Phone<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="city" value="{{ $lead->phone }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Mobile<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="city" value="{{ $lead->mobile }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Country<span class="text-danger">*</span></label>
                    <select class="select2" name="business_type_id" style="width: 100%;">
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }} - {{ $country->native_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">State<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="city" value="{{ $lead->state }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">City<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="city" value="{{ $lead->city }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Address<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="city" value="{{ $lead->address }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Facebook<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="city" value="{{ $lead->facebook }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Skype<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="city" value="{{ $lead->skype }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Twitter<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="city" value="{{ $lead->twitter }}">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/department.form.button.close')</button>
        <button type="submit" class="btn btn-primary">@lang('module/department.form.button.add')</button>
    </div>
</form>
<script>
    $('.select2').select2();
</script>
