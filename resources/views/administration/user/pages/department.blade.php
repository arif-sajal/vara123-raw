@extends('user.layout')
@section('mainContent')
    <div class="content-wrapper">
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
                                        @can('create.department')
                                            <li>
                                                @component('compo.buttons.addSm')
                                                    @slot('icon')
                                                        ft-plus
                                                    @endslot
                                                    @slot('attributes')
                                                        data-toggle="modal"
                                                        data-target="#myModal"
                                                        data-content="{{ route('user.modal.department.add') }}"
                                                        data-hover="tooltip"
                                                        data-original-title="@lang('module/department.tooltip.add-department')"
                                                    @endslot
                                                    @lang('module/department.button.add')
                                                @endcomponent
                                            </li>
                                            <li>
                                                @component('compo.buttons.addSm')
                                                    @slot('icon')
                                                        ft-plus
                                                    @endslot
                                                    @slot('attributes')
                                                        data-toggle="modal"
                                                        data-target="#myModal"
                                                        data-content="{{ route('user.modal.designation.add') }}"
                                                        data-hover="tooltip"
                                                        data-original-title="@lang('module/department.tooltip.add-designation')"
                                                    @endslot
                                                    @lang('module/designation.button.add')
                                                @endcomponent
                                            </li>
                                        @endcan
                                        <li>
                                            @component('compo.buttons.reloadSm')
                                                @slot('icon')
                                                    ft-rotate-cw
                                                @endslot
                                                @slot('attributes')
                                                    data-action="reload"
                                                    data-type="table"
                                                    data-elem="DepartmentsTable"
                                                    data-hover="tooltip"
                                                    data-original-title="@lang('module/department.tooltip.reload')"
                                                @endslot
                                            @endcomponent
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard table-responsive">
                                    <table class="table table-striped table-bordered" data-table-type="datatable" data-table-name="DepartmentsTable" data-table-content="{{ route('user.table.departments') }}" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>@lang('module/department.table.heading.department')</th>
                                                <th>@lang('module/department.table.heading.note')</th>
                                                <th>@lang('module/department.table.heading.designations')</th>
                                                <th>@lang('module/department.table.heading.users')</th>
                                                <th>@lang('module/department.table.heading.status')</th>
                                                <th>@lang('module/department.table.heading.action')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>@lang('module/department.table.heading.department')</th>
                                                <th>@lang('module/department.table.heading.note')</th>
                                                <th>@lang('module/department.table.heading.designations')</th>
                                                <th>@lang('module/department.table.heading.users')</th>
                                                <th>@lang('module/department.table.heading.status')</th>
                                                <th>@lang('module/department.table.heading.action')</th>
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
@endpush
@push('page.vendor.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/custom.css') }}">
@endpush
@push('page.js')
    <script src="{{ asset('app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <script>
        var name = 'DepartmentsTable';

        window.datatable[name].columns = [
            { data: 'department', name: 'department'},
            { data: 'note', name: 'note' },
            { data: 'designations_count', name: 'designations_count' },
            { data: 'users_count', name: 'users_count' },
            { data: 'active', name: 'active'},
            { data: 'action', name: 'action', orderable: false },
        ];

        window.datatable[name].language = {
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
