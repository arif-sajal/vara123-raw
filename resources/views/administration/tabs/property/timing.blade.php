<div class="card">
    <div class="card-header">
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalLarge" data-content="{{ route('app.modal.property.timing.add', $property->id) }}">
                        Add Timing
                    </button>
                </li>
                <li>
                    <button class="btn btn-sm btn-success" data-action="reload" data-type="table" data-elem="TimeTable">
                        <i class="ft-rotate-cw"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-content collapse show">
        <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered" data-table-type="datatable"
            data-table-name="TimeTable"
            data-table-content="{{ route('app.table.property.time',$property->id) }}" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Property Name</th>
                        <th>Day Name</th>
                        <th>Day Number</th>
                        <th>Opening</th>
                        <th>Closing</th>
                        <th>Off Day</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script>
    initiateDatatable('TimeTable');
    window.datatable.TimeTable.columns = [
        { data: 'property_id', name: 'property_id'},
        { data: 'day_name', name: 'day_name'},
        { data: 'day_number', name: 'day_number'},
        { data: 'opening', name: 'opening'},
        { data: 'closing', name: 'closing'},
        { data: 'is_off_day', name: 'is_off_day'},
        { data: 'action', name: 'action', orderable: false },
    ];

    var $this = $("[data-table-name='TimeTable']");
    var name = 'TimeTable';
    window[name] = $this.DataTable(
        window.datatable[name]
    );
</script>
