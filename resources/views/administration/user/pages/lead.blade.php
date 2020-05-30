@extends('user.layout')
@section('mainContent')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">@lang('breadcrumb.lead')</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">@lang('breadcrumb.dashboard')</a></li>
                            <li class="breadcrumb-item active">@lang('breadcrumb.lead')</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                    <button class="btn btn-info box-shadow-2 px-2 mr-1" type="button" data-toggle="modal" data-target="#myModalLarge" data-content="{{ route('user.modal.lead.add') }}">
                        <i class="la la-plus"></i>
                        Add Lead
                    </button>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="department">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Department</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="reload" data-type="table" data-elem="LeadsTable">
                                                <i class="ft-rotate-cw"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard table-responsive">
                                    <table class="table table-striped table-bordered" data-table-type="datatable" data-table-name="LeadsTable" data-table-content="{{ route('user.table.leads') }}" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Company</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Handlers</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Company</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Handlers</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="designation" style="display:none;">
                {{-- Load Dynamic Designations Table --}}
            </section>
        </div>
    </div>
@endsection
@push('page.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/pickers/daterange/daterange.css') }}">
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
    <script>
        window.datatable.LeadsTable.columns = [
            { data: 'lead_name', name: 'lead_name'},
            { data: 'company_name', name: 'company_name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'all_handlers', name: 'all_handlers', orderable: false},
            { data: 'action', name: 'action', orderable: false },
        ];

        window.datatable.LeadsTable.language = {
            'emptyTable': "@lang('module/department.table.element.empty-table')",
            'info': "@lang('module/department.table.element.info')",
            'infoEmpty': "@lang('module/department.table.element.info-empty')",
            'infoFiltered': "@lang('module/department.table.element.info-filtered')",
            'lengthMenu': "@lang('module/department.table.element.length-menu')",
            'search': "@lang('module/department.table.element.search')",
            'zeroRecords': "@lang('module/department.table.element.zero-records')",
            'paginate': {
                'first': "@lang('module/department.table.element.paginate.first')",
                'last': "@lang('module/department.table.element.paginate.last')",
                'previous': "@lang('module/department.table.element.paginate.previous')",
                'next': "@lang('module/department.table.element.paginate.next')",
            },
        };

        function showDesignations(department){
            $('#designation').load("{{ route('user.subview.designations') }}/"+department,function(data){
                $('#department').slideUp();
                $('#department').unblock();
            }).slideDown('slow');
        }

        $(document).on('click','[data-action="back"]',function(){
            getBack();
        });

        function getBack(){
            $('#department').slideDown();
            $('#designation').html("");
            $('#designation').slideUp();
        }
    </script>
@endpush
@push('page.vendor.js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
@endpush
