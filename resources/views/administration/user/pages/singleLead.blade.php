@extends('user.layout')
@section('mainContent')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Lead Summary</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Lead</a>
                            </li>
                            <li class="breadcrumb-item active">Lead Summary
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                    <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons</a></div>
                </div>
            </div>
        </div>
        <div class="content-detached content-left">
            <div class="content-body">
                <section class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-head">
                                <div class="card-header">
                                    <h4 class="card-title">{{ $lead->lead_name }}</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <span class="badge badge-default badge-warning">{{ $lead->priority->priority }} Priority</span>
                                        <span class="badge badge-default badge-success">{{ $lead->status->status }}</span>
                                        <span class="badge badge-default badge-info">iOS</span>
                                    </div>
                                </div>
                                <div class="px-1">
                                    <ul class="list-inline list-inline-pipe text-center p-1 border-bottom-grey border-bottom-lighten-3">
                                        <li>Company Name :
                                            <span class="text-muted">{{ $lead->company_name }}</span>
                                        </li>
                                        <li>Business Type:
                                            <span class="text-muted">{{ $lead->businessType->type }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- project-info -->
                            <div id="project-info" class="card-body row">
                                <div class="project-info-count col-lg-4 col-md-12">
                                    <div class="project-info-icon">
                                        <h2>{{ $lead->handlers()->count() }}</h2>
                                        <div class="project-info-sub-icon">
                                            <span class="la la-user"></span>
                                        </div>
                                    </div>
                                    <div class="project-info-text pt-1">
                                        <h5>Lead Handlers</h5>
                                    </div>
                                </div>
                                <div class="project-info-count col-lg-4 col-md-12">
                                    <div class="project-info-icon">
                                        <h2>{{ $lead->tasks()->count() }}</h2>
                                        <div class="project-info-sub-icon">
                                            <span class="la la-calendar-check-o"></span>
                                        </div>
                                    </div>
                                    <div class="project-info-text pt-1">
                                        <h5>Lead Task</h5>
                                    </div>
                                </div>
                                <div class="project-info-count col-lg-4 col-md-12">
                                    <div class="project-info-icon">
                                        <h2>{{ $lead->calls()->count() }}</h2>
                                        <div class="project-info-sub-icon">
                                            <span class="la la-bug"></span>
                                        </div>
                                    </div>
                                    <div class="project-info-text pt-1">
                                        <h5>Lead Calls</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- project-info -->
                        </div>
                    </div>
                </section>
                <!-- Task Progress -->
                <section class="row">
                    <div class="col-md-12">
                        <div class="card mb-0">
                            <div class="card-header p-0">
                                <ul class="nav nav-tabs nav-underline no-hover-bg">
                                    @foreach($tabs as $tab)
                                        <li class="nav-item" data-tab-url="{{ route('user.lead',[$lead,'tab'=>Str::camel($tab)]) }}">
                                            <a class="nav-link @if((request()->has('tab') && request()->tab == Str::camel($tab)) || (!request()->has('tab') && $loop->first)) active @endif" id="active-tab" data-toggle="tab" data-href="#tabView" data-content="{{ route('user.tab.lead',[$lead->id,\Illuminate\Support\Str::camel($tab)]) }}" aria-controls="active" aria-expanded="true">{{ $tab }}</a>
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
                    <!-- Project Users -->
                    <div class="card">
                        <div class="card-header mb-0">
                            <h4 class="card-title">Lead Handlers</h4>
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
                                        @foreach ($lead->handlers as $handler)

                                            <a href="javascript:void(0)" class="list-group-item">
                                                <div class="media">
                                                    <div class="media-left pr-1">
                                                        <span class="avatar avatar-sm avatar-online rounded-circle">
                                                            @if(Storage::has($handler->profile->image))
                                                                <img src="{{ Storage::url($handler->profile->image) }}" alt="avatar"><i></i>
                                                            @else
                                                                <img src="{{ Storage::url(config('default_user_avatar')) }}" alt="avatar"><i></i>
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <div class="media-body w-100">
                                                        <h6 class="media-heading mb-0">{{ $handler->profile->full_name }}</h6>
                                                        <p class="font-small-2 mb-0 text-muted">{{ $handler->profile->phone }}</p>
                                                    </div>
                                                </div>
                                            </a>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/pickers/daterange/daterange.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/project.css') }}">
@endpush
@push('page.vendor.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
@endpush
@push('page.vendor.js')
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}" type="text/javascript"></script>
@endpush
@push('page.js')
    <script src="{{ asset('app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
@endpush
@push('page.vendor.js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
@endpush
