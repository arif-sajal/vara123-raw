<div class="modal-header">
     <h5 class="modal-title">Add Amenity</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
     </button>
</div>
<form class="ajax-form" action="{{ route('app.form.submission.property.amenity.add',$property->id) }}" method="POST">
     <div class="modal-body">

          <div class="form-group">
               <label class="form-label">Name<span class="text-danger">*</span></label>
               <input class="form-control" name="name" type="text" placeholder="Name" />
          </div>

          <div class="form-group">
               <label class="form-label">Icon<span class="text-danger">*</span></label>
               <input class="form-control" name="icon" type="text" placeholder="Icon" />
          </div>

          <div class="form-group">
               <label class="form-label">For<span class="text-danger">*</span></label>
               <select name="for" class="form-control">
                    <option value="1">accommodation</option>
                    <option value="2">vehicle_rental</option>
                    <option value="3">parking_lot</option>
                    <option value="4">room</option>
                    <option value="5">vehicle</option>
                    <option value="6">spot</option>
               </select>
          </div>

     </div>
     <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
     </div>
</form>

<script src="{{ asset('administration/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>

<script>
     $('.bed-repeater').repeater();
</script>