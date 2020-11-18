<div class="modal-content">
     <div class="modal-header">
          <h4 class="modal-title">Add New City</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
          </button>
     </div>
     <form action="{{ route('app.form.submission.setting.city.add') }}" class="ajax-form" method="post" enctype="multipart/form-data">
          <div class="modal-body">
               <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                              <label>Select Country</label>
                              <select name="country_id" class="form-control">
                                   @foreach( App\Models\Country::all() as $country )
                                   <option value="{{ $country->id }}">{{ $country->name }}</option>
                                   @endforeach
                              </select>
                         </div>
                    </div>
                    <div class="col-md-12">
                         <div class="form-group">
                              <label>Select State</label>
                              <select name="state_id" class="form-control">
                                   @foreach( App\Models\State::all() as $state )
                                   <option value="{{ $state->id }}">{{ $state->name }}</option>
                                   @endforeach
                              </select>
                         </div>
                    </div>
                    <div class="col-md-12">
                         <div class="form-group">
                              <label>City Name</label>
                              <input type="text" class="form-control" name="name">
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