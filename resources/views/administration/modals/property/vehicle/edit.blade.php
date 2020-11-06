<div class="modal-header">
     <h5 class="modal-title">Vehicle View</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
     </button>
</div>
<div class="modal-body">

     <form class="ajax-form" action="{{ route('app.form.submission.property.vehicle.update',$vehicle->id) }}" method="POST">
          <div class="modal-body">

               <div class="form-group">
                    <label class="form-label">Vehicle Model<span class="text-danger">*</span></label>
                    <select name="vehicle_model" class="form-control select2">
                         @foreach(\App\Models\VehicleModel::all() as $model)
                         <option value="{{ $model->id }}" @if($model->id == $vehicle->vehicle_model_id) selected @endif >{{ $model->manufacturer->name }} {{ $model->model_name }} {{ $model->model_year }}</option>
                         @endforeach
                    </select>
               </div>

               <div class="form-group">
                    <label class="form-label">Description<span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control">{{ $vehicle->description }}</textarea>
               </div>

               <div class="form-group">
                    <label class="form-label">Total Vehicle<span class="text-danger">*</span></label>
                    <input class="form-control" name="total" value="{{ $vehicle->total }}" type="text" placeholder="Total Room" />
               </div>
               
               <div class="form-group">

                    <label class="form-label">Billings<span class="text-danger">*</span></label>

                    @foreach(\App\Models\BillingType::all() as $key => $billing)
                    <div class="row">
                         <div class="col-md-6">
                              <input type="text" class="form-control" value="{{ $billing->type }}" disabled>
                         </div>

                         <div class="col-md-6">
                              <div class="form-group">
                                   <div class="input-group">
                                        <input type="text" class="form-control" value="{{ $vehicle->billings[$key]->amount }}" placeholder="Price Per {{ $billing->per }}" name="price[{{ $billing->id }}]">
                                        <div class="input-group-append">
                                             <span class="input-group-text">{{ $property->provider->currency->symbol }}</span>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    @endforeach

               </div>

          </div>
          <div class="modal-footer">
               <button type="button" class="btn" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Update</button>
          </div>
     </form>

</div>
<div class="modal-footer">
     <button type="button" class="btn" data-dismiss="modal">Close</button>
</div>