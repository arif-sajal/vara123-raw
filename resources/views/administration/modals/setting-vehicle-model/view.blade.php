<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Vehicle Model Information</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">

                    @if( $vehicleModels->image == NULL )
                    <p class="badge badge-danger">No image uploaded</p>
                    @else
                    <img src="{{ Storage::url($vehicleModels->image) }}" @if(\Illuminate\Support\Facades\Storage::exists($vehicleModels->image)) data-default-file="{{ \Illuminate\Support\Facades\Storage::url($vehicleModels->image) }}" @endif width="50px" alt=""> <br> <br>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Vehicle Manufacturer</b></label>
                    <p>
                       {{ $vehicleModels->manufacturer->name }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Vehicle Type</b></label>
                    <p>
                        {{ $vehicleModels->vehicle_type->name }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Model Name</b></label>
                    <p>
                        {{ $vehicleModels->model_name }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Model Year</b></label>
                    <p>
                        {{ $vehicleModels->model_year }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Height</b></label>
                    <p>
                        {{ $vehicleModels->height }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Width</b></label>
                    <p>
                        {{ $vehicleModels->width }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Length</b></label>
                    <p>
                        {{ $vehicleModels->length }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Mileage</b></label>
                    <p>
                        {{ $vehicleModels->mileage }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Transmission</b></label>
                    <p>
                        {{ $vehicleModels->transmission }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Fuel Type</b></label>
                    <p>
                        {{ $vehicleModels->fuel_type }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Door Count</b></label>
                    <p>
                        {{ $vehicleModels->door_count }}
                    </p>
                </div>
            </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
