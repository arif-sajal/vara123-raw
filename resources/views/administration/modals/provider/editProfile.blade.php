<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Edit Profile Information </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="{{ route('app.form.submission.provider.profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
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
        </div>

    </form>
    <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
    </div>
</div>

<script>
    $('.dropify').each(function() {
        $(this).dropify();
    })
</script>
