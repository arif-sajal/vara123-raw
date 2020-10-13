@extends('administration.layout')
@push('title')
  Single Booking View ({{ $booking->id }})
@endpush


@section('mainContent')
<!-- BEGIN: Content-->
<br>
  <h1 class="text-center mb-3 text-dark text-uppercase" style="font-weight:bold;">Booking Details Information
    <span class="text-success">(#{{$booking->id }})</span>
      <a style="font-weight:bold;" class="btn btn-warning btn-sm text-dark pull-right mr-2"
       href="{{ route('app.booking.list')}}"> Go Back</a>
  </h1>

    <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Single Booking Filters </h3>
          </div>
        </div>
        <div class="content-body"><!-- account setting page start -->

<section id="page-account-settings">
    <div class="row">
        <!-- left menu section -->
        <div class="col-md-3 mb-2 mb-md-0">
            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                <li class="nav-item">
                    <a class="nav-link d-flex active customer-sohan" id="account-pill-general" data-toggle="pill"
                        href="#customer-info" aria-expanded="true">
                        <i class="la la-users"></i>
                          <span>Customer Data</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex provider-sohan" id="account-pill-password" data-toggle="pill" href="#provider-info"
                        aria-expanded="false">
                        <i class="la la-user"></i>
                        <span>Provider Details</span>
                  </a>
                </a>
              </li>

              <li class="nav-item">
                  <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill"
                   href="#property-data"
                      aria-expanded="false">
                      <i class="la la-cube"></i>
                      <span>Property Data</span>
                </a>
              </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill" href="#time-date"
                    aria-expanded="false">
                    <i class="la la-clock-o"></i>
                    <span>Time & Date</span>
              </a>
            </a>
          </li>

          <li class="nav-item">
              <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill" href="#payment-info"
                  aria-expanded="false">
                  <i class="la la-cc-mastercard"></i>
                  <span>Payment Info</span>
            </a>
          </a>
        </li>
            </ul>
        </div>

        <!-- right content section -->
        <div class="col-md-9">
            <div class="card">

                <div class="card-content">
                    <div class="card-body">
                        <div class="tab-content">

                          {{-- Customer Data Start --}}
                            <div role="tabpanel" class="tab-pane active" id="customer-info"
                                aria-labelledby="account-pill-general" aria-expanded="true">
                                <h1 class="text-center mb-2"><i class="la la-users" style="font-size:30px;"></i> Customer Data</h1>
                                  <h5 class="mb-1 text-info text-uppercase"><i class="ft-info"></i> Basic Information</h5>
                                <table class="table table-borderless">
                                  <tbody>
                                    <tr>
                                      <td>First Name :</td>
                                      <td class="text-primary">{{ $booking->customer->first_name }}</td>
                                    </tr>
                                    <tr>
                                      <td>Last Name :</td>
                                      <td class="text-primary">{{ $booking->customer->last_name }}</td>
                                    </tr>
                                    <tr>
                                      <td>Username :</td>
                                      <td class="text-primary">{{ $booking->customer->username }}</td>
                                    </tr>
                                    <tr>
                                      <td>Gender :</td>
                                      <td class="text-primary">{{ $booking->customer->gender }}</td>
                                    </tr>
                                    <tr>
                                      <td>Avatar :</td>
                                      <td><img class="img-rounded" style="height:100px; " src="{{url('storage/administration/customer/'.$booking->avatar)}}" alt="customer.png"></td>
                                    </tr>
                                  </tbody>
                                </table>

                                <h5 class="mb-1 text-info text-uppercase"><i class="ft-info"></i> Details Information</h5>
                                <table class="table table-borderless mb-0">
                                  <tbody>
                                    <tr>
                                      <td>NID # :</td>
                                      <td class="text-primary">{{ $booking->customer->nid_number }}</td>
                                    </tr>
                                    <tr>
                                      <td>Address :</td>
                                      <td class="text-primary">{{ $booking->customer->address }}</td>
                                    </tr>
                                    <tr>
                                      <td>Country :</td>
                                      <td class="text-primary">{{ $booking->customer->country }}</td>
                                    </tr>
                                    <tr>
                                      <td>State :</td>
                                      <td class="text-primary">{{ $booking->customer->state }}</td>
                                    </tr>
                                    <tr>
                                      <td>City :</td>
                                      <td class="text-primary">{{ $booking->customer->city }}</td>
                                    </tr>
                                    <tr>
                                      <td>Post Code :</td>
                                      <td class="text-primary">{{ $booking->customer->post_code }}</td>
                                    </tr>

                                    <tr>
                                      <td>Date-of-Birth :</td>
                                      <td class="text-primary">{{ $booking->customer->date_of_birth }}</td>
                                    </tr>
                                    <tr>
                                      <td>Email :</td>
                                      <td class="text-primary">{{ $booking->customer->email }}</td>
                                    </tr>
                                    <tr>
                                      <td>Phone :</td>
                                      <td class="text-primary">{{ $booking->customer->phone }}</td>
                                    </tr>
                                    <tr>
                                      <td>Emergerncy-CN # :</td>
                                      <td class="text-primary">{{ $booking->customer->emergency_contact_number }}</td>
                                    </tr>
                                    <tr>
                                      <td>Birth Certifcate # :</td>
                                      <td class="text-primary">{{ $booking->customer->birth_certificate_number }}</td>
                                    </tr>
                                    <tr>
                                      <td>Ban Reason :</td>
                                      <td class="text-primary">{{ $booking->customer->ban_reason }}</td>
                                    </tr>
                                    <tr>
                                      <td>Active Status :</td>
                                      <td>
                                        @if($booking->customer->is_active == 1)
                                          <span class="badge badge-success">Active</span>
                                        @else
                                          <span class="badge badge-danger">Inactive</span>
                                        @endif
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Email Varified Status :</td>
                                      <td>
                                        @if($booking->customer->is_email_varified == 1)
                                          <span class="badge badge-success">Varified</span>
                                        @else
                                          <span class="badge badge-danger">Not Varified</span>
                                        @endif
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Created At :</td>
                                      <td class="text-primary">{{ $booking->customer->created_at->format('d-m-Y') }} || {{ $booking->customer->created_at->format('h:m a') }}</td>
                                    </tr>
                                    <tr>
                                      <td>Updated At :</td>
                                      <td class="text-primary">{{ $booking->customer->updated_at->format('d-m-Y') }} || {{ $booking->customer->updated_at->format('h:m a') }}</td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                          {{-- Customer Data End --}}

                          {{-- Provider Data Start --}}
                            <div class="tab-pane fade " id="provider-info" role="tabpanel"
                                aria-labelledby="account-pill-password" aria-expanded="false">
                                  <h1 class="text-center mb-2"><i class="la la-user" style="font-size:30px;"></i> Provider Details</h1>
                                <h5 class="mb-1 text-info text-uppercase"><i class="ft-info"></i> Basic Information</h5>
                              <table class="table table-borderless">
                                <tbody>
                                  <tr>
                                    <td>First Name :</td>
                                    <td class="text-primary">{{ $booking->provider->first_name }}</td>
                                  </tr>
                                  <tr>
                                    <td>Last Name :</td>
                                    <td class="text-primary">{{ $booking->provider->last_name }}</td>
                                  </tr>
                                  <tr>
                                    <td>Username :</td>
                                    <td class="text-primary">{{ $booking->provider->username }}</td>
                                  </tr>
                                  <tr>
                                    <td>Gender :</td>
                                    <td class="text-primary">{{ $booking->provider->gender }}</td>
                                  </tr>
                                  <tr>
                                    <td>Avatar :</td>
                                    <td><img class="img-rounded" style="height:100px; " src="{{url('storage/administration/provider/'.$booking->avatar)}}" alt="customer.png"></td>
                                  </tr>
                                </tbody>
                              </table>

                              <h5 class="mb-1 text-info text-uppercase"><i class="ft-info"></i> Details Information</h5>
                              <table class="table table-borderless mb-0">
                                <tbody>
                                  <tr>
                                    <td>Date-of-Birth :</td>
                                    <td class="text-primary">{{ $booking->provider->date_of_birth }}</td>
                                  </tr>
                                  <tr>
                                    <td>Email :</td>
                                    <td class="text-primary">{{ $booking->provider->email }}</td>
                                  </tr>
                                  <tr>
                                    <td>Phone :</td>
                                    <td class="text-primary">{{ $booking->provider->phone }}</td>
                                  </tr>
                                  <tr>
                                    <td>Ban Reason :</td>
                                    <td class="text-primary">{{ $booking->provider->ban_reason }}</td>
                                  </tr>
                                  <tr>
                                    <td>Currency Name :</td>
                                    <td class="text-primary">{{ $booking->provider->currency->name }}</td>
                                  </tr>
                                  <tr>
                                    <td>User Type :</td>
                                    <td>
                                      @if( $booking->provider->user_type === 'Organization')
                                      <span class="ml-1 text-info">Organization</span>
                                      @else
                                      <span class="ml-1 text-info">Individual</span>
                                      @endif
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Email Varified Status :</td>
                                    <td>
                                      @if($booking->provider->is_email_varified == 1)
                                        <span class="badge badge-success">Varified</span>
                                      @else
                                        <span class="badge badge-warning">Not Varified</span>
                                      @endif
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Phone Varified Status :</td>
                                    <td>
                                      @if($booking->provider->is_phone_varified == 1)
                                        <span class="badge badge-success">Varified</span>
                                      @else
                                        <span class="badge badge-warning">Not Varified</span>
                                      @endif
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Active Status :</td>
                                    <td>
                                      @if($booking->provider->is_active == 1)
                                        <span class="badge badge-success">Active</span>
                                      @else
                                        <span class="badge badge-danger">Inactive</span>
                                      @endif
                                    </td>
                                  </tr>
                                  <tr>
                                    <td> Registration Varified Status :</td>
                                    <td>
                                      @if($booking->provider->is_registration_varified == 1)
                                        <span class="badge badge-success">Varified</span>
                                      @else
                                        <span class="badge badge-warning">Not Varified</span>
                                      @endif
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Created At :</td>
                                    <td class="text-primary">{{ $booking->provider->created_at->format('d-m-Y') }} || {{ $booking->provider->created_at->format('h:m a') }}</td>
                                  </tr>
                                  <tr>
                                    <td>Updated At :</td>
                                    <td class="text-primary">{{ $booking->provider->updated_at->format('d-m-Y') }} || {{ $booking->provider->updated_at->format('h:m a') }}</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          {{-- Provider Data End --}}

                          {{-- Provider Data Start --}}
                            <div class="tab-pane fade" id="property-data" role="tabpanel"
                              aria-labelledby="account-pill-info" aria-expanded="false">
                            <h1 class="text-center mb-2"><i class="la la-cube" style="font-size:30px;"></i> Property Data</h1>
                            <h5 class="mb-1 text-info text-uppercase"><i class="ft-info"></i> Basic Information</h5>
                            <table class="table table-borderless">
                              <tbody>
                                <tr>
                                  <td>Property type :</td>
                                  <td class="text-primary">{{ $booking->property->property_type->name }}</td>
                                </tr>
                                <tr>
                                  <td>Provider Username :</td>
                                  <td class="text-primary">{{ $booking->property->provider->username }}</td>
                                </tr>
                                <tr>
                                  <td>Currency Name :</td>
                                  <td class="text-primary">{{ $booking->property->currency->name }}</td>
                                </tr>
                                <tr>
                                  <td>Property Name :</td>
                                  <td class="text-primary">{{ $booking->property->name}}</td>
                                </tr>
                                <tr>
                                  <td>Feature Image :</td>
                                  <td>  <img class="img-rounded" style="height:100px; " src="{{url('storage/administration/property/'.$booking->feature_image)}}" alt="property.png"></td>
                                </tr>
                              </tbody>
                            </table>

                            <h5 class="mb-1 text-info text-uppercase"><i class="ft-info"></i> Details Information</h5>
                            <table class="table table-borderless mb-0">
                              <tbody>
                                <tr>
                                  <td>Description:</td>
                                  <td class="text-primary">{{ $booking->property->description }}</td>
                                </tr>
                                <tr>
                                  <td>State :</td>
                                  <td class="text-primary">{{ $booking->property->state->name }}</td>
                                </tr>
                                <tr>
                                  <td>City :</td>
                                  <td class="text-primary">{{ $booking->property->city->name }}</td>
                                </tr>
                                <tr>
                                  <td>Lat :</td>
                                  <td class="text-primary">{{ $booking->property->lat }}</td>
                                </tr>
                                <tr>
                                  <td>Lng :</td>
                                  <td class="text-primary">{{ $booking->property->lng }}</td>
                                </tr>
                                <tr>
                                  <td>Point :</td>
                                  <td class="text-primary">{{ $booking->property->point }}</td>
                                </tr>
                                <tr>
                                  <td>Address :</td>
                                  <td class="text-primary">{{$booking->property->address}}</td>
                                </tr>
                                <tr>
                                  <td>Country :</td>
                                  <td class="text-primary">{{$booking->property->country->name}}</td>
                                </tr>
                                <tr>
                                  <td>Phone :</td>
                                  <td class="text-primary">{{$booking->property->phone}}</td>
                                </tr>
                                <tr>
                                  <td>Email :</td>
                                  <td class="text-primary">{{$booking->property->email}}</td>
                                </tr>
                                <tr>
                                  <td>Viwed :</td>
                                  <td class="text-primary">{{ $booking->property->viwed }}</td>
                                </tr>
                                <tr>
                                  <td>Is Always Open :</td>
                                  <td>
                                    @if($booking->property->is_always_open == 1)
                                      <span class="badge badge-success">Open</span>
                                    @else
                                      <span class="badge badge-danger">Closed</span>
                                    @endif
                                  </td>
                                </tr>
                                <tr>
                                  <td>Is Active :</td>
                                  <td>
                                    @if($booking->property->is_active == 1)
                                      <span class="badge badge-success">Active</span>
                                    @else
                                      <span class="badge badge-danger">Inactive</span>
                                    @endif
                                  </td>
                                </tr>
                                <tr>
                                  <td>Is Varified :</td>
                                  <td>
                                    @if($booking->property->varified == 1)
                                      <span class="badge badge-success">Varified</span>
                                    @else
                                      <span class="badge badge-danger">Not Varified</span>
                                    @endif
                                  </td>
                                </tr>
                                <tr>
                                  <td>Status :</td>
                                  <td>
                                    @if($booking->property->status == 1)
                                      <span class="badge badge-success">Active</span>
                                    @else
                                      <span class="badge badge-danger">Inactive</span>
                                    @endif
                                  </td>
                                </tr>

                                <tr>
                                  <td>Created At :</td>
                                  <td class="text-primary">{{ $booking->property->created_at->format('d-m-Y') }} || {{ $booking->property->created_at->format('h:m a') }}</td>
                                </tr>
                                <tr>
                                  <td>Updated At :</td>
                                  <td class="text-primary">{{ $booking->property->updated_at->format('d-m-Y') }} || {{ $booking->property->updated_at->format('h:m a') }}</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          {{-- Provider Data End --}}

                          {{-- Time & Date Data Start --}}
                            <div class="tab-pane fade" id="time-date" role="tabpanel"
                                aria-labelledby="account-pill-connections" aria-expanded="false">
                                <h1 class="text-center mb-2"><i class="la la-clock-o" style="font-size:30px;"></i> Time & Date</h1>
                                <table class="table">
                                  <thead class="bg-dark text-white">
                                    <tr>
                                      <th scope="col">From Date</th>
                                      <th scope="col">To Date</th>
                                      <th scope="col">From Time</th>
                                      <th scope="col">To Time</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>{{ $booking->from_date->format('d M, Y') }}</td>
                                      <td>{{ $booking->to_date->format('d M, Y') }}</td>
                                      <td>{{ $booking->from_time->format('h:m a') }}</td>
                                      <td>{{ $booking->to_time->format('h:m a') }}</td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                          {{-- Time & Date Data End --}}

                          {{-- Payment Data Start --}}
                            <div class="tab-pane fade" id="payment-info" role="tabpanel"
                                aria-labelledby="account-pill-notifications" aria-expanded="false">
                                <h1 class="text-center mb-2"><i class="la la-cc-mastercard" style="font-size:30px;"></i> Payment Info</h1>
                                <table class="table">
                                  <thead class="bg-dark text-white">
                                    <tr >
                                      <th scope="col">Currency Name</th>
                                      <th scope="col">Is Payment Done</th>
                                      <th scope="col">Note</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>{{ $booking->currency->name }}</td>
                                      <td>
                                        @if($booking->is_payment_done == 1)
                                          <span class="badge badge-success">Paid</span>
                                        @else
                                          <span class="badge badge-danger">Due</span>
                                        @endif
                                      </td>
                                      <td>{{ $booking->note}}</td>
                                    </tr>
                                  </tbody>
                                </table>
                                <table class="table">
                                  <thead class="bg-primary text-white">
                                    <tr>
                                      <th scope="col">Billing ID</th>
                                      <th scope="col">Cost Per Unit</th>
                                      <th scope="col">Quantity</th>
                                      <th scope="col">Cost Total</th>
                                      <th scope="col">Provider Booking Cut</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>{{ $booking->billing->id }}</td>
                                      <td>{{ $booking->cost_per_unit }}</td>
                                      <td>{{ $booking->quantity }}</td>
                                      <td>{{ Converter::to('currency.'.$booking->currency->short_code)->value($booking->cost_total)->format() }}</td>
                                      <td>{{ $booking->provider_booking_cut }}</td>
                                  </tbody>
                                </table>
                                <div class="pull-right pb-2">
                                  <a class="btn btn-danger" href="#">Cancel Booking</a>
                                  <a class="btn btn-success" href="#">Confirm Booking</a>
                                </div>
                              </div>
                            </div>
                          {{-- Payment Data End --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>

@endsection
