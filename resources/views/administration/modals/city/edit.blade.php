<div class="modal-content">
     <div class="modal-header">
          <h4 class="modal-title">Edit City</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
          </button>
     </div>
     <form action="{{ route('app.form.submission.setting.city.update', $city->id) }}" class="ajax-form" method="post" enctype="multipart/form-data">
          <div class="modal-body">
               <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                              <label>Select Country</label>
                              <select name="country_id" class="form-control">
                                   @foreach( App\Models\Country::all() as $country )
                                   <option value="{{ $country->id }}"  @if( $country->id == $city->country_id ) selected @endif >{{ $country->name }}</option>
                                   @endforeach
                              </select>
                         </div>
                    </div>
                    <div class="col-md-12">
                         <div class="form-group">
                              <label>Select State</label>
                              <select name="state_id" class="form-control">
                                   @foreach( App\Models\State::all() as $state )
                                   <option value="{{ $state->id }}" @if( $state->id == $city->state_id ) selected @endif >{{ $state->name }}</option>
                                   @endforeach
                              </select>
                         </div>
                    </div>
                    <div class="col-md-12">
                         <div class="form-group">
                              <label>City Name</label>
                              <input type="text" class="form-control" name="name" value="{{ $city->name }}">
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