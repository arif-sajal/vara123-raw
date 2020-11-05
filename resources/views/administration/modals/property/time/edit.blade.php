<div class="modal-header">
     <h5 class="modal-title">Edit Timing</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
     </button>
</div>
<form class="ajax-form" action="{{ route('app.form.submission.property.timing.update',$timing->id) }}" method="POST">
     <div class="modal-body">

          <div class="form-group">
               <label class="form-label">Day Name<span class="text-danger">*</span></label>
               <input class="form-control" name="day_name" value="{{ $timing->day_name }}" type="text" />
          </div>
          <div class="form-group">
               <label class="form-label">Day Number<span class="text-danger">*</span></label>
               <input class="form-control" name="day_number" value="{{ $timing->day_number }}" type="text" />
          </div>
          <div class="form-group">
               <label class="form-label">Opening <span class="text-danger">*</span></label>
               <input class="form-control" name="opening" value="{{ $timing->opening->toTimeString() }}" type="time" />
          </div>
          <div class="form-group">
               <label class="form-label">Closing<span class="text-danger">*</span></label>
               <input class="form-control" name="closing" value="{{ $timing->closing->toTimeString() }}" type="time" />
          </div>
          <div class="form-group">
               <label class="form-label">Off Day ?<span class="text-danger">*</span></label>
               <select name="is_off_day" class="form-control">
                    <option value="0" @if($timing->is_off_day == 0) selected @endif >No</option>
                    <option value="1" @if($timing->is_off_day == 1) selected @endif >Yes</option>
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