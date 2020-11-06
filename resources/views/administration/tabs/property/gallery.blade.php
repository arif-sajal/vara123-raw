<div class="card">
    <div class="card-header">
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalLarge" data-content="{{ route('app.modal.property.gallery.add', $property->id) }}">
                        Add Gallery
                    </button>
                </li>
                <li>
                    <button class="btn btn-sm btn-success" data-action="reload" data-type="table" data-elem="GalleryTable">
                        <i class="ft-rotate-cw"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-content collapse show">
        <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered" data-table-type="datatable"
            data-table-name="GalleryTable"
            data-table-content="{{ route('app.table.property.gallery',$property->id) }}" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Property Name</th>
                        <th>Image</th>
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
    initiateDatatable('GalleryTable');
    window.datatable.GalleryTable.columns = [
        { data: 'property_id', name: 'property_id'},
        { data: 'image', name: 'image'},
        { data: 'action', name: 'action', orderable: false },
    ];

    var $this = $("[data-table-name='GalleryTable']");
    var name = 'GalleryTable';
    window[name] = $this.DataTable(
        window.datatable[name]
    );
</script>
