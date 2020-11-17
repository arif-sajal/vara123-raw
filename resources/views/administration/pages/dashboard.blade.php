@extends('administration.layout')
@section('mainContent')
<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">

        <!-- dashboard main information card start -->
        <div class="row">

            <!-- total booking for admin start -->
            @if(auth('admin')->check())
            <div class="col-lg-4 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Total Booking</h6>
                                    <h3>{{ $all_booking->count() }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-book success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- total booking for admin end -->

            <!-- total booking for provider start -->
            @if(auth('provider')->check())
            <div class="col-lg-4 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Total Booking</h6>
                                    @php
                                    $all_booking_provider = App\Models\Booking::where('provider_id',auth('provider')->user()->id)->get();
                                    @endphp
                                    <h3>{{ $all_booking_provider->count() }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-book success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- total booking for provider end -->

            <!-- payment complete of total booking for admin start -->
            @if( auth('admin')->check() )
            <div class="col-lg-4 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Booking Payment Complete</h6>
                                    <h3>{{ $complete_payment->count() }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-check success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- payment complete of total booking for admin end -->

            <!-- payment complete of total booking for provider start -->
            @if( auth('provider')->check() )
            <div class="col-lg-4 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Booking Payment Complete</h6>
                                    @php
                                    $complete_payment_provider = 0;
                                    $complete_booking_payment = App\Models\BookingTransaction::where('is_payment_done',true)->get();
                                    foreach( $all_booking_provider as $single_booking_provider ):
                                        foreach( $complete_booking_payment as $single_complete_booking ):
                                            if( $single_complete_booking->booking_id == $single_booking_provider->id ):
                                                $complete_payment_provider += 1;
                                            endif;
                                        endforeach;
                                    endforeach;
                                    @endphp
                                    <h3>{{ $complete_payment_provider }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-check success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- payment complete of total booking for provider end -->

            <!-- total admin start -->
            @if(auth('admin')->check())
            <div class="col-lg-4 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Our Admin</h6>
                                    <h3>{{ $admin->count() }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-user-shield success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- total admin end -->

            <!-- provider start -->
            @if(auth('admin')->check())
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Our Provider</h6>
                                    <h3>{{ $provider->count() }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-users-cog success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- provider end -->

            <!-- customer start -->
            @if(auth('admin')->check())
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Our Customer</h6>
                                    <h3>{{ $customer->count() }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-users success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- customer end -->

            <!-- total sale start -->
            @if(auth('admin')->check())
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Successfull Payment Amount</h6>
                                    <h3>{{ $amount_success }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-lira-sign success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- total sale end -->

            <!-- total cities start -->
            @if(auth('admin')->check())
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Total City</h6>
                                    <h3>{{ $city->count() }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-city success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- total cities end -->

            <!-- total property for admin start -->
            @if( auth('admin')->check() )
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Total Property : {{ $all_property->count() }}</h4>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><i class="fas fa-university font-medium-3"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <p>Property Types
                                <span class="float-right text-bold-600">{{ $property_types->count() }}</span>
                            </p>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <p>Property Rooms
                                <span class="float-right text-bold-600">{{ $rooms->count() }}</span>
                            </p>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <p>Property Vehicles
                                <span class="float-right text-bold-600">{{ $vehicles->count() }}</span>
                            </p>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <p>Property Spots
                                <span class="float-right text-bold-600">{{ $spot->count() }}</span>
                            </p>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- total property for admin end -->

            <!-- total property for provider start -->
            @if( auth('provider')->check() )
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        @php
                        $all_property_provider = App\Models\Property::where('provider_id', auth('provider')->user()->id );
                        @endphp
                        <h4 class="card-title">Total Property : {{ $all_property_provider->count() }}</h4>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><i class="fas fa-university font-medium-3"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <p>Property Types
                                <span class="float-right text-bold-600">{{ $property_types->count() }}</span>
                            </p>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <p>Property Rooms
                                @php
                                $rooms_provider = App\Models\PropertyRoom::where('provider_id', auth('provider')->user()->id );
                                @endphp
                                <span class="float-right text-bold-600">{{ $rooms_provider->count() }}</span>
                            </p>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <p>Property Vehicles
                                @php
                                $vehicles_provider = App\Models\PropertyVehicle::where('provider_id', auth('provider')->user()->id );
                                @endphp
                                <span class="float-right text-bold-600">{{ $vehicles_provider->count() }}</span>
                            </p>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <p>Property Spots
                                @php
                                $spot_provider = App\Models\PropertySpot::where('provider_id', auth('provider')->user()->id );
                                @endphp
                                <span class="float-right text-bold-600">{{ $spot_provider->count() }}</span>
                            </p>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- total property for provider end -->

            <!--default amount start -->
            @if(auth('admin')->check())
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Default Amount</h4>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><i class="fas fa-percent font-medium-3"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        @if(auth('admin')->check())
                        <div class="card-body pt-0">
                            <p>Admin Booking Cut
                                <span class="float-right text-bold-600">{{ $config[2]->value }}%</span>
                            </p>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        @endif

                        <div class="card-body pt-0">
                            <p>Provider Booking Cut
                                <span class="float-right text-bold-600">{{ $config[3]->value }}%</span>
                            </p>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <p>Customer Tax Rate
                                <span class="float-right text-bold-600">{{ $config[4]->value }}%</span>
                            </p>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <p>Customer Booking Completion
                                <span class="float-right text-bold-600">{{ $config[4]->value }} Days</span>
                            </p>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!--default amount end -->


            <!-- total review  start -->
            @if(auth('admin')->check())
            <div class="col-lg-4 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Total Review</h6>
                                    <h3>{{ $review->count() }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-star success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- total review  end -->

            <!-- total  states start -->
            @if(auth('admin')->check())
            <div class="col-lg-3 col-12">

                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Total States</h6>
                                    <h3>{{ $states->count() }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-synagogue success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- total states end -->

            <!-- total amount booked for admin start -->
            @if( auth('admin')->check() )
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Total Amount Booked</h6>
                                    <h3>{{ $total_amount_booked }}$</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- total amount bookeds for admin end -->

            <!-- total amount booked for provider start -->
            @if( auth('provider')->check() )
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Total Amount Booked</h6>
                                    @php
                                    $all_booking_provider = App\Models\Booking::where('provider_id',auth('provider')->user()->id);
                                    $total_amount_booked_provider = $all_booking_provider->sum('cost_total');
                                    @endphp
                                    <h3>{{ $total_amount_booked_provider }}$</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- total amount bookeds for provider end -->

            <!-- todays sale start for admin -->
            @if( auth('admin')->check() )
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Todays Sale</h6>
                                    <h3>{{ $todays_amount }}$</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- todays sale end for admin -->

            <!-- todays sale start for provider -->
            @if( auth('provider')->check() )
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Todays Sale</h6>
                                    @php
                                        $todays_amount_provider = 0;
                                        $total_today_book_provider = 0;
                                        $complete_payment = App\Models\BookingTransaction::where('is_payment_done',true)->get();
                                        $all_booking_provider = App\Models\Booking::where('provider_id', auth('provider')->user()->id )->get();
                                        $today = \Carbon\Carbon::now()->toDateString();
                                        foreach( $all_booking_provider as $single_booking_provider ):
                                            foreach( $complete_payment as $single_payment ):
                                                if( $single_booking_provider->id == $single_payment->id ):
                                                    $payment_date = $single_payment->updated_at->toDateString();
                                                    $different_days = \Carbon\Carbon::parse($single_payment->updated_at)->diffInDays($today);
                                                    if( $different_days == 0 ):
                                                        $todays_amount_provider += $single_payment->amount;
                                                        $total_today_book_provider += 1;
                                                    endif;
                                                endif;
                                            endforeach;
                                        endforeach;
                                    @endphp
                                    <h3>{{ $todays_amount_provider }}$</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- todays sale end for provider -->

            <!-- todays sale for admin start -->
            @if( auth('admin')->check() )
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Total Booking Today</h6>
                                    <h3>{{ $total_today_book }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- todays sale for admin end -->

            <!-- todays sale for provider start -->
            @if( auth('provider')->check() )
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Total Booking Today</h6>
                                    <h3>{{ $total_today_book_provider }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- todays sale for provider end -->

            <!-- last one month for admin start -->
            @if( auth('admin')->check() )
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Last One Month Sale</h6>
                                    <h3>{{ $one_month_amount }}$</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- last one month for admin end -->

            <!-- last one month for provider start -->
            @if( auth('provider')->check() )
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Last One Month Sale</h6>
                                    @php
                                        $one_month_amount_provider = 0;
                                        $total_one_month_book_provider = 0;
                                        $complete_payment = App\Models\BookingTransaction::where('is_payment_done',true)->get();
                                        $all_booking_provider = App\Models\Booking::where('provider_id', auth('provider')->user()->id )->get();
                                        $today = \Carbon\Carbon::now()->toDateString();
                                        foreach( $all_booking_provider as $single_booking_provider ):
                                            foreach( $complete_payment as $single_payment ):
                                                if( $single_booking_provider->id == $single_payment->id ):
                                                    $payment_date = $single_payment->updated_at->toDateString();
                                                    $different_days = \Carbon\Carbon::parse($single_payment->updated_at)->diffInDays($today);
                                                    if( $different_days <= 30 ):
                                                        $one_month_amount_provider += $single_payment->amount;
                                                        $total_one_month_book_provider += 1;
                                                    endif;
                                                endif;
                                            endforeach;
                                        endforeach;
                                    @endphp
                                    <h3>{{ $one_month_amount_provider }}$</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- last one month for provider end -->

            <!-- last one month for admin start -->
            @if( auth('admin')->check() )
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Last One Month Booked</h6>
                                    <h3>{{ $total_one_month_book }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- last one month for admin end -->

            <!-- last one month for provider start -->
            @if( auth('provider')->check() )
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Last One Month Booked</h6>
                                    <h3>{{ $total_one_month_book_provider }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- last one month for provider end -->

            <!-- last one year start -->
            @if(auth('admin')->check())
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Last One Year Sale</h6>
                                    <h3>{{ $one_year_amount }}$</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- last one year end -->

            <!-- last one year for admin start -->
            @if(auth('admin')->check())
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Last One Year Booked</h6>
                                    <h3>{{ $total_one_year_book }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- last one year for admin end -->

            <!-- last one year for provider start -->
            @if(auth('provider')->check())
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Last One Year Sale</h6>
                                    @php
                                        $one_year_amount_provider = 0;
                                        $total_one_year_book_provider = 0;
                                        $complete_payment = App\Models\BookingTransaction::where('is_payment_done',true)->get();
                                        $all_booking_provider = App\Models\Booking::where('provider_id', auth('provider')->user()->id )->get();
                                        $today = \Carbon\Carbon::now()->toDateString();
                                        foreach( $all_booking_provider as $single_booking_provider ):
                                            foreach( $complete_payment as $single_payment ):
                                                if( $single_booking_provider->id == $single_payment->id ):
                                                    $payment_date = $single_payment->updated_at->toDateString();
                                                    $different_days = \Carbon\Carbon::parse($single_payment->updated_at)->diffInDays($today);
                                                    if( $different_days <= 365 ):
                                                        $one_year_amount_provider += $single_payment->amount;
                                                        $total_one_year_book_provider += 1;
                                                    endif;
                                                endif;
                                            endforeach;
                                        endforeach;
                                    @endphp
                                    <h3>{{ $one_year_amount_provider }}$</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- last one year for provider end -->
            
            
            <!-- last one year for provider start -->
            @if(auth('provider')->check())
            <div class="col-lg-3 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h6 class="text-muted">Last One Year Booked</h6>
                                    <h3>{{ $total_one_year_book_provider }}</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-money-bill success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- last one year for provider end -->

        </div>
        <!-- dashboard main information card END -->

        <!-- Revenue, Hit Rate & Deals -->
        <div class="row d-none">
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Revenue</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <div class="row mb-1">
                                <div class="col-6 col-md-4">
                                    <h5>Current week</h5>
                                    <h2 class="danger">$82,124</h2>
                                </div>
                                <div class="col-6 col-md-4">
                                    <h5>Previous week</h5>
                                    <h2 class="text-muted">$52,502</h2>
                                </div>
                            </div>
                            <div class="chartjs">
                                <canvas id="thisYearRevenue" width="400" style="position: absolute;"></canvas>
                                <canvas id="lastYearRevenue" width="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-header bg-hexagons">
                                <h4 class="card-title">Hit Rate
                                    <span class="danger">-12%</span>
                                </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show bg-hexagons">
                                <div class="card-body pt-0">
                                    <div class="chartjs">
                                        <canvas id="hit-rate-doughnut" height="275"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content collapse show bg-gradient-directional-danger ">
                                <div class="card-body bg-hexagons-danger">
                                    <h4 class="card-title white">Deals
                                        <span class="white">-55%</span>
                                        <span class="float-right">
                                            <span class="white">152</span>
                                            <span class="red lighten-4">/200</span>
                                        </span>
                                    </h4>
                                    <div class="chartjs">
                                        <canvas id="deals-doughnut" height="275"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h6 class="text-muted">Order Value </h6>
                                            <h3>$ 88,568</h3>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-trophy success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h6 class="text-muted">Calls</h6>
                                            <h3>3,568</h3>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-call-in danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Revenue, Hit Rate & Deals -->

        <!-- Emails Products & Avg Deals -->
        <div class="row d-none">
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Emails</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <p>Open rate
                                <span class="float-right text-bold-600">89%</span>
                            </p>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="pt-1">Sent
                                <span class="float-right">
                                    <span class="text-bold-600">310</span>/500</span>
                            </p>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-1">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Top Products</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a href="#">Show all</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="border-top-0">iPone X</th>
                                            <td class="border-top-0">2245</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">One Plus</th>
                                            <td>1850</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Samsung S7</th>
                                            <td>1550</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Average Deal Size</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-md-6 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                    <h6 class="danger text-bold-600">-30%</h6>
                                    <h4 class="font-large-2 text-bold-400">$12,536</h4>
                                    <p class="blue-grey lighten-2 mb-0">Per rep</p>
                                </div>
                                <div class="col-md-6 col-12 text-center">
                                    <h6 class="success text-bold-600">12%</h6>
                                    <h4 class="font-large-2 text-bold-400">$18,548</h4>
                                    <p class="blue-grey lighten-2 mb-0">Per team</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Emails Products & Avg Deals -->
        <!-- Total earning & Recent Sales  -->
        <div class="row d-none">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-content">
                        <div class="earning-chart position-relative">
                            <div class="chart-title position-absolute mt-2 ml-2">
                                <h1 class="display-4">$1,596</h1>
                                <span class="text-muted">Total Earning</span>
                            </div>
                            <canvas id="earning-chart" class="height-450"></canvas>
                            <div class="chart-stats position-absolute position-bottom-0 position-right-0 mb-2 mr-3">
                                <a href="#" class="btn round btn-danger mr-1 btn-glow">Statistics <i class="ft-bar-chart"></i></a>
                                <span class="text-muted">for the <a href="#" class="danger darken-2">last year.</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="recent-sales" class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Recent Sales</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="invoice-summary.html" target="_blank">View all</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content mt-1">
                        <div class="table-responsive">
                            <table id="recent-orders" class="table table-hover table-xl mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Product</th>
                                        <th class="border-top-0">Customers</th>
                                        <th class="border-top-0">Categories</th>
                                        <th class="border-top-0">Popularity</th>
                                        <th class="border-top-0">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-truncate">iPone X</td>
                                        <td class="text-truncate p-1">
                                            <ul class="list-unstyled users-list m-0">
                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle" src="{{ asset('administration/app-assets/images/portrait/small/avatar-s-4.png') }}" alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle" src="{{ asset('administration/app-assets/images/portrait/small/avatar-s-5.png') }}" alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Rebecca Jones" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle" src="{{ asset('administration/app-assets/images/portrait/small/avatar-s-6.png') }}" alt="Avatar">
                                                </li>
                                                <li class="avatar avatar-sm">
                                                    <span class="badge badge-info">+8 more</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-danger round">Mobile</button>
                                        </td>
                                        <td>
                                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="text-truncate">$ 1200.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">iPad</td>
                                        <td class="text-truncate p-1">
                                            <ul class="list-unstyled users-list m-0">
                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle" src="{{ asset('administration/app-assets/images/portrait/small/avatar-s-7.png') }}" alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle" src="{{ asset('administration/app-assets/images/portrait/small/avatar-s-8.png') }}" alt="Avatar">
                                                </li>
                                                <li class="avatar avatar-sm">
                                                    <span class="badge badge-info">+5 more</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-success round">Tablet</button>
                                        </td>
                                        <td>
                                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="text-truncate">$ 1190.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">OnePlus</td>
                                        <td class="text-truncate p-1">
                                            <ul class="list-unstyled users-list m-0">
                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle" src="{{ asset('administration/app-assets/images/portrait/small/avatar-s-1.png') }}" alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle" src="{{ asset('administration/app-assets/images/portrait/small/avatar-s-2.png') }}" alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Rebecca Jones" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle" src="{{ asset('administration/app-assets/images/portrait/small/avatar-s-3.png') }}" alt="Avatar">
                                                </li>
                                                <li class="avatar avatar-sm">
                                                    <span class="badge badge-info">+3 more</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-danger round">Mobile</button>
                                        </td>
                                        <td>
                                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="text-truncate">$ 999.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">ZenPad</td>
                                        <td class="text-truncate p-1">
                                            <ul class="list-unstyled users-list m-0">
                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle" src="{{ asset('administration/app-assets/images/portrait/small/avatar-s-11.png') }}" alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle" src="{{ asset('administration/app-assets/images/portrait/small/avatar-s-12.png') }}" alt="Avatar">
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-success round">Tablet</button>
                                        </td>
                                        <td>
                                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="text-truncate">$ 1150.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate">Pixel 2</td>
                                        <td class="text-truncate p-1">
                                            <ul class="list-unstyled users-list m-0">
                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle" src="{{ asset('administration/app-assets/images/portrait/small/avatar-s-6.png') }}" alt="Avatar">
                                                </li>
                                                <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                                    <img class="media-object rounded-circle" src="{{ asset('administration/app-assets/images/portrait/small/avatar-s-4.png') }}" alt="Avatar">
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-danger round">Mobile</button>
                                        </td>
                                        <td>
                                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="text-truncate">$ 1180.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total earning & Recent Sales  -->
        <!-- Analytics map based session -->
        <div class="row d-none">
            <div class="col-12">
                <div class="card box-shadow-0">
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-9 col-12">
                                <div id="world-map-markers" class="height-450"></div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="card-body text-center">
                                    <h4 class="card-title mb-0">Visitors Sessions</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="pb-1">Sessions by Browser</p>
                                            <div id="sessions-browser-donut-chart" class="height-200"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="sales pr-2 pt-2">
                                                <div class="sales-today mb-2">
                                                    <p class="m-0">Today's
                                                        <span class="success float-right"><i class="ft-arrow-up success"></i> 6.89%</span>
                                                    </p>
                                                    <div class="progress progress-sm mt-1 mb-0">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="sales-yesterday">
                                                    <p class="m-0">Yesterday's
                                                        <span class="danger float-right"><i class="ft-arrow-down danger"></i> 4.18%</span>
                                                    </p>
                                                    <div class="progress progress-sm mt-1 mb-0">
                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Analytics map based session -->
    </div>
</div>
@endsection
@push('page.js')
<script src="{{ asset('administration/app-assets/js/scripts/pages/dashboard-sales.js') }}" type="text/javascript"></script>
@endpush
@push('page.vendor.js')
<script src="{{ asset('administration/app-assets/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('administration/app-assets/vendors/js/charts/raphael-min.js') }}" type="text/javascript"></script>
<script src="{{ asset('administration/app-assets/vendors/js/charts/morris.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('administration/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('administration/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') }}" type="text/javascript"></script>
<script src="{{ asset('administration/app-assets/data/jvector/visitor-data.js') }}" type="text/javascript"></script>
@endpush
@push('page.css')
<link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/vendors/css/charts/morris.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/fonts/simple-line-icons/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('administration/app-assets/css/core/colors/palette-gradient.css') }}">
@endpush
@push('title')
Dashboard
@endpush