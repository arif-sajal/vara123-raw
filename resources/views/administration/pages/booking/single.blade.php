@extends('administration.layout')
@push('title')
  Single Booking View ({{ $booking->id }})
@endpush


@section('mainContent')
  <div class="card">
      <div class="card-header">
              <h1 class="text-center mb-3 text-dark text-uppercase" style="font-weight:bold;">Booking Details Information <span class="text-success">(#{{$booking->id }})</span>
                <a style="font-weight:bold;" class="btn btn-warning btn-sm text-dark pull-right"
                 href="{{ route('app.booking.new-pending')}}"> Go Back</a>
              </h1>
      </div>

      <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="mb-2 text-primary">Customer Information</h2>
              <div class="row">
                <div class="col-md-5">
                  <ul style="list-style-type:none;">
                    <li>First Name : <span class="ml-1 text-info">{{ $booking->customer->first_name }}</span></li>
                    <li>Last Name : <span class="ml-1 text-info">{{ $booking->customer->last_name }}</span></li>
                    <li>Username : <span class="ml-1 text-info">{{ $booking->customer->username }}</span></li>
                    <li>NID # : <span class="ml-1 text-info">{{ $booking->customer->nid_number }}</span></li>
                    <li>Address : <span class="ml-1 text-info">{{ $booking->customer->address }}</span></li>
                    <li>Country : <span class="ml-1 text-info">{{ $booking->customer->country }}</span></li>
                    <li>State : <span class="ml-1 text-info">{{ $booking->customer->state }}</span></li>
                    <li>City : <span class="ml-1 text-info">{{ $booking->customer->city }}</span></li>
                    <li>Post Code : <span class="ml-1 text-info">{{ $booking->customer->post_code }}</span></li>

                    <li>Email Varified Status :
                      @if($booking->customer->is_email_varified == 1)
                        <span class="badge badge-success">Varified</span>
                      @else
                        <span class="badge badge-danger">Not Varified</span>
                      @endif
                    </li>

                    <li>Avatar :
                    <img class="img-rounded" style="height:100px; " src="{{url('storage/administration/customer/'.$booking->avatar)}}" alt="customer.png">
                    </li>
                  </ul>
                </div>

                <div class="col-md-7">
                  <ul style="list-style-type:none;">
                  <li>Gender : <span class="ml-1 text-info">{{ $booking->customer->gender }}</span></li>
                  <li>Date-of-Birth : <span class="ml-1 text-info">{{ $booking->customer->date_of_birth }}</span></li>
                  <li>Email : <span class="ml-1 text-info">{{ $booking->customer->post_code }}</span></li>
                  <li>Phone : <span class="ml-1 text-info">{{ $booking->customer->phone }}</span></li>
                  <li>Emergerncy-CN # : <span class="ml-1 text-info">{{ $booking->customer->emergency_contact_number }}</span></li>
                  <li>Password : <span class="ml-1 text-info">{{bcrypt($booking->customer->password)}}</span></li>
                  <li>Birth Certifcate # : <span class="ml-1 text-info">{{ $booking->customer->birth_certificate_number }}</span></li>
                  <li>Ban Reason : <span class="ml-1 text-info">{{ $booking->customer->ban_reason }}</span> </li>

                  <li>Active Status :
                    @if($booking->customer->is_active == 1)
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Inactive</span>
                    @endif
                  </li>

                  <li>Created At : <span class="ml-1 text-info">{{ $booking->customer->created_at->format('d-m-Y') }} || {{ $booking->customer->created_at->format('h:m a') }}</span></li>
                  <li>Updated At : <span class="ml-1 text-info">{{ $booking->customer->updated_at->format('d-m-Y') }} || {{ $booking->customer->updated_at->format('h:m a') }}</span></li>

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-12 mt-2">
              <h2 class="mb-2 text-danger">Provider Information</h2>
              <div class="row">
                <div class="col-md-5">

                  <ul style="list-style-type:none;">
                    <li>First Name : <span class="ml-1 text-info">{{ $booking->provider->first_name }}</span></li>
                    <li>Last Name : <span class="ml-1 text-info">{{ $booking->provider->last_name }}</span></li>
                    <li>User Type :
                      @if( $booking->provider->user_type === 'Organization')
                      <span class="ml-1 text-info">Organization</span>
                      @else
                      <span class="ml-1 text-info">Individual</span>
                      @endif
                    </li>
                    <li>Gender :<span class="ml-1 text-info">{{ $booking->provider->gender }}</span></li>
                    <li>Date-of-Birth : <span class="ml-1 text-info">{{ $booking->provider->date_of_birth }}</span></li>
                    <li>Email : <span class="ml-1 text-info">{{ $booking->provider->email }}</span></li>
                    <li>Phone : <span class="ml-1 text-info">{{ $booking->provider->phone }}</span></li>
                    <li>Email Varified Status :
                      @if($booking->provider->is_email_varified == 1)
                        <span class="badge badge-success">Varified</span>
                      @else
                        <span class="badge badge-warning">Not Varified</span>
                      @endif
                    </li>
                    <li>Phone Varified Status :
                      @if($booking->provider->is_phone_varified == 1)
                        <span class="badge badge-success">Varified</span>
                      @else
                        <span class="badge badge-warning">Not Varified</span>
                      @endif
                    </li>

                  </ul>
                </div>

                <div class="col-md-7">
                  <ul style="list-style-type:none;">

                    <li>Username : <span class="ml-1 text-info">{{ $booking->provider->username }}</span></li>
                    <li>Password :  <span class="ml-1 text-info">{{bcrypt($booking->provider->password)}}</span></li>
                    <li>Active Status :
                      @if($booking->provider->is_active == 1)
                        <span class="badge badge-success">Active</span>
                      @else
                        <span class="badge badge-danger">Inactive</span>
                      @endif
                    </li>
                    <li> Registration Varified Status :
                      @if($booking->provider->is_registration_varified == 1)
                        <span class="badge badge-success">Varified</span>
                      @else
                        <span class="badge badge-warning">Not Varified</span>
                      @endif
                    </li>
                    <li>Ban Reason :  <span class="ml-1 text-info">{{ $booking->provider->ban_reason }}</span></li>
                    <li>Avatar : <img class="img-rounded" style="height:100px; " src="{{url('storage/administration/provider/'.$booking->avatar)}}" alt="provider.png"></li>
                    <li>Currency Name :  <span class="ml-1 text-info">{{ $booking->provider->currency->name }}</span></li>
                    <li>Created At : <span class="ml-1 text-info">{{ $booking->provider->created_at->format('d-m-Y') }} || {{ $booking->provider->created_at->format('h:m a') }}</span></li>
                    <li>Updated At : <span class="ml-1 text-info">{{ $booking->provider->updated_at->format('d-m-Y') }} || {{ $booking->provider->updated_at->format('h:m a') }}</span></li>

                  </ul>
                </div>
              </div>
            </div>


            <div class="col-md-12 mt-2">
              <h2 class="mb-2 text-success">Property Information</h2>
              <div class="row">
                <div class="col-md-5">

                  <ul style="list-style-type:none;">
                    <li>Property_type : <span class="ml-1 text-info">{{ $booking->property->property_type->name }}</span></li>
                    <li>Provider Username : <span class="ml-1 text-info">{{ $booking->property->provider->username }}</span></li>
                    <li>Currency Name : <span class="ml-1 text-info">{{ $booking->property->currency->name }}</span> </li>
                    <li>Property Name :<span class="ml-1 text-info">{{ $booking->property->name}}</span></li>
                    <li>Description : <span class="ml-1 text-info">{{ $booking->property->description }}</span></li>
                    <li>Feature Image :
                    <img class="img-rounded" style="height:100px; " src="{{url('storage/administration/property/'.$booking->feature_image)}}" alt="property.png">
                    </li>
                    <li>Is Always Open :
                      @if($booking->property->is_always_open == 1)
                        <span class="badge badge-success">Open</span>
                      @else
                        <span class="badge badge-danger">Closed</span>
                      @endif
                    </li>
                    <li>State : <span class="ml-1 text-info">{{ $booking->property->state->name }}</span></li>
                    <li>City : <span class="ml-1 text-info">{{ $booking->property->city->name }}</span></li>
                    <li>Lat : <span class="ml-1 text-info">{{ $booking->property->lat }}</span></li>
                    <li>Lng : <span class="ml-1 text-info">{{ $booking->property->lng }}</span></li>

                  </ul>
                </div>

                <div class="col-md-7">
                  <ul style="list-style-type:none;">

                    <li>Point : <span class="ml-1 text-info">{{ $booking->property->point }}</span></li>
                    <li>Address :  <span class="ml-1 text-info">{{$booking->property->address}}</span></li>
                    <li>Country : <span class="ml-1 text-info">{{$booking->property->country->name}}</span></li>
                    <li>Phone :  <span class="ml-1 text-info">{{$booking->property->phone}}</span></li>
                    <li>Email :  <span class="ml-1 text-info">{{ $booking->property->email }}</span></li>
                    <li>Is Active :
                      @if($booking->property->is_active == 1)
                        <span class="badge badge-success">Active</span>
                      @else
                        <span class="badge badge-danger">Inactive</span>
                      @endif
                    </li>
                    <li>Is Varified :
                      @if($booking->property->varified == 1)
                        <span class="badge badge-success">Varified</span>
                      @else
                        <span class="badge badge-danger">Not Varified</span>
                      @endif
                    </li>
                    <li>Status :
                      @if($booking->property->status == 1)
                        <span class="badge badge-success">Active</span>
                      @else
                        <span class="badge badge-danger">Inactive</span>
                      @endif
                    </li>
                    <li>Viwed :  <span class="ml-1 text-info">{{ $booking->property->viwed }}</span></li>
                    <li>Created At : <span class="ml-1 text-info">{{ $booking->property->created_at->format('d-m-Y') }} || {{ $booking->property->created_at->format('h:m a') }}</span></li>
                    <li>Updated At : <span class="ml-1 text-info">{{ $booking->property->updated_at->format('d-m-Y') }} || {{ $booking->property->updated_at->format('h:m a') }}</span></li>

                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-12 mt-2">
              <h2 class="text-primary">Booking Date & Time Information</h2>
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

            <div class="col-md-12 mt-2">
              <h2 class="text-success">Booking Payment Information</h2>
              <table class="table">
                <thead class="bg-dark text-white">
                  <tr >
                    <th scope="col">Billing ID</th>
                    <th scope="col">Cost Per Unit</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Cost Total</th>
                    <th scope="col">Currency Name</th>
                    <th scope="col">Is Payment Done</th>
                    <th scope="col">Note</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $booking->billing->id }}</td>
                    <td>{{ $booking->cost_per_unit }}</td>
                    <td>{{ $booking->quantity }}</td>
                    <td>{{ Converter::to('currency.'.$booking->currency->short_code)->value($booking->cost_total)->format() }}</td>
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
            </div>
                <div class="col-md-12 mt-3">
                  <a class="btn btn-info btn-block text-uppercase" href="#">Confirm Booking</a>
                  <a class="btn btn-danger btn-block text-uppercase" href="#">Cancel Booking</a>
                </div>
          </div>
      </div>
  </div>

@endsection
