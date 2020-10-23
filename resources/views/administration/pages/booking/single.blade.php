@extends('administration.layout')
@push('title')
  Booking #{{ $booking->id }}
@endpush


@section('mainContent')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Invoice Template</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Invoice</a>
                            </li>
                            <li class="breadcrumb-item active">Invoice Template
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right">
                    <button class="btn btn-info dropdown-toggle mb-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                    <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
                    </div>
                </div>
            </div>
        </div>

        @php
            $vat = \Library\Configs\Facades\Configs::get('default_customer_tax_rate') / 100;
            $total_vat_price = $booking->cost_total * $vat;
            $total_price = $total_vat_price + $booking->cost_total;
        @endphp

        <div class="content-body"><section class="card">
                <div id="invoice-template" class="card-body p-4">
                    <!-- Invoice Company Details -->
                    <div id="invoice-company-details" class="row">
                        <div class="col-sm-6 col-12">
                            <!-- Invoice property details start -->
                            <ul class="list-unstyled">
                                <li class="text-bold-800"><b>Property Information</b></li>
                                <li class="text-bold-800"> <b>Title :</b> {{ $booking->property->property_type->title }}</li>
                                <li class="text-bold-800"> <b>Type :</b> {{ $booking->property->property_type->name }}</li>
                                <li class="text-bold-800"> <b>Identity :</b> {{ $booking->property->property_type->identity }}</li>
                            </ul>
                            <!-- Invoice property details end -->
                        </div>
                        <div class="col-sm-6 col-12 text-center text-sm-right">
                            <h2>BOOKING</h2>
                            <p class="pb-sm-3"># BOOK-{{ $booking->id }}</p>
                            @if($booking->is_payment_done)
                                <div class="badge border-success success badge-square badge-border">
                                    <h1 class="mb-0">Paid</h1>
                                </div>
                            @else
                                <ul class="px-0 list-unstyled">
                                    <li>Payment Due</li>
                                    <li class="lead text-bold-800">
                                        {{
                                            Converter::from('currency.'.strtoupper($booking->currency->short_code))
                                                ->to('currency.'.strtoupper($booking->provider->currency->short_code))
                                                ->convert($total_price)->format()
                                        }}
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                    <!-- Invoice Company Details -->

                    <!-- Invoice Provider Details -->
                    @if( auth('admin')->check() )
                    <div id="invoice-customer-details" class="row pt-2">
                        <div class="col-12 text-center text-sm-left">
                            <p class="text-muted"><b>Provider Information</b></p>
                        </div>
                        <div class="col-sm-6 col-12 text-center text-sm-left">
                            <ul class="px-0 list-unstyled">
                                <li class="text-bold-800"> <b>Name :</b> {{ $booking->provider->full_name }}</li>
                                <li> <b>Email :</b> {{ $booking->provider->email }}</li>
                                <li> <b>Phone :</b> {{ $booking->provider->phone ? $booking->provider->phone : 'N/A' }}</li>
                                <li> <b>Address :</b> {{ $booking->provider->address ? $booking->provider->address : 'N/A'  }}</li>
                                <li> <b>Provider Will Get :</b>
                                    {{
                                        Converter::from('currency.'.strtoupper($booking->currency->short_code))
                                            ->to('currency.'.strtoupper($booking->provider->currency->short_code))
                                            ->convert($booking->provider_cut)->format()
                                    }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-12 text-center text-sm-right">
                            <p><span class="text-muted">Invoice Date :</span> {{ $booking->created_at->toDayDateTimeString() }}</p>
                            <p><span class="text-muted">Terms :</span> Due on Receipt</p>
                            <p><span class="text-muted">Due Date :</span> 10/05/2019</p>
                        </div>
                    </div>
                    @endif
                    <!-- Invoice Provider Details -->

                    <!-- Invoice Items Details -->
                    <div id="invoice-items-details" class="pt-2">
                        <div class="row">
                            <div class="table-responsive col-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item &amp; Description</th>
                                        <th class="text-right">Rate</th>
                                        <th class="text-right">Hours</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            @if(  $booking->item_type == 'App\Models\PropertyRoom' )
                                                @php
                                                    $room = $booking->item_type::find($booking->item_id);
                                                @endphp
                                                <p>
                                                    {{ $room->room_type }}
                                                </p>
                                                <p class="text-muted">
                                                    {{ $room->description }}
                                                </p>
                                            @elseif( $booking->item_type == 'App\Models\PropertySpot' )
                                                @php
                                                    $spot = $booking->item_type::find($booking->item_id);
                                                @endphp
                                                <p>
                                                    {{ $spot->name }}
                                                </p>
                                                <p class="text-muted">
                                                    {{ $spot->description ? $spot->description : 'N/A' }}
                                                </p>
                                            @elseif( $booking->item_type == 'App\Models\PropertyVehicle' )
                                                @php
                                                    $vehicle = $booking->item_type::find($booking->item_id);
                                                    $vehicle_model = App\Models\VehicleModel::find($vehicle->vehicle_model_id);
                                                @endphp
                                                <p>
                                                    {{ $vehicle_model->model_name }}
                                                </p>
                                            @endif
                                        </td>
                                        <td class="text-right">${{ $booking->billing->amount }}/{{ $booking->billing->billing_type->per }}</td>
                                        @php
                                            $from = \Carbon\Carbon::parse($booking->from_time);
                                            $to = \Carbon\Carbon::parse($booking->to_time);
                                            $hour = $to->diffInHours($from);
                                        @endphp
                                        <td class="text-right">{{ $hour }}hr</td>
                                        <td class="text-right">${{ $booking->cost_total }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7 col-12 text-center text-sm-left">

                            </div>
                            <div class="col-sm-5 col-12">
                                <p class="lead">Total due</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>Sub Total</td>
                                            <td class="text-right">
                                                {{
                                                    \Cartalyst\Converter\Laravel\Facades\Converter::from('currency.'.strtoupper($booking->currency->short_code))
                                                        ->to('currency.'.strtoupper($booking->provider->currency->short_code))
                                                        ->convert($booking->cost_total)->format()
                                                }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>TAX ({{ \Library\Configs\Facades\Configs::get('default_customer_tax_rate') }}%)</td>
                                            <td class="text-right">
                                                {{
                                                    \Cartalyst\Converter\Laravel\Facades\Converter::from('currency.'.strtoupper($booking->currency->short_code))
                                                        ->to('currency.'.strtoupper($booking->provider->currency->short_code))
                                                        ->convert($total_vat_price)->format()
                                                }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-800">Total</td>
                                            <td class="text-bold-800 text-right">
                                                {{
                                                    \Cartalyst\Converter\Laravel\Facades\Converter::from('currency.'.strtoupper($booking->currency->short_code))
                                                        ->to('currency.'.strtoupper($booking->provider->currency->short_code))
                                                        ->convert($total_price)->format()
                                                }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Payment Made</td>
                                            <td class="pink text-right">
                                                {{
                                                    \Cartalyst\Converter\Laravel\Facades\Converter::from('currency.'.strtoupper($booking->currency->short_code))
                                                        ->to('currency.'.strtoupper($booking->provider->currency->short_code))
                                                        ->convert(\App\Models\Transaction::where('booking_id',$booking->id)->sum('amount') - $total_price)->format()
                                                }}
                                            </td>
                                        </tr>
                                        <tr class="bg-grey bg-lighten-4">
                                            <td class="text-bold-800">Payment Due</td>
                                            <td class="text-bold-800 text-right">
                                                {{
                                                    \Cartalyst\Converter\Laravel\Facades\Converter::from('currency.'.strtoupper($booking->currency->short_code))
                                                        ->to('currency.'.strtoupper($booking->provider->currency->short_code))
                                                        ->convert($total_price - \App\Models\Transaction::where('booking_id',$booking->id)->sum('amount'))->format()
                                                }}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    <p class="mb-0 mt-1">Authorized person</p>
                                    <img src="../../../app-assets/images/pages/signature-scan.png" alt="signature" class="height-100">
                                    <h6>Amanda Orton</h6>
                                    <p class="text-muted">Managing Director</p>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Invoice Footer -->
                    <div id="invoice-footer">
                        <div class="row">
                            <div class="col-sm-7 col-12 text-center text-sm-left">
                                <h6>Terms &amp; Condition</h6>
                                <p>Test pilot isn't always the healthiest business.</p>
                            </div>
                            @if( auth('provider')->check() )
                            <div class="col-sm-5 col-12 text-center">
                                @if( $booking->transaction->is_payment_done == 0 )
                                <button class="btn btn-info btn-print btn-lg my-1" data-action-route="{{ route('app.modal.paynow.modal',$booking->id) }}" data-action='confirm'  data-hover='tooltip'
                                data-original-title='Paymet Confirmation'>
                                    Pay now
                                </button>
                                @endif

                                @if( $booking->to_date->toDateString() < Carbon\Carbon::now()->toDateString() )
                                    @if( $booking->provider_completion == 0 )
                                    <button class="btn btn-info btn-print btn-lg my-1" data-action='confirm' data-action-route="{{ route('app.modal.booking.providerCompletion',$booking->id) }}"  data-hover='tooltip'
                                    data-original-title='Booking Completion'>
                                        Booking Completion
                                    </button>
                                    @endif
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- Invoice Footer -->

                </div>
            </section>

        </div>
    </div>

@endsection
