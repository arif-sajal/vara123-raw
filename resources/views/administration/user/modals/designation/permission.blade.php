<div class="modal-header">
    <h5 class="modal-title">{{ $designation->designation }} Permissions</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="ajax-form" action="{{ route('user.submit.designation.permission.edit',$designation->id) }}" method="POST">
    <div class="modal-body">

        <table class="table" id="permissionsTable">
            <thead>
                <tr class="text-right">
                    <th>@lang('module/user-permission.form.table.heading.module')</th>
                    <th>@lang('module/user-permission.form.table.heading.create')</th>
                    <th>@lang('module/user-permission.form.table.heading.read')</th>
                    <th>@lang('module/user-permission.form.table.heading.update')</th>
                    <th>@lang('module/user-permission.form.table.heading.delete')</th>
                    <th>@lang('module/user-permission.form.table.heading.read_own')</th>
                    <th>@lang('module/user-permission.form.table.heading.update_own')</th>
                    <th>@lang('module/user-permission.form.table.heading.delete_own')</th>
                </tr>
            </thead>

            @php
                $modules = App\Models\Module::where('for','User')->get();
            @endphp
            <tbody>
            @foreach($modules as $module)

                <tr data-id="{{ $module->id }}" data-parent="{{ $module->parent }}" data-hide="{{ $module->parent == 0 ? 'false' : 'true' }}" class="text-right">
                    <td>@lang('module/modules.'.$module->label)</td>
                    <td>
                        <fieldset class="skin skin-square">
                            <input type="checkbox" name="permission[{{ $module->id }}][create]" {{ $module->permission($designation)->create == true ? 'checked' : '' }}>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset class="skin skin-square">
                            <input type="checkbox" name="permission[{{ $module->id }}][read]" {{ $module->permission($designation)->read == true ? 'checked' : '' }}>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset class="skin skin-square">
                            <input type="checkbox" name="permission[{{ $module->id }}][update]" {{ $module->permission($designation)->update == true ? 'checked' : '' }}>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset class="skin skin-square">
                            <input type="checkbox" name="permission[{{ $module->id }}][delete]" {{ $module->permission($designation)->delete == true ? 'checked' : '' }}>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset class="skin skin-square">
                            <input type="checkbox" name="permission[{{ $module->id }}][read_own]" {{ $module->permission($designation)->read_own == true ? 'checked' : '' }}>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset class="skin skin-square">
                            <input type="checkbox" name="permission[{{ $module->id }}][update_own]" {{ $module->permission($designation)->update_own == true ? 'checked' : '' }}>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset class="skin skin-square">
                            <input type="checkbox" name="permission[{{ $module->id }}][delete_own]" {{ $module->permission($designation)->delete_own == true ? 'checked' : '' }}>
                        </fieldset>
                    </td>
                </tr>

            @endforeach
            </tbody>

            <tfoot>
                <tr class="text-right">
                    <th>@lang('module/user-permission.form.table.heading.module')</th>
                    <th>@lang('module/user-permission.form.table.heading.create')</th>
                    <th>@lang('module/user-permission.form.table.heading.read')</th>
                    <th>@lang('module/user-permission.form.table.heading.update')</th>
                    <th>@lang('module/user-permission.form.table.heading.delete')</th>
                    <th>@lang('module/user-permission.form.table.heading.read_own')</th>
                    <th>@lang('module/user-permission.form.table.heading.update_own')</th>
                    <th>@lang('module/user-permission.form.table.heading.delete_own')</th>
                </tr>
            </tfoot>

        </table>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">@lang('module/user-permission.form.button.close')</button>
        <button type="submit" class="btn btn-primary">@lang('module/user-permission.form.button.save')</button>
    </div>
</form>
<script>
    $("[data-action='changeStatus']").bootstrapSwitch({
        size: 'small',
        onSwitchChange: function(event, state){
            fireAjax($(this).data('action-route'));
        },
    });

    $('.skin-square input').iCheck({
        checkboxClass: 'icheckbox_square-red',
        radioClass: 'iradio_square-red',
    });

    $('#permissionsTable tbody tr').each(function(key,value){
        if($(this).data('parent') != 0){
            $(this).addClass('border-bottom-success border-top-success border-custom-color')
            $(this).insertAfter('#permissionsTable tbody tr[data-id="'+$(this).data('parent')+'"]');
            $('#permissionsTable tbody tr[data-hide="true"]').hide();
            if($("#permissionsTable tbody tr[data-id="+$(this).data('parent')+"] td:first-child").data('appended') != true){
                $("#permissionsTable tbody tr[data-id="+$(this).data('parent')+"] td:first-child")
                    .prepend("<button type='button' class='btn btn-sm btn-outline-secondary float-left' data-action='expand-parent'><i class='icon-plus'></i></button>")
                    .attr('data-appended','true');
            }
        }
    });

    $(document).on('click',"[data-action='expand-parent']",function(){
        $("#permissionsTable tbody tr[data-parent='"+$(this).parents('tr').data('id')+"']").show();
        $(this).attr('data-action','collapse-parent').html('<i class=\'icon-close\'></i>')
    });

    $(document).on('click',"[data-action='collapse-parent']",function(){
        $("#permissionsTable tbody tr[data-parent='"+$(this).parents('tr').data('id')+"']").hide();
        $(this).attr('data-action','expand-parent').html('<i class=\'icon-plus\'></i>')
    });
</script>
