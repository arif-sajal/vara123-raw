<div class="tab-content">
     <div role="tabpanel" class="tab-pane active" id="tabView" aria-labelledby="active-tab" aria-expanded="true">
          <div class="row" style="margin-bottom: 15px">
               <div class="col-md-12">
                   <input type="text"  class="form-control search" placeholder="Search...">
               </div>
           </div>
           <div class="no_result_found">
            <div class="alert alert-warning">No Result Found</div>
        </div>
          <div class="row search_container">
               @each('administration.compo.block.singleProperty',$properties,'property')
          </div>
          {{ $properties->onEachSide(2)->links() }}
     </div>
</div>

<script>
     $(document).ready(function(){
         $(".search").on('input', function(v){
             let value = v.target.value
             $.ajax({
                 type: 'GET',
                 url : '/search/'+value,
                 dataType : "json",
                 success:function(data){
                   
                     $(".search_container").empty();
                     if(data.property.length == 0){
                            $(".no_result_found").show();
                        }

                     jQuery.each(data.property, function(key,value){
                        
                        $(".no_result_found").hide();
                        
                         $(".search_container").append(`
                             <div class="col-xl-4 col-md-6 col-sm-12 search_card" >
                                 <div class="card">
                                     <div class="card-content">
                                         <div class="card-body">
                                             <h4 class="card-title">${value.name}</h4>
                                             <h6 class="card-subtitle text-muted">${value.address}</h6>
                                         </div>
                                             <img class="img-fluid" src="${value.image}" alt="Card image cap">
                                         <div class="card-body">
                                             <p class="card-text"><strong>Property Type : </strong>${value.type}</p>
                                             <p class="card-text"><strong>Description : </strong>${value.desc}</p>
                                         </div>
 
                                         <div class="btn-group btn-block" role="group" aria-label="Basic example">
                                             <a href="${value.view_route}" type="button" class="btn btn-success w-100">
                                                 <i class="la la-eye"></i>
                                             </a>
                                             <a href="${value.edit_route}" class="btn btn-primary w-100">
                                                 <i class="la la-pencil"></i>
                                             </a>
                                             <button class="btn btn-danger w-100 style="margin-top:15px" data-toggle="modal" data-target="#myModal" data-content="${value.delete_route}">
                                                 <i class="la la-trash-o"></i>
                                             </button>
                                         </div>
 
                                     </div>
                                 </div> 
                             </div>
                         `);
                     });
                 }
             })
         })
     })
 
</script>