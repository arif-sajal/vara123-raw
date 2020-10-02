@extends('administration.layout')
@push('title')
    Customers
@endpush

@push('page.vendor.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endpush

@section('mainContent')
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Customers</h4>
                            <button class="btn btn-success" style="margin-top:15px" data-toggle="modal" data-target="#myModal" data-content="{{ route('app.modal.customer.add') }}">Add Customer</button>
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

                        <div class="card-content ">
                            <div class="card-body table-responsive">
                                <table class="table table-striped table-bordered" data-table-type="datatable"
                                       data-table-name="CustomersTable" data-table-content="{{ route('app.table.customers')}}"
                                       style="width: 100%;">

                                    <thead>
                                    <tr>
                                        <th>ID#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page.vendor.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/vendors/css/forms/icheck/custom.css') }}">
@endpush

@push('page.js')
    <script>
        window.datatable.CustomersTable.columns = [
            { data: 'id', name: 'id'},
            { data: 'full_name', name: 'full_name'},
            { data: 'email', name: 'email'},
            { data: 'username', name: 'username'},
            { data: 'is_active', name: 'is_active'},
            { data: 'action', name: 'action', orderable: false },
        ];
    </script>
@endpush

@push('page.vendor.js')
    <script src="{{ asset('administration/app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('administration/app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
@endpush
