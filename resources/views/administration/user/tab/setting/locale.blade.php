<div class="card-header border-bottom-danger">
    <h4 class="card-title">Locales</h4>
    <div class="heading-elements">
        <ul class="list-inline mb-0">
            <li>
                @component('compo.buttons.addSm')
                    @slot('icon')
                        ft-plus
                    @endslot
                    @slot('attributes')
                        data-toggle="modal"
                        data-target="#myModal"
                        data-content="{{ route('user.modal.setting.locale.add') }}"
                        data-hover="tooltip"
                        data-original-title="Add Locale"
                    @endslot
                    Add Locale
                @endcomponent
            </li>
            <li>
                @component('compo.buttons.reloadSm')
                    @slot('icon')
                        ft-rotate-cw
                    @endslot
                    @slot('class')
                        mr-1
                    @endslot
                    @slot('attributes')
                        data-action="reload"
                        data-type="table"
                        data-elem="LocalesTable"
                        data-hover="tooltip"
                        data-original-title="Reload Table"
                    @endslot
                @endcomponent
            </li>
        </ul>
    </div>
</div>
<div class="card-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <table class="table table-striped table-bordered" data-table-type="datatable" data-table-name="LocalesTable" data-table-content="{{ route('user.table.setting.locales') }}"  style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>locale</th>
                                    <th>Code</th>
                                    <th>language</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>locale</th>
                                    <th>Code</th>
                                    <th>language</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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

    var name = "LocalesTable";

    initiateDatatable(name);

    window.datatable[name].columns = [
        {name: 'name', data: 'name'},
        {name: 'locale', data: 'locale'},
        {name: 'code', data: 'code'},
        {name: 'language.name', data: 'language.name'},
        {name: 'status', data: 'status'},
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
