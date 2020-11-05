<div class="modal-header">
    <h5 class="modal-title">Vehicle View</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
     <div class="row">

          <div class="col-md-6">
               <h3>
                    <strong>Vehicle Model</strong>
               </h3>  
               <p> {{ $vehicle->model->model_name }}</p>        
          </div>
          <div class="col-md-6">
               <h3>
                    <strong>Property Name</strong>
               </h3>  
               <p>{{ $vehicle->property->name }}</p>        
          </div>
          <div class="col-md-6">
               <h3>
                    <strong>Provider Name</strong>
               </h3>  
               <p>{{ $vehicle->provider->first_name }} {{ $vehicle->provider->last_name }}</p>        
          </div>
          <div class="col-md-6">
               <h3>
                    <strong>Total</strong>
               </h3>  
               <p>{{ $vehicle->total }}</p>        
          </div>
          <div class="col-md-6">
               <h3>
                    <strong>Available</strong>
               </h3>  
               <p>{{ $vehicle->available }}</p>        
          </div>
          <div class="col-md-6">
               <h3>
                    <strong>Booked</strong>
               </h3>  
               <p>{{ $vehicle->booked }}</p>        
          </div>
          <div class="col-md-6">
               <h3>
                    <strong>Description</strong>
               </h3>  
               <p>{{ $vehicle->description }}</p>        
          </div>
          <div class="col-md-6">
               <h3>
                    <strong>Image</strong>
               </h3>  
               @if(\Illuminate\Support\Facades\Storage::exists($vehicle->featured_image)) 
               <img src="{{ \Illuminate\Support\Facades\Storage::url($vehicle->featured_image) }}" width="100px" alt="vehicle image">
               @endif       
          </div>

     </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn" data-dismiss="modal">Close</button>
</div>
