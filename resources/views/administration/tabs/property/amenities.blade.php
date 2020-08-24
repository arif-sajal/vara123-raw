<div class="card">
    <div class="card-header">
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalLarge" data-content="{{ route('admin.modal.property.room.add',$property->id) }}">
                        Add Amenity
                    </button>
                </li>
                <li>
                    <button class="btn btn-sm btn-success" data-action="reload" data-type="table" data-elem="AmenitiesTable">
                        <i class="ft-rotate-cw"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-content collapse show">
        <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered" data-table-type="datatable" data-table-name="AmenitiesTable" data-table-content="{{ route('admin.table.property.amenities',$property->id) }}" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script>
    initiateDatatable('AmenitiesTable');
    window.datatable.AmenitiesTable.columns = [
        { data: 'amenity.name', name: 'amenity.name'},
        { data: 'amenity.icon', name: 'amenity.icon'},
        { data: 'action', name: 'action', orderable: false },
    ];

    var $this = $("[data-table-name='AmenitiesTable']");
    var name = 'AmenitiesTable';
    window[name] = $this.DataTable(
        window.datatable[name]
    );
</script>
