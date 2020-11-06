<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Edit Vehicle Model</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="{{ route('app.form.submission.setting.vehicle.model.update', $vehicleModels->id ) }}" class="ajax-form" method="post" enctype="multipart/form-data" >
        <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Vehicle Manufacturer</label>
                      <select class="form-control" name="manufacturer_id">
                        <option>Select Manufacturer</option>
                        @foreach ($manufacturers as $manufact)
                          <option value="{{ $manufact->id }}"{{$manufact->id == $vehicleModels->manufacturer_id ? 'selected' : ''}}>{{ $manufact->name }}</option>
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
                          <option value="{{ $type->id }}"{{$type->id == $vehicleModels->vehicle_type_id ? 'selected' : ''}}>{{ $type->name }}</option>
                        @endforeach
                      </select>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Model Name</label>
                      <input type="text" class="form-control" name="model_name" value="{{ $vehicleModels->model_name }}">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Model Year</label>
                      <input type="number" class="form-control" value="{{ $vehicleModels->model_year }}" name="model_year">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Height</label>
                      <input type="text" class="form-control" value="{{ $vehicleModels->height }}" name="height">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Width</label>
                      <input type="text" class="form-control" value="{{ $vehicleModels->width }}" name="width">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Length</label>
                      <input type="text" class="form-control" value="{{ $vehicleModels->length }}" name="length">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Mileage</label>
                      <input type="text" name="mileage" class="form-control" value="{{ $vehicleModels->mileage }}">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Transmission</label>
                      <input type="text" value="{{ $vehicleModels->transmission }}" name="transmission" class="form-control">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Fuel Type</label>
                      <input type="text" name="fuel_type" class="form-control" value="{{ $vehicleModels->fuel_type }}">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Door Count</label>
                      <input type="number" name="door_count" class="form-control" value="{{ $vehicleModels->door_count }}">
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                      <label>Upload Image</label> <br>
                      @if( $vehicleModels->image == NULL )
                      <p class="badge badge-danger">No image uploaded</p>
                      @else
                        <img src="{{ Storage::url($vehicleModels->image) }}" @if(\Illuminate\Support\Facades\Storage::exists($vehicleModels->image)) data-default-file="{{ \Illuminate\Support\Facades\Storage::url($vehicleModels->image) }}" @endif width="50px" alt=""> <br> <br>
                      @endif
                      <input type="file" class="form-control-file dropify" name="image">
                  </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Update</button>
        </div>
    </form>
</div>
