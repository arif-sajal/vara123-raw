<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Add Vehicle Model</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="{{ route('app.form.submission.setting-vehicle-model.add') }}" class="ajax-form" method="post" enctype="multipart/form-data" >
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehicle Manufacturer</label>
                        <select class="form-control" name="manufacturer_id">
                          <option>Select Manufacturer</option>
                          @foreach ($manufacturers as $manufact)
                            <option value="{{ $manufact->id }}">{{ $manufact->name }}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehicle Type</label>
                        <select class="form-control" name="vehicle_type_id">
                          <option>Select Vehicle Type</option>
                          @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Model Name</label>
                        <input type="text" class="form-control" name="model_name" placeholder="Model Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Model Year</label>
                        <input type="number" class="form-control" placeholder="Model Year" name="model_year">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Height</label>
                        <input type="text" class="form-control" placeholder="Height (Float/Double Value)" name="height">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Width</label>
                        <input type="text" class="form-control" placeholder="Width (Float/Double Value)" name="width">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Length</label>
                        <input type="text" class="form-control" placeholder="Length (Float/Double Value)" name="length">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mileage</label>
                        <input type="text" name="mileage" class="form-control" placeholder="Mileage (Float/Double Value)">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Transmission</label>
                        <input type="text" placeholder="Transmission" name="transmission" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Fuel Type</label>
                        <input type="text" name="fuel_type" class="form-control" placeholder="Fuel Type">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Door Count</label>
                        <input type="number" name="door_count" class="form-control" placeholder="Door Count">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Upload Image</label> <br>
                        <input type="file" class="form-control-file dropify" name="image">
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
