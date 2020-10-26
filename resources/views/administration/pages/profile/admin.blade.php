@extends('administration.layout')
@push('title')
Admins
@endpush

@section('mainContent')

<div class="content-wrapper">
    <div class="content-body">

        <section class="row" style="padding: 30px 0;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body p-0">
                            <div class="row">
                                <!-- left part start -->
                                <div class="col-md-12" style="padding: 30px">
                                    <h2> <b>Name : </b> {{ $user->first_name }} {{ $user->last_name }}</h2>
                                    <p>
                                        <b>Username :</b> {{ $user->username }}
                                    </p>
                                    <p>
                                        <b>Email : </b>{{ $user->email }}
                                    </p>
                                    <p>
                                        <b>Phone : </b>{{ $user->phone }}
                                    </p>
                                    <p>
                                        <b>Emergency Contact : </b> {{ $user->emergency_contact_number }}
                                    </p>
                                    <p>
                                        <b>Date of Birth : </b> {{ $user->date_of_birth }}
                                    </p>
                                    <p>
                                        <b>Gender : </b>

                                        @if( $user->gender == 1 )
                                            Male
                                        @elseif( $user->gender == 2 )
                                            Female
                                        @else
                                            Other
                                        @endif
                                    </p>
                                    <button class="btn btn-success" style="margin-top:15px" data-toggle="modal" data-target="#myModal" data-content="{{ route('app.modal.admin.editProfile', $user->id) }}">Edit Profile Information</button>
                                </div>
                                <!-- left part end -->

                                <!-- right part start -->
                                <div class="col-md-12" style="margin-top: 15px;">
                                    @if( \Illuminate\Support\Facades\Storage::exists($user->avatar) )
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($user->avatar) }}" style="width: 10%;display:block;margin: 0 auto;" class="img-fluid" alt=""> <br> <br>
                                    @else
                                    <img src="{{ asset('images/user.png') }}" width="50px" alt=""> <br> <br>
                                    @endif
                                </div>
                                <!-- right part end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



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
    window.datatable.AdminsTable.columns = [{
            data: 'id',
            name: 'data.id'
        },
        {
            data: 'full_name',
            name: 'full_name'
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            data: 'username',
            name: 'username'
        },
        {
            data: 'is_active',
            name: 'is_active'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false
        },
    ];
</script>
@endpush

@push('page.vendor.js')
<script src="{{ asset('administration/app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('administration/app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
@endpush
