<div class="modal-content">
     <div class="modal-header">
          <h4 class="modal-title">Edit Amenity</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
          </button>
     </div>
     <form action="{{ route('app.form.submission.setting.amenity.update', $amenity->id) }}" class="ajax-form" method="post" enctype="multipart/form-data">
          <div class="modal-body">
               <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" value="{{ $amenity->name }}" name="name">
                         </div>
                    </div>
                    <div class="col-md-12">
                         <div class="form-group">
                              <label>Icon Name</label>
                              <input type="text" class="form-control"  value="{{ $amenity->icon }}" name="icon">
                         </div>
                    </div>
                    <div class="col-md-12">
                         <div class="form-group">
                              <label>Select Property Type</label>
                              <select name="property_type_id" class="form-control">
                                   @foreach( App\Models\PropertyType::all() as $property_type )
                                   <option value="{{ $property_type->id }}" @if( $amenity->property_type_id == $property_type->id ) selected @endif >{{ $property_type->name }}</option>
                                   @endforeach
                              </select>
                         </div>
                    </div>
                    <div class="col-md-12">
                         <div class="form-group">
                              <label>Select Provider</label>
                              <select name="provider_id" class="form-control">
                                   @foreach( App\Models\Provider::all() as $provider )
                                   <option value="{{ $provider->id }}" @if( $amenity->provider_id == $provider->id ) selected @endif >{{ $provider->first_name }} {{ $provider->last_name }}</option>
                                   @endforeach
                              </select>
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