<div class="card-header border-bottom-danger">
    <h4 class="card-title">Cities</h4>
    <div class="heading-elements">
        <ul class="list-inline mb-0">
            <li>
                <button class="btn btn-success btn-sm btn-icon" data-hover="tooltip" data-original-title="Add Amenity " data-toggle="modal" data-target="#myModal" data-content="{{ route('app.modal.setting.amenity.add') }}">
                    <i class="fa ft-plus"></i>
                    Add Amnity
                </button>
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
                        <table class="table table-striped table-bordered" data-table-type="datatable" data-table-name="AmenityTable" data-table-content="{{ route('app.table.setting.amenity.table') }}"  style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Property</th>
                                    <th>Provider</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('page.vendor.js')
<script src="{{ asset('administration/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZDni5W-iV-mDZmL44FwTFqhWbv7YgMGI&callback=initMap"></script>
@endpush

@push('page.vendor.css')
<link href="{{ asset('administration/app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css') }}" type="text/javascript">
</link>
@endpush

<script>
    $("[data-hover=\"tooltip\"]").tooltip();
    $("[data-hover=\"tooltip\"]").click(function(){
        $(this).tooltip('hide');
    });

    $(".select2").select2();
    
    const name = "AmenityTable";

    initiateDatatable(name);

    window.datatable[name].columns = [
        {name: 'name', data: 'name'},
        {name: 'icon', data: 'icon'},
        {name: 'property_type_id', data: 'property_type_id'},
        {name: 'provider_id', data: 'provider_id'},
        {name: 'action', data: 'action', orderable: false},
    ];

    assignDatatable(name);
</script>
