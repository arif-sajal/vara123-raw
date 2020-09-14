<div class="card">
    <div class="card-header">
        <h4 class="card-title">Notes</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li>
                    <button class="btn btn-sm btn-info">
                        Add Call
                    </button>
                </li>
                <li>
                    <button class="btn btn-sm btn-success" data-action="reload" data-type="table" data-elem="ContactPeopleTable">
                        <i class="ft-rotate-cw"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-content collapse show">
        <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered" data-table-type="datatable" data-table-name="CallsTable" data-table-content="{{ route('user.table.lead.calls',$lead->id) }}" style="width: 100%;">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script>
    initiateDatatable('CallsTable');
    window.datatable.CallsTable.columns = [
        { data: 'caller_name', name: 'caller_name'},
        { data: 'call_summary', name: 'call_summary' },
        { data: 'action', name: 'action', orderable: false },
    ];

    window.datatable.CallsTable.language = {
        'emptyTable': "@lang('module/department.table.element.empty-table')",
        'info': "@lang('module/department.table.element.info')",
        'infoEmpty': "@lang('module/department.table.element.info-empty')",
        'infoFiltered': "@lang('module/department.table.element.info-filtered')",
        'lengthMenu': "@lang('module/department.table.element.length-menu')",
        'search': "@lang('module/department.table.element.search')",
        'zeroRecords': "@lang('module/department.table.element.zero-records')",
        'paginate': {
            'first': "@lang('module/department.table.element.paginate.first')",
            'last': "@lang('module/department.table.element.paginate.last')",
            'previous': "@lang('module/department.table.element.paginate.previous')",
            'next': "@lang('module/department.table.element.paginate.next')",
        },
    };
    var $this = $("[data-table-name='CallsTable']");
    var name = 'CallsTable';
    window[name] = $this.DataTable(
        window.datatable[name]
    );
</script>
