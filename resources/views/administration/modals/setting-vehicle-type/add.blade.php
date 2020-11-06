<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Add Vehicle Type</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="{{ route('app.form.submission.setting.vehicle.type.add') }}" class="ajax-form" method="post" enctype="multipart/form-data" >
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehile Type Name</label>
                        <input type="text" class="form-control" placeholder="Vehicle Type Name" name="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Upload Icon</label> <br>
                        <input type="file" class="form-control-file" name="icon">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Add</button>
        </div>
    </form>
</div>
