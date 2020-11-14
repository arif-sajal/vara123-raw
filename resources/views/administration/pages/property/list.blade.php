@extends('administration.layout')
@section('mainContent')
<div class="content-wrapper">

    <div class="content-body">
        <section>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Properties</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header p-0">
                            <ul class="nav nav-tabs nav-underline no-hover-bg">
                                @foreach($property_type as $key => $tab)
                                <li class="nav-item"
                                    data-tab-url="{{ route('app.property.all.property.view',[strtolower($tab)]) }}">
                                    <a class="nav-link @if(request()->has('tab') && request()->get('tab') == \Illuminate\Support\Str::camel($tab)) active @endif"
                                        id="active-tab" data-toggle="tab" data-href="#tabView"
                                        data-content="{{ route('app.tab.item.property.list',[strtolower($tab)] ) }}"
                                        aria-controls="active" aria-expanded="true">{{ $tab }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tabView" aria-labelledby="active-tab"
                            aria-expanded="true">
                            <div class="row" style="margin-bottom: 15px">
                                <div class="col-md-12">
                                    <input type="text" class="form-control search" placeholder="Search...">
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



                </div>
            </div>
        </section>

    </div>
</div>
@endsection

@push('title')
Properties
@endpush

@push('page.js')
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
@endpush