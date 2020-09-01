@extends('administration.layout')
@push('title')
  Bookings
@endpush


@push('page.vendor.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endpush


@section('mainContent')
  <div class="card">
      <div class="card-header">
              <h4>All Bookings</h4>
      </div>

      <div class="card-content ">
          <div class="card-body table-responsive">
              <table class="table table-striped table-bordered" data-table-type="datatable"
              data-table-name="BookingTable" data-table-content="{{ route('admin.table.bookings')}}"
               style="width: 100%;">

                  <thead>
                      <tr>
                        <th>ID#</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>From Time</th>
                        <th>To Time</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Is-P-Done</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>ID#</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>From Time</th>
                        <th>To Time</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Is-P-Done</th>
                        <th>Action</th>
                      </tr>
                  </tfoot>
              </table>
          </div>
      </div>
  </div>

  <script>
      initiateDatatable('BookingTable');
      window.datatable.BookingTable.columns = [
          { data: 'id', name: 'id'},
          { data: 'from_date', name: 'from_date'},
          { data: 'to_date', name: 'to_date'},
          { data: 'from_time', name: 'from_time'},
          { data: 'to_time', name: 'to_time'},
          { data: 'quantity', name: 'quantity'},
          { data: 'total', name: 'total'},
          { data: 'quantity', name: 'quantity'},
          { data: 'is_payment_done', name: 'is_payment_done'},
          { data: 'action', name: 'action', orderable: false },
      ];

      var $this = $("[data-table-name='BookingTable']");
      var name = 'BookingTable';
      window[name] = $this.DataTable(
          window.datatable[name]
      );
  </script>

@endsection


@push('page.vendor.js')
    <script src="{{ asset('administration/app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
@endpush
