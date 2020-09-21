@extends('administration.layout')
@push('title')
New Pending Bookings
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
                          <h4 class="card-title"> New Pending Bookings</h4>
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
                                     data-table-name="BookingsTable" data-table-content="{{ route('app.table.bookings')}}"
                                     style="width: 100%;">

                                  <thead>
                                  <tr>
                                      <th>ID#</th>
                                      <th>Provider</th>
                                      <th>Property</th>
                                      <th>From</th>
                                      <th>To</th>
                                      <th>Total</th>
                                      <th>Payment</th>
                                      <th>Action</th>
                                  </tr>
                                  </thead>

                                  <tfoot>
                                  <tr>
                                      <th>ID#</th>
                                      <th>Provider</th>
                                      <th>Property</th>
                                      <th>From</th>
                                      <th>To</th>
                                      <th>Total</th>
                                      <th>Payment</th>
                                      <th>Action</th>
                                  </tr>
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
@endpush

@push('page.js')
    <script>
        window.datatable.BookingsTable.columns = [
            { data: 'id', name: 'id'},
            { data: 'provider_name', name: 'provider_name'},
            { data: 'property_name', name: 'property_name'},
            { data: 'booking_from', name: 'booking_from'},
            { data: 'booking_to', name: 'booking_to'},
            { data: 'total_price', name: 'total_price'},
            { data: 'is_payment_done', name: 'is_payment_done'},
            { data: 'action', name: 'action', orderable: false },
        ];
    </script>
@endpush

@push('page.vendor.js')
    <script src="{{ asset('administration/app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
@endpush
