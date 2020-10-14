
<div class="card-header border-bottom-danger">
    <h4 class="card-title">Vehicle Models</h4>
    <div class="heading-elements">
        <ul class="list-inline mb-0">
            <li>
                <button class="btn btn-success btn-sm btn-icon" data-hover="tooltip" data-original-title="Add Vehicle Type" data-toggle="modal" data-target="#myModal" data-content="{{ route('app.modal.setting-vehicle-model-modal.add') }}">
                    <i class="fa ft-plus"></i>
                    Add Vehicle Model
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
                        <table class="table table-striped table-bordered" data-table-type="datatable" data-table-name="VehicleModelsTable" data-table-content="{{ route('app.table.setting.vehicle.models') }}"  style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Year</th>
                                    <th>Mileage</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Year</th>
                                  <th>Mileage</th>
                                  <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $("[data-hover=\"tooltip\"]").tooltip();
    $("[data-hover=\"tooltip\"]").click(function(){
        $(this).tooltip('hide');
    });

    const name = "VehicleModelsTable";

    initiateDatatable(name);

    window.datatable[name].columns = [
        {data: 'id', name: 'id'},
        {name: 'model_name', data: 'model_name'},
        {name: 'model_year', data: 'model_year'},
        {name: 'mileage', data: 'mileage'},
        {name: 'action', data: 'action', orderable: false},
    ];

    assignDatatable(name);
</script>
