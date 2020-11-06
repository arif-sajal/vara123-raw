<div class="card">
    <div class="card-header">
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalLarge" data-content="{{ route('app.modal.property.spot.add',$property->id) }}">
                        Add Spot
                    </button>
                </li>
                <li>
                    <button class="btn btn-sm btn-success" data-action="reload" data-type="table" data-elem="SpotTable">
                        <i class="ft-rotate-cw"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-content collapse show">
        <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered" data-table-type="datatable"
            data-table-name="SpotTable" data-table-content="{{ route('app.table.property.spots',$property->id) }}" style="width: 100%;">
                <thead>
                <tr>
                    <th>Property Name</th>
                    <th>Provider Name</th>
                    <th>Total</th>
                    <th>Available</th>
                    <th>Booked</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Property Name</th>
                    <th>Provider Name</th>
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
    initiateDatatable('SpotTable');
    window.datatable.SpotTable.columns = [
        { data: 'property_id', name: 'property_id'},
        { data: 'provider_id', name: 'provider_id'},
        { data: 'total', name: 'total'},
        { data: 'available', name: 'available' },
        { data: 'booked', name: 'booked' },
        { data: 'action', name: 'action', orderable: false },
    ];

    var $this = $("[data-table-name='SpotTable']");
    var name = 'SpotTable';
    window[name] = $this.DataTable(
        window.datatable[name]
    );
</script>
