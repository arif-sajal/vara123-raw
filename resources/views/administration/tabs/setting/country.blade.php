<div class="card-header border-bottom-danger">
    <h4 class="card-title">Cities</h4>
    <div class="heading-elements">
        <ul class="list-inline mb-0">
            <li>
                <button class="btn btn-success btn-sm btn-icon" data-hover="tooltip" data-original-title="Add Country" data-toggle="modal" data-target="#myModal" data-content="{{ route('app.modal.setting.country.add') }}">
                    <i class="fa ft-plus"></i>
                    Add Country
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
                        <table class="table table-striped table-bordered" data-table-type="datatable" data-table-name="CountryTable" data-table-content="{{ route('app.table.setting.country.table') }}"  style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
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


<script>
    $("[data-hover=\"tooltip\"]").tooltip();
    $("[data-hover=\"tooltip\"]").click(function(){
        $(this).tooltip('hide');
    });

    const name = "CountryTable";

    initiateDatatable(name);

    window.datatable[name].columns = [
        {name: 'name', data: 'name'},
        {name: 'action', data: 'action', orderable: false},
    ];

    assignDatatable(name);
</script>
