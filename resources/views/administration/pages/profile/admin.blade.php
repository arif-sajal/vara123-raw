@extends('administration.layout')
@push('title')
Admins
@endpush

@section('mainContent')

<div class="content-wrapper">
    <div class="content-body">

        <form action="{{ route('app.form.submission.admin.profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
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

            <!-- personal information start -->
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" value="{{ $user->first_name }}" name="first_name">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>last Name</label>
                        <input type="text" class="form-control" value="{{ $user->last_name }}" name="last_name">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Select your gender</label>
                        <select name="gender" class="form-control">
                            <option value="1" @if ( $user->gender == 1 ) selected @endif >Male</option>
                            <option value="2" @if ( $user->gender == 2 ) selected @endif >Female</option>
                            <option value="3" @if ( $user->gender ==3 ) selected @endif >Others</option>
                        </select>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" value="{{ $user->date_of_birth }}" name="date_of_birth" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="Email Address" value="{{ $user->email }}" name="email" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Emergency Contact number</label>
                        <input type="text" name="emergency_number" value="{{ $user->emergency_contact_number }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Username" value="{{ $user->username }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary" >Update information</button>
                </div>
            </div>
            <!-- personal information end -->


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
