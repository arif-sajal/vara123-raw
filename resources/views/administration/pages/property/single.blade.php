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

                                            <a href="{{ route('app.property.edit',$property->id) }}" class="btn btn-info btn-glow text-uppercase p-1">Edit</a>
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
                                    <li class="nav-item" data-tab-url="{{ route('app.property.view',[$property->id,'tab'=>\Illuminate\Support\Str::camel($property->property_type->item)]) }}">
                                        <a class="nav-link @if(request()->has('tab') && request()->get('tab') == strtolower($property->property_type->item)) active @endif @if(!request()->has('tab')) active @endif" id="active-tab" data-toggle="tab" data-href="#tabView" data-content="{{ route('app.tab.item.list',[$property->property_type->identity,$property->id]) }}" aria-controls="active" aria-expanded="true">{{ $property->property_type->item }}</a>
                                    </li>
                                    @foreach($tabs as $tab)
                                        <li class="nav-item" data-tab-url="{{ route('app.property.view',[$property->id,'tab'=>\Illuminate\Support\Str::camel(strtolower($tab))]) }}">
                                            <a class="nav-link @if(request()->has('tab') && request()->get('tab') == \Illuminate\Support\Str::camel($tab)) active @endif" id="active-tab" data-toggle="tab" data-href="#tabView" data-content="{{ route('app.tab.item.list',[strtolower($tab),$property->id]) }}" aria-controls="active" aria-expanded="true">{{ $tab }}</a>
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
                            <h4 class="card-title">Things To Know</h4>
                            {!! $property->house_rule !!}
                        </div>
                    </div>
                    <!-- Project Overview -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Terms & Condition</h4>
                            {!! $property->health_safety !!}
                        </div>
                    </div>
                    <!--/ Project Overview -->
                    <!-- Project Users -->
                    <div class="card">
                        <div class="card-header mb-0">
                            <h4 class="card-title">Cancellation Policy</h4>
                            {!! $property->cancellation_policy !!}
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
