<div class="card">
    <div class="card-header">
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalLarge" data-content="{{ route('app.modal.property.vehicle.add',$property->id) }}">
                        Add Vehicle
                    </button>
                </li>
                <li>
                    <button class="btn btn-sm btn-success" data-action="reload" data-type="table" data-elem="VehiclesTable">
                        <i class="ft-rotate-cw"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-content collapse show">
        <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered" data-table-type="datatable" data-table-name="VehiclesTable" data-table-content="{{ route('app.table.property.vehicles',$property->id) }}" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Vehicle Model</th>
                        <th>Vehicle Type</th>
                        <th>Total</th>
                        <th>Available</th>
                        <th>Booked</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Vehicle Model</th>
                        <th>Vehicle Type</th>
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
    initiateDatatable('VehiclesTable');
    window.datatable.VehiclesTable.columns = [
        { data: 'vehicle_name', name: 'vehicle_name'},
        { data: 'vehicle_type', name: 'vehicle_type'},
        { data: 'total', name: 'total'},
        { data: 'available', name: 'available' },
        { data: 'booked', name: 'booked' },
        { data: 'action', name: 'action', orderable: false },
    ];

    var $this = $("[data-table-name='VehiclesTable']");
    var name = 'VehiclesTable';
    window[name] = $this.DataTable(
        window.datatable[name]
    );
</script>
