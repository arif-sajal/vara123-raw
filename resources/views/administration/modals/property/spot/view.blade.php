<div class="modal-header">
    <h5 class="modal-title">Spot View</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
     <div class="row">

          <div class="col-md-6">
               <h3>
                    <strong>Property Name</strong>
               </h3>  
               <p> {{ $spot->property->name }}</p>        
          </div>
          <div class="col-md-6">
               <h3>
                    <strong>Provider Name</strong>
               </h3>  
               <p>{{ $spot->provider->first_name }} {{ $spot->provider->last_name }}</p>        
          </div>
          <div class="col-md-6">
               <h3>
                    <strong>Total</strong>
               </h3>  
               <p>{{ $spot->total }}</p>        
          </div>
          <div class="col-md-6">
               <h3>
                    <strong>Available</strong>
               </h3>  
               <p>{{ $spot->available }}</p>        
          </div>
          <div class="col-md-12">
               <h3>
                    <strong>Booked</strong>
               </h3>  
               <p>{{ $spot->booked }}</p>        
          </div>
          <div class="col-md-12">
               <h3>
                    <strong>Description</strong>
               </h3>  
               <p>{{ $spot->description }}</p>        
          </div>
          <div class="col-md-6">
               <h3>
                    <strong>Image</strong>
               </h3>  
               @if(\Illuminate\Support\Facades\Storage::exists($spot->featured_image)) 
               <img src="{{ \Illuminate\Support\Facades\Storage::url($spot->featured_image) }}" width="100px" alt="vehicle image">
               @endif       
          </div>

     </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn" data-dismiss="modal">Close</button>
</div>
