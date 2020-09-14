@extends('user.layout')
@section('mainContent')
    <div class="content-wrapper">
        <div class="content-body">
            <section id="department">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@lang('module/stock/item.heading')</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" data-content="{{ route('user.modal.stock.item.add') }}" data-hover="tooltip" data-original-title="@lang('module/stock/item.tooltip.addItem')">
                                                <i class="ft-plus"></i> @lang('module/stock/item.button.add')
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn btn-success btn-sm" data-action="reload" data-type="table" data-elem="ItemsTable" data-hover="tooltip" data-original-title="@lang('module/stock/item.tooltip.reload')">
                                                <i class="ft-rotate-cw"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard table-responsive">
                                    <table class="table table-striped table-bordered" data-table-type="datatable" data-table-name="ItemsTable" data-table-content="{{ route('user.table.stock.item') }}" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>@lang('module/stock/item.table.heading.name')</th>
                                                <th>@lang('module/stock/item.table.heading.description')</th>
                                                <th>@lang('module/stock/item.table.heading.group')</th>
                                                <th>@lang('module/stock/item.table.heading.unitType')</th>
                                                <th>@lang('module/stock/item.table.heading.unitCost')</th>
                                                <th>@lang('module/stock/item.table.heading.action')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>@lang('module/stock/item.table.heading.name')</th>
                                                <th>@lang('module/stock/item.table.heading.description')</th>
                                                <th>@lang('module/stock/item.table.heading.group')</th>
                                                <th>@lang('module/stock/item.table.heading.unitType')</th>
                                                <th>@lang('module/stock/item.table.heading.unitCost')</th>
                                                <th>@lang('module/stock/item.table.heading.action')</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        window.datatable.ItemsTable.columns = [
            { data: 'name', name: 'name'},
            { data: 'description', name: 'description' },
            { data: 'group', name: 'group' },
            { data: 'unit_cost', name: 'unit_cost' },
            { data: 'unit_type', name: 'unit_type' },
            { data: 'action', name: 'action', orderable: false },
        ];

        window.datatable.ItemsTable.language = {
            'emptyTable': "@lang('module/stock/item.table.element.empty-table')",
            'info': "@lang('module/stock/item.table.element.info')",
            'infoEmpty': "@lang('module/stock/item.table.element.info-empty')",
            'infoFiltered': "@lang('module/stock/item.table.element.info-filtered')",
            'lengthMenu': "@lang('module/stock/item.table.element.length-menu')",
            'search': "@lang('module/stock/item.table.element.search')",
            'zeroRecords': "@lang('module/stock/item.table.element.zero-records')",
            'paginate': {
                'first': "@lang('module/stock/item.table.element.paginate.first')",
                'last': "@lang('module/stock/item.table.element.paginate.last')",
                'previous': "@lang('module/stock/item.table.element.paginate.previous')",
                'next': "@lang('module/stock/item.table.element.paginate.next')",
            },
        };
    </script>
@endpush
@push('page.vendor.js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
@endpush
