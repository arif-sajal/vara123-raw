@extends('administration.layout')
@push('title')
Providers
@endpush

@section('mainContent')

<div class="content-wrapper">
    <div class="content-body">

        <!-- payout request start -->
        <div class="row" style="margin-top: 15px">
            <!-- account balance start -->
            <div class="col-md-12">
                <div class="form-group">
                    <h3>Your pending balance is : ${{ $user->pending_balance }}</h3>
                </div>
                <div class="form-group">
                    <h3>Your account balance is : ${{ $user->balance }}</h3>
                </div>

            </div>
            <!-- account balance end -->
            <div class="col-md-6">
                <div class="form-group">
                    <button class="btn btn-success" data-toggle="modal" data-target="#myModal" data-content="{{ route('app.modal.provider.payout.modal', $user->id) }}">Payout request</button>
                </div>
            </div>
        </div>
        <!-- payout request end -->



        <form action="{{ route('app.form.submission.provider.profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- pofile pic start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        @if( \Illuminate\Support\Facades\Storage::exists($user->avatar) )
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($user->avatar) }}" width="50px" style="border-radius: 100%" alt=""> <br> <br>
                        @else
                        <img src="{{ asset('images/user.png') }}" width="50px" alt=""> <br> <br>
                        @endif
                        <label>Upload new photo</label>
                        <input type="file" class="form-control-file" name="avatar">
                    </div>
                </div>
            </div>
            <!-- pofile pic end -->

            <!-- profile information start -->
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ $user->first_name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ $user->last_name }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>User type</label>
                        <select name="user_type" class="form-control">
                            <option value="Organization" @if( $user->user_type == 'Organization' ) selected @endif >Organization</option>
                            <option value="Individual" @if( $user->user_type == 'Individual' ) selected @endif >Individual</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Select your gender</label>
                        <select name="gender" class="form-control">
                            <option value="1" @if( $user->gender == 1 ) selected @endif >Male</option>
                            <option value="2" @if( $user->gender == 2 ) selected @endif >Female</option>
                            <option value="3" @if( $user->gender == 3 ) selected @endif >Others</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control" value="{{ $user->date_of_birth }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="Email Address" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update information</button>
                </div>

            </div>
            <!-- profil information end -->

        </form>



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
