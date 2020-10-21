<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Edit Vehicle Manufacturer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="{{ route('app.form.submission.setting-vehicle-manufacturer.update', $vehicleManufacturers->id) }}" class="ajax-form" method="post" enctype="multipart/form-data" >
        <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Manufacturer Country</label>
                      <select class="form-control" name="country_id">
                        @foreach ($countries as $country)
                          <option value="{{ $country->id }}"{{$country->id == $vehicleManufacturers->country_id ? 'selected' : ''}} >{{ $country->name }}</option>
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                      <label>Vehicle Manufacturer Name</label>
                      <input type="text" class="form-control" value="{{ $vehicleManufacturers->name }}" name="name">
                  </div>
              </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Upload Icon</label> <br>
                        <img src="{{ Storage::url($vehicleManufacturers->logo) }}" @if(\Illuminate\Support\Facades\Storage::exists($vehicleManufacturers->logo)) data-default-file="{{ \Illuminate\Support\Facades\Storage::url($vehicleManufacturers->logo) }}" @endif width="50px" alt=""> <br> <br>
                        <input type="file" class="form-control-file" name="logo">
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
