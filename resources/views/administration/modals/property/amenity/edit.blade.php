<div class="modal-header">
     <h5 class="modal-title">Edit Amenity</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
     </button>
</div>
<form class="ajax-form" action="{{ route('app.form.submission.property.amenity.update',$amenity->id) }}" method="POST">
     <div class="modal-body">

          <div class="form-group">
               <label class="form-label">Name<span class="text-danger">*</span></label>
               <input class="form-control" name="name" type="text" value="{{ $amenity->name }}" placeholder="Name" />
          </div>

          <div class="form-group">
               <label class="form-label">Icon<span class="text-danger">*</span></label>
               <input class="form-control" name="icon" type="text" value="{{ $amenity->icon }}" placeholder="Icon" />
          </div>

          <div class="form-group">
               <label class="form-label">For<span class="text-danger">*</span></label>
               <select name="property_type_id" class="form-control">
                    @foreach( \App\Models\PropertyType::all() as $property_type )
                    <option value="{{ $property_type->id }}" @if($amenity->property_type_id == $property_type->id ) selected @endif >{{ $property_type->name }}</option>
                    @endforeach
               </select>
          </div>

     </div>
     <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
     </div>
</form>

<script src="{{ asset('administration/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>

<script>
     $('.bed-repeater').repeater();
</script>