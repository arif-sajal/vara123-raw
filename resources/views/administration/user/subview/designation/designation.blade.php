<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">@lang('module/designation.heading',['department'=>$department->department])</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">

                        @can('create.department')
                            <li>
                                @component('compo.buttons.addSm')
                                    @slot('icon')
                                        ft-plus
                                    @endslot
                                    @slot('attributes')
                                        data-toggle="modal"
                                        data-target="#myModal"
                                        data-content="{{ route('user.modal.department.add') }}"
                                        data-hover="tooltip"
                                        data-original-title="@lang('module/department.tooltip.add-department')"
                                    @endslot
                                    @lang('module/department.button.add')
                                @endcomponent
                            </li>
                            <li>
                                @component('compo.buttons.addSm')
                                    @slot('icon')
                                        ft-plus
                                    @endslot
                                    @slot('attributes')
                                        data-toggle="modal"
                                        data-target="#myModal"
                                        data-content="{{ route('user.modal.designation.add') }}"
                                        data-hover="tooltip"
                                        data-original-title="@lang('module/department.tooltip.add-designation')"
                                    @endslot
                                    @lang('module/designation.button.add')
                                @endcomponent
                            </li>
                        @endcan
                        <li>
                            @component('compo.buttons.reloadSm')
                                @slot('icon')
                                    ft-rotate-cw
                                @endslot
                                @slot('attributes')
                                    data-action="reload"
                                    data-type="table"
                                    data-elem="DesignationsTable"
                                    data-hover="tooltip"
                                    data-original-title="@lang('module/designation.tooltip.reload')"
                                @endslot
                            @endcomponent
                        </li>
                        <li>
                            @component('compo.buttons.backSm')
                                @slot('icon')
                                    ft-arrow-left
                                @endslot
                                @slot('attributes')
                                    data-action="back"
                                    data-hover="tooltip"
                                    data-original-title="@lang('module/designation.tooltip.back-to-department')"
                                @endslot
                            @endcomponent
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <table class="table table-striped table-bordered" data-table-type="datatable" data-table-name="DesignationsTable" data-table-content="{{ route('user.table.designations',$department->id) }}"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th>@lang('module/designation.table.heading.designation')</th>
                                <th>@lang('module/designation.table.heading.note')</th>
                                <th>@lang('module/designation.table.heading.users')</th>
                                <th>@lang('module/designation.table.heading.status')</th>
                                <th>@lang('module/designation.table.heading.action')</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>@lang('module/designation.table.heading.designation')</th>
                                <th>@lang('module/designation.table.heading.note')</th>
                                <th>@lang('module/designation.table.heading.users')</th>
                                <th>@lang('module/designation.table.heading.status')</th>
                                <th>@lang('module/designation.table.heading.action')</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("[data-hover=\"tooltip\"]").tooltip();
    $("[data-hover=\"tooltip\"]").click(function(){
        $(this).tooltip('hide');
    });
    var name = "DesignationsTable";

    initiateDatatable(name);

    window.datatable[name].columns = [
        {name: 'designation', data: 'designation'},
        {name: 'note', data: 'note'},
        {name: 'users_count', data: 'users_count'},
        {name: 'active', data: 'active'},
        {name: 'action', data: 'action', orderable: false},
    ];

    window.datatable[name].language = {
        'emptyTable': "@lang('module/designation.table.element.empty-table')",
        'info': "@lang('module/designation.table.element.info')",
        'infoEmpty': "@lang('module/designation.table.element.info-empty')",
        'infoFiltered': "@lang('module/designation.table.element.info-filtered')",
        'lengthMenu': "@lang('module/designation.table.element.length-menu')",
        'search': "@lang('module/designation.table.element.search')",
        'zeroRecords': "@lang('module/designation.table.element.zero-records')",
        'paginate': {
            'first': "@lang('module/designation.table.element.paginate.first')",
            'last': "@lang('module/designation.table.element.paginate.last')",
            'previous': "@lang('module/designation.table.element.paginate.previous')",
            'next': "@lang('module/designation.table.element.paginate.next')",
        }
    };

    assignDatatable(name);
</script>
