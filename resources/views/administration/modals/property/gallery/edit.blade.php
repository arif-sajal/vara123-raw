<div class="modal-header">
     <h5 class="modal-title">Edit Gallery</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
     </button>
</div>
<form class="ajax-form" action="{{ route('app.form.submission.property.gallery.update',$gallery->id) }}" method="POST">
     <div class="modal-body">

          <div class="form-group">
               <label class="form-label">Gallery Image<span class="text-danger">*</span></label> <br> <br>
               @if(\Illuminate\Support\Facades\Storage::exists($gallery->image)) 
               <img src="{{ \Illuminate\Support\Facades\Storage::url($gallery->image) }}" width="50px" alt=""> <br> <br>
               @endif
               <input type="file" name="image" class="form-control-file dropify">
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