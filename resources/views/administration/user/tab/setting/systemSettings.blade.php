<div class="card">
    <div class="card-header border-bottom-danger">
        <h4 class="card-title">System Settings</h4>
    </div>
    <div class="card-body">
        <form class="ajax-form" action="{{ route('user.submit.setting.update.systemSetting') }}" method="POST">
            <div class="form-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Default Language</label>
                            <select name="default_language" class="select2" style="width: 100%;">
                                @forelse($languages as $language)
                                    <option value="{{ $language->id }}" @if(SC::get('default_language') == $language->id) selected @endif>{{ $language->name }} ( {{ $language->native_name }} )</option>
                                @empty
                                    <option value="">No Language</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Locale</label>
                            <select name="default_locale" class="select2" style="width: 100%;">
                                @forelse($locales as $locale)
                                    <option value="{{ $locale->id }}" @if(SC::get('default_locale') == $locale->id) selected @endif>{{ $locale->name }} - {{ $locale->locale }}</option>
                                @empty
                                    <option value="">No Locale</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Timezone</label>
                            <select name="default_timezone" class="form-control select2" style="width: 100%;">
                                @forelse($timezones as $timezone)
                                    <option value="{{ $timezone->id }}" @if(SC::get('default_timezone') == $timezone->id) selected @endif> {{ $timezone->offset }} - {{ $timezone->zone }}</option>
                                @empty
                                    <option value="">No TimeZone</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput5">Default Currency</label>
                            <select name="default_currency" class="form-control select2" style="width: 100%;">
                                @forelse($currencies as $currency)
                                    <option value="{{ $currency->id }}" @if(SC::get('default_currency') == $currency->id) selected @endif>{{ $currency->name }} ( {{ $currency->code }} - {{ $currency->symbol }} )</option>
                                @empty
                                    <option value="">No Currency</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Default Account</label>
                            <select name="default_account" class="form-control select2" style="width: 100%;">
                                @forelse($accounts as $account)
                                    <option value="{{ $account->id }}" @if(SC::get('default_account') == $account->id) selected @endif>{{ $account->account_name }} - {{ $account->account_number }}</option>
                                @empty
                                    <option value="">No Account</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Default Currency Position</label>
                            <select name="default_currency_position" class="form-control select2-ne" style="width: 100%;">
                                <option value="before" @if(SC::get('default_currency_position') == 'before') selected @endif>$ 100</option>
                                <option value="after" @if(SC::get('default_currency_position') == 'after') selected @endif>100 $</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Default Tax</label>
                            <select name="default_tax[]" class="form-control select2-ne" multiple style="width: 100%;">
                                @forelse($taxRates as $taxRate)
                                    <option value="{{ $taxRate->id }}"  @if(in_array($taxRate->id,SC::get('default_tax'))) selected @endif>{{ $taxRate->name }} - {{ $taxRate->percent }}%</option>
                                @empty
                                    <option value="">No Tax Rate</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Table Pagination</label>
                            <select name="default_table_pagination" class="form-control select2-ne" style="width: 100%;">
                                <option value="10" @if(SC::get('default_table_pagination') == '10') selected @endif>10</option>
                                <option value="25" @if(SC::get('default_table_pagination') == '25') selected @endif>25</option>
                                <option value="50" @if(SC::get('default_table_pagination') == '50') selected @endif>50</option>
                                <option value="100" @if(SC::get('default_table_pagination') == '100') selected @endif>100</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Date Format</label>
                            <select name="default_date_format" class="form-control select2-ne" style="width: 100%;">
                                <option value="d-m-Y" @if(SC::get('default_date_format') == 'd-m-Y') selected @endif>19-08-2019</option>
                                <option value="m-d-Y" @if(SC::get('default_date_format') == 'm-d-Y') selected @endif>08-19-2019</option>
                                <option value="Y-m-d" @if(SC::get('default_date_format') == 'Y-m-d') selected @endif>2019-08-19</option>
                                <option value="d-m-y" @if(SC::get('default_date_format') == 'd-m-y') selected @endif>19-08-19</option>
                                <option value="m-d-y" @if(SC::get('default_date_format') == 'm-d-y') selected @endif>08-19-19</option>
                                <option value="m.d.Y" @if(SC::get('default_date_format') == 'm.d.Y') selected @endif>08.19.2019</option>
                                <option value="d.m.Y" @if(SC::get('default_date_format') == 'd.m.Y') selected @endif>19.08.2019</option>
                                <option value="Y.m.d" @if(SC::get('default_date_format') == 'Y.m.d') selected @endif>2019.08.19</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Time Format</label>
                            <select name="default_time_format" class="form-control select2-ne" style="width: 100%;">
                                <option value="g:i a" @if(SC::get('default_time_format') == 'g:i a') selected @endif>8:27 am</option>
                                <option value="g:i A" @if(SC::get('default_time_format') == 'g:i A') selected @endif>8:27 AM</option>
                                <option value="H:i" @if(SC::get('default_time_format') == 'H:i') selected @endif>08:27</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Money Format</label>
                            <select name="default_money_format" class="form-control select2-ne" style="width: 100%;">
                                <option value="1,0.00" @if(SC::get('default_money_format') == '1,0.00') selected @endif>1,234.00</option>
                                <option value="1.0,00" @if(SC::get('default_money_format') == '1.0,00') selected @endif>1.234,00</option>
                                <option value="10.00" @if(SC::get('default_money_format') == '10.00') selected @endif>1234.00</option>
                                <option value="10,00" @if(SC::get('default_money_format') == '10,00') selected @endif>1234,00</option>
                                <option value="1'0.00" @if(SC::get('default_money_format') == '1\'0.00') selected @endif>1'234.00</option>
                                <option value="1 0.00" @if(SC::get('default_money_format') == '1 0.00') selected @endif>1 234.00</option>
                                <option value="1 0,00" @if(SC::get('default_money_format') == '1 0,00') selected @endif>1 234,00</option>
                                <option value="1 0'00" @if(SC::get('default_money_format') == '1 0\'00') selected @endif>1 234'00</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="mr-5">Multi Language</label>
                            <input type='checkbox' data-type="switch" class='switchBootstrap' data-on-color='success' data-off-color='danger' data-on-text='<i class="ft-check"></i>' data-off-text='<i class="ft-x"></i>' name="enable_multi_language" @if(SC::get('enable_multi_language') == true) checked @endif/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="mr-5">Sub Task</label>
                            <input type='checkbox' data-type="switch" class='switchBootstrap' data-on-color='success' data-off-color='danger' data-on-text='<i class="ft-check"></i>' data-off-text='<i class="ft-x"></i>' name="enable_sub_task" @if(SC::get('enable_sub_task') == true) checked @endif/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="mr-5">Client Registration</label>
                            <input type='checkbox' data-type="switch" class='switchBootstrap' data-on-color='success' data-off-color='danger' data-on-text='<i class="ft-check"></i>' data-off-text='<i class="ft-x"></i>' name="enable_client_registration" @if(SC::get('enable_client_registration') == true) checked @endif/>
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
    $("[data-type='switch']").bootstrapSwitch({
        size: 'small',
    });
    $(".select2").select2({
        minimumInputLength: 1,
    });
    $(".select2-ne").select2();

    // Format icon
    function iconFormat(icon) {
        var originalOption = icon.element;
        if (!icon.id) { return icon.text; }
        var attr = $(this).data('icon');
        if(typeof attr !== typeof undefined && attr !== false){
            var $icon = "<i class='flag-icon flag-icon-" + $(icon.element).data('icon') + "'></i>" + icon.text;
        }else{
            var $icon = icon.text;
        }

        return $icon;
    }
</script>
