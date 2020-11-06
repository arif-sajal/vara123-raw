<div class="modal-header">
     <h5 class="modal-title">Add Property spot</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
     </button>
</div>
<form class="ajax-form" action="{{ route('app.form.submission.property.spot.add',$property->id) }}" method="POST">
     <div class="modal-body">

          <div class="form-group">
               <label class="form-label">Property spot name<span class="text-danger">*</span></label>
               <input class="form-control" name="name" type="text" placeholder="Name" />
          </div>

          <div class="form-group">
               <label class="form-label">Description<span class="text-danger">*</span></label>
               <textarea name="description" class="form-control"></textarea>
          </div>
          <div class="form-group">
               <label class="form-label">Total <span class="text-danger">*</span></label>
               <input class="form-control" name="total" type="text" placeholder="Total" />
          </div>
          <div class="form-group">
               <label class="form-label">Available <span class="text-danger">*</span></label>
               <input class="form-control" name="available" type="text" placeholder="Available" />
          </div>
          <div class="form-group">
               <label class="form-label">Booked <span class="text-danger">*</span></label>
               <input class="form-control" name="booked" type="text" placeholder="Booked" />
          </div>
          <div class="form-group">
               <label class="form-label">Select Provider <span class="text-danger">*</span></label>
               <select name="provider" class="select2" style="width:100%;">
                    @foreach( $providers as $provider )
                    <option value="{{ $provider->id }}">{{ $provider->first_name }} {{ $provider->last_name }}</option>
                    @endforeach
               </select>
          </div>
          <div class="form-group">
               <label class="form-label">Image </label>
               <input class="form-control-file" name="image" type="file"/>
          </div>

     </div>
     <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
     </div>
</form>

<script src="{{ asset('administration/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>

<script>
     $('.select2').select2();
     $('.bed-repeater').repeater();
</script>