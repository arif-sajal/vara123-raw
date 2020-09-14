<div class="card">
    <div class="card-header">
        <h4 class="card-title">Contact People</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li>
                    <button class="btn btn-sm btn-info">
                        Add Contact Person
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
            <table class="table table-striped table-bordered" data-table-type="datatable" data-table-name="ContactPeopleTable" data-table-content="{{ route('user.table.lead.contactPeople',$lead->id) }}" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Mobile</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Mobile</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    initiateDatatable('ContactPeopleTable');
    window.datatable.ContactPeopleTable.columns = [
        { data: 'full_name', name: 'full_name'},
        { data: 'email', name: 'email' },
        { data: 'phone', name: 'phone' },
        { data: 'mobile', name: 'mobile' },
        { data: 'action', name: 'action', orderable: false },
    ];

    window.datatable.ContactPeopleTable.language = {
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
    var $this = $("[data-table-name='ContactPeopleTable']");
    var name = 'ContactPeopleTable';
    window[name] = $this.DataTable(
        window.datatable[name]
    );
</script>
