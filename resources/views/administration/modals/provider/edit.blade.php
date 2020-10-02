<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Edit Provider</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="{{ route('app.form.submission.provider.update', $provider->id) }}" class="ajax-form" method="post" enctype="multipart/form-data" >
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ $provider->first_name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ $provider->last_name }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>User type</label>
                        <select name="user_type" class="form-control">
                            <option value="Organization" @if( $provider->user_type == 'Organization' ) selected @endif >Organization</option>
                            <option value="Individual" @if( $provider->user_type == 'Individual' ) selected @endif >Individual</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Select your gender</label>
                        <select name="gender" class="form-control">
                            <option value="1" @if( $provider->gender == 1 ) selected @endif >Male</option>
                            <option value="2" @if( $provider->gender == 2 ) selected @endif >Female</option>
                            <option value="3" @if( $provider->gender == 3 ) selected @endif >Others</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control" value="{{ $provider->date_of_birth }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="Email Address" name="email" class="form-control" value="{{ $provider->email }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ $provider->phone }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $provider->username }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Upload Image</label> <br>
                        <img src="{{ Storage::url($provider->avatar) }}" width="50px" alt=""> <br> <br>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Update</button>
        </div>
    </form>
</div>