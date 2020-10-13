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
        <div class="content-body"><section class="card">
                <div id="invoice-template" class="card-body p-4">
                    <!-- Invoice Company Details -->
                    <div id="invoice-company-details" class="row">
                        <div class="col-sm-6 col-12">
                            <ul class="list-unstyled">
                                <li class="text-bold-800">{{ $booking->provider->full_name }}</li>
                                <li>4025 Oak Avenue,</li>
                                <li>Melbourne,</li>
                                <li>Florida 32940,</li>
                                <li>USA</li>
                            </ul>
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
                                        {{ Converter::from('currency.'.strtoupper($booking->currency->short_code))->to('currency.'.strtoupper($booking->provider->currency->short_code))->convert($booking->cost_total)->format() }}
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                    <!-- Invoice Company Details -->

                    <!-- Invoice Customer Details -->
                    <div id="invoice-customer-details" class="row pt-2">
                        <div class="col-12 text-center text-sm-left">
                            <p class="text-muted">Bill To</p>
                        </div>
                        <div class="col-sm-6 col-12 text-center text-sm-left">
                            <ul class="px-0 list-unstyled">
                                <li class="text-bold-800">Mr. Bret Lezama</li>
                                <li>4879 Westfall Avenue,</li>
                                <li>Albuquerque,</li>
                                <li>New Mexico-87102.</li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-12 text-center text-sm-right">
                            <p><span class="text-muted">Invoice Date :</span> 06/05/2019</p>
                            <p><span class="text-muted">Terms :</span> Due on Receipt</p>
                            <p><span class="text-muted">Due Date :</span> 10/05/2019</p>
                        </div>
                    </div>
                    <!-- Invoice Customer Details -->

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
                                            <p>Create PSD for mobile APP</p>
                                            <p class="text-muted">Simply dummy text of the printing and typesetting industry.
                                            </p>
                                        </td>
                                        <td class="text-right">$20.00/hr</td>
                                        <td class="text-right">120</td>
                                        <td class="text-right">$2400.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <p>iOS Application Development</p>
                                            <p class="text-muted">Pellentesque maximus feugiat lorem at cursus.</p>
                                        </td>
                                        <td class="text-right">$25.00/hr</td>
                                        <td class="text-right">260</td>
                                        <td class="text-right">$6500.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                            <p>WordPress Template Development</p>
                                            <p class="text-muted">Vestibulum convallis.</p>
                                        </td>
                                        <td class="text-right">$20.00/hr</td>
                                        <td class="text-right">300</td>
                                        <td class="text-right">$6000.00</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7 col-12 text-center text-sm-left">
                                <p class="lead">Payment Methods:</p>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-sm">
                                                <tbody>
                                                <tr>
                                                    <td>Bank name:</td>
                                                    <td class="text-right">ABC Bank, USA</td>
                                                </tr>
                                                <tr>
                                                    <td>Acc name:</td>
                                                    <td class="text-right">Amanda Orton</td>
                                                </tr>
                                                <tr>
                                                    <td>IBAN:</td>
                                                    <td class="text-right">FGS165461646546AA</td>
                                                </tr>
                                                <tr>
                                                    <td>SWIFT code:</td>
                                                    <td class="text-right">BTNPP34</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 col-12">
                                <p class="lead">Total due</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>Sub Total</td>
                                            <td class="text-right">$14,900.00</td>
                                        </tr>
                                        <tr>
                                            <td>TAX (12%)</td>
                                            <td class="text-right">$1,788.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-800">Total</td>
                                            <td class="text-bold-800 text-right"> $16,688.00</td>
                                        </tr>
                                        <tr>
                                            <td>Payment Made</td>
                                            <td class="pink text-right">(-) $4,688.00</td>
                                        </tr>
                                        <tr class="bg-grey bg-lighten-4">
                                            <td class="text-bold-800">Balance Due</td>
                                            <td class="text-bold-800 text-right">$12,000.00</td>
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
                            <div class="col-sm-5 col-12 text-center">
                                <button type="button" class="btn btn-info btn-print btn-lg my-1"><i class="la la-paper-plane-o mr-50"></i>
                                    Print
                                    Invoice</button>
                            </div>
                        </div>
                    </div>
                    <!-- Invoice Footer -->

                </div>
            </section>

        </div>
    </div>

@endsection
