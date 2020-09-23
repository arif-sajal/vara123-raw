@extends('administration.layout')
@section('mainContent')
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Settings</h4>
                        </div>
                        <div class="card-content">
                            <div class="nav-vertical">
                                <ul class="nav nav-pills flex-column nav-pill-toolbar">
                                    @foreach ($tabs as $tab)

                                        <li class="nav-item" data-tab-url="{{ route('app.setting.view',['tab1'=>Str::camel($tab['name'])]) }}">
                                            <a class="nav-link @if((request()->has('tab1') && request()->tab1 == Str::camel($tab['name'])) || (!request()->has('tab1') && $loop->first)) active @endif" data-toggle="tab" data-href="#tabView" data-content="{{ route('app.tab.setting.'.$tab['route'],['tab1'=>Str::camel($tab['name']),'tab2'=>request()->tab2]) }}" aria-expanded="true">
                                                <i class="la {{ $tab['icon'] }}"></i> {{ $tab['name'] }}
                                            </a>
                                        </li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tabView" aria-labelledby="active-tab" aria-expanded="true"></div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@push('page.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/fonts/simple-line-icons/style.min.css') }}">
@endpush
@push('page.vendor.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/vendors/css/forms/icheck/custom.css') }}">
@endpush
@push('page.js')
    <script src="{{ asset('administration/app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
@endpush
@push('page.vendor.js')
    <script src="{{ asset('administration/app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
@endpush
