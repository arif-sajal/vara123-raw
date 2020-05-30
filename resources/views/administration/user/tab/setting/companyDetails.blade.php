<div class="card">
    <div class="card-header border-bottom-danger">
        <h4 class="card-title">Company Details</h4>
    </div>
    <div class="card-body">
        <form class="ajax-form" action="{{ route('user.submit.setting.update.companyDetails') }}" method="POST">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control" placeholder="Company Name" name="company_name" value="{{ SC::get('company_name') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Legal Name</label>
                            <input type="text" class="form-control" placeholder="Legal Name" name="company_legal_name" value="{{ SC::get('company_legal_name') }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Contact Person</label>
                            <input type="text" class="form-control" placeholder="Contact Person" name="company_contact_person_name" value="{{ SC::get('company_contact_person_name') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Company Address</label>
                            <textarea type="text" class="form-control" placeholder="Company Address" name="company_address">{{ SC::get('company_address') }}</textarea>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Country</label>
                            <select name="company_country" class="select2" style="width:100%;">
                                <option value="">Select Country</option>
                                @forelse($countries as $country)
                                    <option value="{{ $country->id }}" data-icon="{{ $country->icon }}" @if(SC::get('company_country') == $country->id) selected @endif>{{ $country->name }}</option>
                                @empty
                                    <option value="">No Country</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" placeholder="City" name="company_city" value="{{ SC::get('company_city') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ZIP Code</label>
                            <input type="text" class="form-control" placeholder="Zip Code" name="company_zip_code" value="{{ SC::get('company_zip_code') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Phone</label>
                            <input type="text" class="form-control" placeholder="Company Phone" name="company_phone" value="{{ SC::get('company_phone') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Email</label>
                            <input type="email" class="form-control" placeholder="Company Email" name="company_email" value="{{ SC::get('company_email') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Company Website</label>
                            <input type="text" class="form-control" placeholder="Company Website" name="company_website" value="{{ SC::get('company_website') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Company VAT</label>
                            <input type="text" class="form-control" placeholder="Company Vat" name="company_vat" value="{{ SC::get('company_vat') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="pull-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
</div>
<script>
    $(".select2").select2({
        templateResult: iconFormat,
        templateSelection: iconFormat,
        minimumInputLength: 1,
        escapeMarkup: function(es) { return es; }
    });

    // Format icon
    function iconFormat(icon) {
        var originalOption = icon.element;
        if (!icon.id) { return icon.text; }
        var $icon = "<i class='flag-icon flag-icon-" + $(icon.element).data('icon') + "'></i>" + icon.text;

        return $icon;
    }
</script>
