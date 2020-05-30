@extends('user.layout')
@section('mainContent')
    <div class="content-wrapper">
        <div class="content-body">
            <section id="department">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@lang('module/account.Heading')</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        @can('create.account')
                                            <li>
                                                @component('compo.buttons.addSm')
                                                    @slot('icon')
                                                        ft-plus
                                                    @endslot
                                                    @slot('attributes')
                                                        data-toggle="modal"
                                                        data-target="#myModal"
                                                        data-content="{{ route('user.modal.account.add') }}"
                                                        data-hover="tooltip"
                                                        data-original-title="@lang('module/account.tooltip.add-account')"
                                                    @endslot
                                                    @lang('module/account.button.add')
                                                @endcomponent
                                            </li>
                                        @endif
                                        <li>
                                            @component('compo.buttons.reloadSm')
                                                @slot('icon')
                                                    ft-rotate-cw
                                                @endslot
                                                @slot('attributes')
                                                    data-action="reload"
                                                    data-type="table"
                                                    data-elem="AccountsTable"
                                                    data-hover="tooltip"
                                                    data-original-title="@lang('module/account.tooltip.reload')"
                                                @endslot
                                            @endcomponent
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard table-responsive">
                                    <table class="table table-striped table-bordered" data-table-type="datatable" data-table-name="AccountsTable" data-table-content="{{ route('user.table.accounts') }}" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>@lang('module/account.table.heading.name')</th>
                                                <th>@lang('module/account.table.heading.number')</th>
                                                <th>@lang('module/account.table.heading.note')</th>
                                                <th>@lang('module/account.table.heading.initialBalance')</th>
                                                <th>@lang('module/account.table.heading.currentBalance')</th>
                                                <th>@lang('module/account.table.heading.status')</th>
                                                <th>@lang('module/account.table.heading.action')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>@lang('module/account.table.heading.name')</th>
                                                <th>@lang('module/account.table.heading.number')</th>
                                                <th>@lang('module/account.table.heading.note')</th>
                                                <th>@lang('module/account.table.heading.initialBalance')</th>
                                                <th>@lang('module/account.table.heading.currentBalance')</th>
                                                <th>@lang('module/account.table.heading.status')</th>
                                                <th>@lang('module/account.table.heading.action')</th>
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
@endpush
@push('page.vendor.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/custom.css') }}">
@endpush
@push('page.js')
    <script src="{{ asset('app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <script>
        window.datatable.AccountsTable.columns = [
            { data: 'account_name', name: 'account_name'},
            { data: 'account_number', name: 'account_number' },
            { data: 'note', name: 'note' },
            { data: 'initial_balance', name: 'initial_balance' },
            { data: 'current_balance', name: 'current_balance'},
            { data: 'status', name: 'status'},
            { data: 'action', name: 'action', orderable: false },
        ];

        window.datatable.AccountsTable.language = {
            'emptyTable': "@lang('module/account.table.element.empty-table')",
            'info': "@lang('module/account.table.element.info')",
            'infoEmpty': "@lang('module/account.table.element.info-empty')",
            'infoFiltered': "@lang('module/account.table.element.info-filtered')",
            'lengthMenu': "@lang('module/account.table.element.length-menu')",
            'search': "@lang('module/account.table.element.search')",
            'zeroRecords': "@lang('module/account.table.element.zero-records')",
            'paginate': {
                'first': "@lang('module/account.table.element.paginate.first')",
                'last': "@lang('module/account.table.element.paginate.last')",
                'previous': "@lang('module/account.table.element.paginate.previous')",
                'next': "@lang('module/account.table.element.paginate.next')",
            },
        };
    </script>
@endpush
@push('page.vendor.js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
@endpush
