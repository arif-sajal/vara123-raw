<div class="card-header border-bottom-danger">
     <h4 class="card-title">Configs</h4>
</div>
<div class="card-content">
     <div class="row">
          <div class="col-12">
               <div class="card">
                    <div class="card-content collapse show">
                         <div class="card-body card-dashboard">
                              <form action="{{ route('app.form.submission.setting.config.update') }}" class="ajax-form" method="post" enctype="multipart/form-data">
                                   
                                   <div class="row">
                                        <div class="col-md-12">
                                             <div class="form-group">
                                                  <label>Default Currency</label>
                                                  <input type="text" class="form-control" value="{{ $configs[0]->value }}" name="value[]">
                                             </div>
                                             <div class="form-group">
                                                  <label>Default Image</label> <br>
                                                  @if(\Illuminate\Support\Facades\Storage::exists($configs[1]->value)) 
                                                  <img src="{{ \Illuminate\Support\Facades\Storage::url($configs[1]->value) }}" width="100px" alt=""> <br> <br>
                                                  @endif
                                                  <input type="file" class="form-control-file" name="image">
                                             </div>
                                             <div class="form-group">
                                                  <label>Admin Booking Cut</label>
                                                  <input type="text" class="form-control" value="{{ $configs[2]->value }}" name="value[]">
                                             </div>
                                             <div class="form-group">
                                                  <label>Provider Booking Cut</label>
                                                  <input type="text" class="form-control" value="{{ $configs[3]->value }}" name="value[]">
                                             </div>
                                             <div class="form-group">
                                                  <label>Tax</label>
                                                  <input type="text" class="form-control" value="{{ $configs[4]->value }}" name="value[]">
                                             </div>
                                             <div class="form-group">
                                                  <label>Customer Completion</label>
                                                  <input type="text" class="form-control" value="{{ $configs[5]->value }}" name="value[]">
                                             </div>
                                             <div class="form-group">
                                                  <button type="submit" class="btn btn-outline-primary">Update Information</button>
                                             </div>
                                        </div>
                                   </div>
                                   
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>


<script>

</script>