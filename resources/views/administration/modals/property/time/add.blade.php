<div class="modal-header">
     <h5 class="modal-title">Add Timing</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
     </button>
</div>
<form class="ajax-form" action="{{ route('app.form.submission.property.timing.add',$property->id) }}" method="POST">
     <div class="modal-body">

          <div class="form-group">
               <label class="form-label">Day Name<span class="text-danger">*</span></label>
               <input class="form-control" name="day_name" type="text" />
          </div>
          <div class="form-group">
               <label class="form-label">Day Number<span class="text-danger">*</span></label>
               <input class="form-control" name="day_number" type="text" />
          </div>
          <div class="form-group">
               <label class="form-label">Opening<span class="text-danger">*</span></label>
               <input class="form-control" name="opening" type="time" />
          </div>
          <div class="form-group">
               <label class="form-label">Closing<span class="text-danger">*</span></label>
               <input class="form-control" name="closing" type="time" />
          </div>
          <div class="form-group">
               <label class="form-label">Off Day ?<span class="text-danger">*</span></label>
               <select name="is_off_day" class="form-control">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
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