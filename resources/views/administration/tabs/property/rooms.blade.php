<div class="card">
    <div class="card-header">
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalLarge" data-content="{{ route('admin.modal.property.room.add',$property->id) }}">
                        Add Room
                    </button>
                </li>
                <li>
                    <button class="btn btn-sm btn-success" data-action="reload" data-type="table" data-elem="RoomsTable">
                        <i class="ft-rotate-cw"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-content collapse show">
        <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered" data-table-type="datatable"
            data-table-name="RoomsTable" data-table-content="{{ route('admin.table.property.rooms',$property->id) }}" style="width: 100%;">
                <thead>
                <tr>
                    <th>Room Type</th>
                    <th>For</th>
                    <th>Bed</th>
                    <th>Total</th>
                    <th>Available</th>
                    <th>Booked</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Room Type</th>
                    <th>For</th>
                    <th>Bed</th>
                    <th>Total</th>
                    <th>Available</th>
                    <th>Booked</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script>
    initiateDatatable('RoomsTable');
    window.datatable.RoomsTable.columns = [
        { data: 'room_type', name: 'room_type'},
        { data: 'for_person', name: 'for_person'},
        { data: 'bed_count', name: 'bed_count'},
        { data: 'total', name: 'total'},
        { data: 'available', name: 'available' },
        { data: 'booked', name: 'booked' },
        { data: 'action', name: 'action', orderable: false },
    ];

    var $this = $("[data-table-name='RoomsTable']");
    var name = 'RoomsTable';
    window[name] = $this.DataTable(
        window.datatable[name]
    );
</script>
