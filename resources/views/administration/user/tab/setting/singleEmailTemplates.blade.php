<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ ucfirst($tab) }} Email Templates</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            @component('compo.buttons.reloadSm')
                                @slot('icon')
                                    ft-rotate-cw
                                @endslot
                                @slot('attributes')
                                    data-action="reload"
                                    data-type="table"
                                    data-elem="EmailTemplatesTable"
                                    data-hover="tooltip"
                                    data-original-title="Reload Table"
                                @endslot
                            @endcomponent
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <table class="table table-striped table-bordered" data-table-type="datatable" data-table-name="EmailTemplatesTable" data-table-content="{{ route('user.table.setting.email.templates',$tab) }}"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Subject</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Subject</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('app-assets/vendors/js/editors/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<script>
    $("[data-hover=\"tooltip\"]").tooltip();
    $("[data-hover=\"tooltip\"]").click(function(){
        $(this).tooltip('hide');
    });

    var name = "EmailTemplatesTable";

    initiateDatatable(name);

    window.datatable[name].columns = [
        {name: 'title', data: 'title'},
        {name: 'subject', data: 'subject'},
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
