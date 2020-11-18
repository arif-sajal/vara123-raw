<div class="modal-content">
     <div class="modal-header">
          <h4 class="modal-title">Add New Amenity</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
          </button>
     </div>
     <form action="{{ route('app.form.submission.setting.amenity.add') }}" class="ajax-form" method="post" enctype="multipart/form-data">
          <div class="modal-body">
               <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name">
                         </div>
                    </div>
                    <div class="col-md-12">
                         <div class="form-group">
                              <label>Icon Name</label>
                              <input type="text" class="form-control" name="icon">
                         </div>
                    </div>
                    <div class="col-md-12">
                         <div class="form-group">
                              <label>Select Property Type</label>
                              <select name="property_type_id" class="form-control ">
                                   @foreach( App\Models\PropertyType::all() as $property_type )
                                   <option value="{{ $property_type->id }}">{{ $property_type->name }}</option>
                                   @endforeach
                              </select>
                         </div>
                    </div>
                    <div class="col-md-12">
                         <div class="form-group">
                              <label>Select Provider</label>
                              <select name="provider_id" class="form-control select2" style="width:100%;">
                                   @forelse(App\Models\Provider::all() as $provider)
                                   <option value="{{ $provider->id }}">{{ $provider->first_name }} {{ $provider->last_name }}</option>
                                   @empty
                                   <option value="">No Provider Found</option>
                                   @endforelse
                              </select>
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

@push('page.vendor.js')
<script src="{{ asset('administration/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZDni5W-iV-mDZmL44FwTFqhWbv7YgMGI&callback=initMap"></script>
@endpush

@push('page.vendor.css')
<link href="{{ asset('administration/app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css') }}" type="text/javascript">
</link>
@endpush

@push('page.js')
<script>
     $(".select2").select2();
</script>
@endpush