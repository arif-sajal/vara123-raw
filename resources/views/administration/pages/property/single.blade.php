@extends('administration.layout')

@section('mainContent')
    <div class="content-wrapper">
        <div class="content-detached content-left">
            <div class="content-body">
                <section class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-12 p-2 pl-3">
                                            <div class="">
                                                <h2>{{ $property->name }} ({{ $property->property_type->name }})</h2>
                                                <div class="rating warning mb-1">
                                                    @for($rv=1;$rv <= 5; $rv++)
                                                        @if($property->reviews()->avg('average') >= $rv)
                                                            <i class="la la-star"></i>
                                                        @else
                                                            <i class="la la-star-o"></i>
                                                        @endif
                                                    @endfor
                                                    {{ $property->reviews()->count() }} Reviews
                                                </div>
                                                <p>{{ $property->description }}</p>
                                            </div>

                                            @if($property->property_type->identity === 'accommodation')
                                                <h2 class="py-2">{{ $property->rooms()->count() }} Rooms</h2>
                                            @elseif($property->property_type->identity === 'vehicle_rental')
                                                <h2 class="py-2">{{ $property->vehicles()->count() }} Vehicles</h2>
                                            @elseif($property->property_type->identity === 'parking_lot')
                                                <h2 class="py-2">{{ $property->spots()->count() }} Spots</h2>
                                            @endif

                                            <a href="{{ route('admin.property.edit',$property->id) }}" class="btn btn-info btn-glow text-uppercase p-1">Edit</a>
                                        </div>
                                        <div class="col-xl-6 col-md-12">
                                            @if(\Illuminate\Support\Facades\Storage::has($property->featured_image))
                                                <img class="img-fluid" src="{{ \Illuminate\Support\Facades\Storage::url($property->featured_image) }}" alt="Card image cap">
                                            @else
                                                <img class="img-fluid" src="{{ \Illuminate\Support\Facades\Storage::url($property->property_type->property_featured_image_not_found) }}" alt="Card image cap">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-header p-0">
                                <ul class="nav nav-tabs nav-underline no-hover-bg">
                                    <li class="nav-item" data-tab-url="{{ route('admin.property.view',[$property->id,'tab'=>\Illuminate\Support\Str::camel($property->property_type->item)]) }}">
                                        <a class="nav-link active" id="active-tab" data-toggle="tab" data-href="#tabView" data-content="{{ route('admin.tab.item.list',[$property->property_type->identity,$property->id]) }}" aria-controls="active" aria-expanded="true">{{ $property->property_type->item }}</a>
                                    </li>
                                    @foreach($tabs as $tab)
                                        <li class="nav-item" data-tab-url="{{ route('admin.property.view',[$property->id,'tab'=>\Illuminate\Support\Str::camel($tab)]) }}">
                                            <a class="nav-link @if(request()->has('tab') && request()->get('tab') == \Illuminate\Support\Str::camel($tab)) active @endif" id="active-tab" data-toggle="tab" data-href="#tabView" data-content="{{ route('admin.tab.item.list',[$tab,$property->id]) }}" aria-controls="active" aria-expanded="true">{{ $tab }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tabView" aria-labelledby="active-tab" aria-expanded="true"></div>
                        </div>

                    </div>
                </section>

            </div>
        </div>

        <div class="sidebar-detached sidebar-right">
            <div class="sidebar">
                <div class="project-sidebar-content">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Project Details</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <!-- project search -->
                            <div class="card-body border-top-blue-grey border-top-lighten-5">
                                <div class="project-search">
                                    <div class="project-search-content">
                                        <form action="#">
                                            <div class="position-relative">
                                                <input type="search" class="form-control" placeholder="Search project task, bug, users...">
                                                <div class="form-control-position">
                                                    <i class="la la-search text-size-base text-muted"></i>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /project search -->
                            <!-- project progress -->
                            <div class="card-body">
                                <div class="insights">
                                    <p>Project Overall Progress
                                        <span class="float-right text-warning h3">72%</span>
                                    </p>
                                    <div class="progress progress-sm mt-1 mb-0">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 72%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- project progress -->
                        </div>
                    </div>
                    <!-- Project Overview -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Project Overview</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p>
                                    <strong>Pellentesque habitant morbi tristique</strong> senectus et netus
                                    et malesuada fames ac turpis egestas. Vestibulum tortor quam,
                                    feugiat vitae.
                                    <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend
                                    leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum
                                    erat wisi, condimentum sed, <code>commodo vitae</code>, ornare
                                    sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum,
                                    eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.
                                    <a href="#">Donec non enim</a>.</p>
                                <p>
                                    <strong>Lorem ipsum dolor sit</strong>
                                </p>
                                <ol>
                                    <li>Consectetuer adipiscing</li>
                                    <li>Aliquam tincidunt mauris</li>
                                    <li>Consectetur adipiscing</li>
                                    <li>Vivamus pretium ornare</li>
                                    <li>Curabitur massa</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!--/ Project Overview -->
                    <!-- Project Users -->
                    <div class="card">
                        <div class="card-header mb-0">
                            <h4 class="card-title">Project Users</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-content">
                                <div class="card-body  py-0 px-0">
                                    <div class="list-group">
                                        <a href="javascript:void(0)" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left pr-1">
                            <span class="avatar avatar-sm avatar-online rounded-circle">
                              <img src="../../../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>
                                                </div>
                                                <div class="media-body w-100">
                                                    <h6 class="media-heading mb-0">Margaret Govan</h6>
                                                    <p class="font-small-2 mb-0 text-muted">Project Owner</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left pr-1">
                            <span class="avatar avatar-sm avatar-busy rounded-circle">
                              <img src="../../../app-assets/images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span>
                                                </div>
                                                <div class="media-body w-100">
                                                    <h6 class="media-heading mb-0">Bret Lezama</h6>
                                                    <p class="font-small-2 mb-0 text-muted">Project Manager</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left pr-1">
                            <span class="avatar avatar-sm avatar-online rounded-circle">
                              <img src="../../../app-assets/images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span>
                                                </div>
                                                <div class="media-body w-100">
                                                    <h6 class="media-heading mb-0">Carie Berra</h6>
                                                    <p class="font-small-2 mb-0 text-muted">Senior Developer</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left pr-1">
                            <span class="avatar avatar-sm avatar-away rounded-circle">
                              <img src="../../../app-assets/images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span>
                                                </div>
                                                <div class="media-body w-100">
                                                    <h6 class="media-heading mb-0">Eric Alsobrook</h6>
                                                    <p class="font-small-2 mb-0 text-muted">UI Developer</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left pr-1">
                            <span class="avatar avatar-sm avatar-busy rounded-circle">
                              <img src="../../../app-assets/images/portrait/small/avatar-s-7.png" alt="avatar"><i></i></span>
                                                </div>
                                                <div class="media-body w-100">
                                                    <h6 class="media-heading mb-0">Berra Eric</h6>
                                                    <p class="font-small-2 mb-0 text-muted">UI Developer</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Project Users -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('title')
    Property - {{ $property->name }}
@endpush

@push('page.vendor.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endpush

@push('page.vendor.js')
    <script src="{{ asset('administration/app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
@endpush

